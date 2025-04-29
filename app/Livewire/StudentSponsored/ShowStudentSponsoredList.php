<?php

namespace App\Livewire\StudentSponsored;

use App\Livewire\StudentRegister;
use App\Models\AcademicPerfomance;
use App\Models\CertificationDocument;
use App\Models\ReceivingScholarship;
use Livewire\Component;
use App\Models\StudentRegister as StudentRegisterModel;
use App\Models\StudentRegisterFileUploads;
use App\Models\StudentParents;
use App\Models\StudentParentsFileUploads;
use App\Models\StudentRegisterHomePhotos;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;



class ShowStudentSponsoredList extends Component
{
    public $search = '';
    public function render()
{
    if ($this->search) {
        $student_data = StudentRegisterModel::where('status_id', 9)
            ->where('student_name', 'LIKE', "%{$this->search}%")
            ->get();
    } else {
        $student_data = StudentRegisterModel::where('status_id', 9)->get();
    }

    return view('livewire.student-sponsored.show-student-sponsored-list',
        compact('student_data'))
        ->layout('Admin.components.layouts.app');
}


public function deleteStudent(StudentRegisterModel $student)
{
    DB::beginTransaction();

    try {
        // 🔹 ลบไฟล์ของผู้ปกครอง
        if ($student->parentFileUpload) {
            Storage::delete([
                $student->parentFileUpload->copy_of_house_registration,
                $student->parentFileUpload->copy_of_id_card,
            ]);
            $student->parentFileUpload->delete();
        }
        if($student->ReceivingScholarship){
            ReceivingScholarship::where('student_register_id',$student->id)->delete();
        }
        if($student->studentRegisterFileUpload){
            Storage::delete([
                $student->studentRegisterFileUpload->essay,
                $student->studentRegisterFileUpload->copy_of_birth_cercificate,
                $student->studentRegisterFileUpload->copy_of_id_card,
                $student->studentRegisterFileUpload->copy_of_house_registration,
                
            ]);
            $student->studentRegisterFileUpload->delete();
        }
        if($home_photo = StudentRegisterHomePhotos::where('student_register_id',$student->id)->get()){
            foreach($home_photo as $item){
                Storage::delete($item);
            }
        }
        if($student->RegisterPoint){
            $student->RegisterPoint->delete();
        }

        

        // 🔹 ลบเอกสารรับรอง
        if ($student->certificationDocument) {
            Storage::delete([
                $student->certificationDocument->data_guarantee_document,
                $student->certificationDocument->financial_guarantee_document,
            ]);
            $student->certificationDocument->delete();
        }

        // 🔹 ลบผลการเรียน (ถ้า status_id == 9)
        if ($student->status_id == 9 && $student->academicPerformance) {
            Storage::delete($student->academicPerformance->file_name);
            $student->academicPerformance->delete();
        }

        // 🔹 ลบผู้ปกครอง (สัมพันธ์กับ student)
        if ($student->parent) {
            $student->parent->delete();
        }

        // 🔹 ลบนักเรียน
        $student->delete();

        DB::commit();

        session()->flash('success', 'ลบข้อมูลนักเรียนเรียบร้อยแล้ว');
    } catch (\Exception $e) {
        DB::rollBack();
        logger()->error('ลบนักเรียนไม่สำเร็จ: ' . $e->getMessage());
        session()->flash('error', 'เกิดข้อผิดพลาดระหว่างการลบ กรุณาลองใหม่');
    }
}



}

<?php

namespace App\Livewire\StudentRegister;

use App\Models\AcademicPerfomance;
use App\Models\CertificationDocument;
use App\Models\StudentParents;
use App\Models\StudentParentsFileUploads;
use App\Models\StudentRegister;
use App\Models\StudentRegisterFileUploads;
use App\Models\StudentRegisterHomePhotos;
use App\Models\StudentRegisterPhotos;
use App\Models\StudentSponsored;
use App\Models\StudentSponsoredParent;
use App\Models\StudentSponsoredParents;
use App\Models\StudentSponsoredPhotos;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule; 
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class ShowStudentRegisterData extends Component
{
    use WithFileUploads;
    public $student_register;
    public $student_photos;

    public $student_home_photos;
    

    public $editing_student_register_id;
    #[Rule('required')]
    public $editing_student_register_name;
    #[Rule('required')]
    public $editing_student_register_tel;
    #[Rule('required')]
    public $editing_student_register_line_id;
    #[Rule('required')]
    public $editing_student_register_education_level;
    #[Rule('required')]
    public $editing_student_register_address;
    #[Rule('required')]
    public $editing_student_register_google_map_link;

    #[Rule('required')]
    public $editing_student_parent_name;
    #[Rule('required')]
    public $editing_student_parent_tel;
    #[Rule('required')]
    public $editing_student_parent_line_id;
    #[Rule('required')]
    public $editing_student_parent_google_map_link;

    public $editing_student_parent_address;
    
    public $editing_student_photo;

    public $editing_student_home_photo;

    public $editing_student_register_file;

    public $edit_student_copy_of_id_card;

    public $editing_parent_file_upload;

    public $editing_data_guarantee_document;
    public $editing_financial_guarantee_document;

    public function mount(StudentRegister $student){
        $this->student_register = $student;
        $this->student_photos = StudentRegisterPhotos::where('student_register_id',$student->id)->get();
        $this->student_home_photos = StudentRegisterHomePhotos::where('student_register_id',$student->id)->get();
        
    }

    public function edit($id)
{
    $this->editing_student_register_id = $id;
    $student = StudentRegister::find($id);
    

    if (!$student) {
        return;
    }

    $this->editing_student_register_name = $student->student_name;
    $this->editing_student_register_tel = $student->tel;
    $this->editing_student_register_line_id = $student->line_id;
    $this->editing_student_register_google_map_link = $student->google_map_link;
    $this->editing_student_register_education_level = $student->education_level;
    $this->editing_student_register_address = $student->address;

    $this->editing_student_parent_name = $student->StudentParent->parent_name;
    $this->editing_student_parent_tel = $student->StudentParent->tel;
    $this->editing_student_parent_line_id = $student->StudentParent->line_id;
    $this->editing_student_parent_google_map_link = $student->StudentParent->google_map_link;
    $this->editing_student_parent_address = $student->StudentParent->address;
    
    $this->editing_data_guarantee_document = $student->CertificationDocument->data_guarantee_document;
    $this->editing_financial_guarantee_document = $student->CertificationDocument->financial_guarantee_document;
    

    

    $this->student_register = $student;
}


public function cancelEdit()
{
    $this->reset([
        'editing_student_register_id',
        'editing_student_register_name',
        'editing_student_register_tel',
        'editing_student_register_line_id',
        'editing_student_register_google_map_link',
        'editing_student_register_education_level',
        'editing_student_register_address',
        'editing_student_photo'
    ]);
}


public function updateData()
{
    $this->validate();

    $student = StudentRegister::find($this->editing_student_register_id);
    $student_parent = StudentParents::where('student_register_id',$student->id);

    if ($student) {
        $student->update([
            'student_name' => $this->editing_student_register_name,
            'tel' => $this->editing_student_register_tel,
            'line_id' => $this->editing_student_register_line_id,
            'google_map_link' => $this->editing_student_register_google_map_link,
            'education_level' => $this->editing_student_register_education_level,
            'address' => $this->editing_student_register_address,
        ]);  
    }

    if($student_parent){
        $student_parent->update([
            'parent_name' => $this->editing_student_parent_name,
            'tel' => $this->editing_student_parent_tel,
            'line_id' => $this->editing_student_parent_line_id,
            'google_map_link' => $this->editing_student_parent_google_map_link,
        ]);
    }

    session()->flash('success', 'Update is successfully');

        // รีเซ็ตค่าและโหลดข้อมูลใหม่
        $this->cancelEdit();
        $this->student_register = StudentRegister::find($this->student_register->id);
}
public function deletePhoto($id)
{
    $photo = StudentRegisterPhotos::find($id);
    if ($photo) {
        // ตั้งค่า file_name เป็น null
        $photo->update(['file_name' => null]);
        // รีเฟรชข้อมูลรูปภาพใหม่ (จะทำให้ UI อัปเดตโดยอัตโนมัติ)
        $this->student_photos = StudentRegisterPhotos::where('student_register_id', $this->editing_student_register_id)->get();
    }
}

public function deleteFileInStudentParentFileUpload($fileColumn){
    $student_parent_file_upload = $this->student_register->studentParentFileUpload;

    if($student_parent_file_upload && isset($student_parent_file_upload->$fileColumn)){
        Storage::delete($student_parent_file_upload->$fileColumn);
        $student_parent_file_upload->update([
            $fileColumn => null,
        ]);
    }
    $this->student_register = $this->student_register->fresh();
    session()->flash('message', 'ลบไฟล์เรียบร้อยแล้ว');
}

public function deleteFileInStudentFileUpload($fileColumn)
{
    // ดึงข้อมูล studentRegisterFileUpload ของ student_register ปัจจุบัน
    $studentFile = $this->student_register->studentRegisterFileUpload;
    
    if ($studentFile && isset($studentFile->$fileColumn)) {
        // ลบไฟล์จาก Storage
        Storage::delete($studentFile->$fileColumn);

        // อัปเดตให้ค่านั้นเป็น NULL
        $studentFile->update([
            $fileColumn => null
        ]);

        // อัปเดตหน้า Livewire
        $this->student_register = $this->student_register->fresh();

        session()->flash('message', 'ลบไฟล์เรียบร้อยแล้ว');
    }
}

public function insertFileInStudentFileUpload($fileColumn){
   
    $student_register_file_upload = StudentRegisterFileUploads::where('student_register_id',$this->student_register->id)->first();
    
    if($student_register_file_upload){
        
        $copy_of_birth_new_path = $this->editing_student_register_file->store('uploads/student_register','public');
        $student_register_file_upload->update([
            $fileColumn => $copy_of_birth_new_path,
        ]);
    }
    $this->cancelEdit();
    $this->student_register->studentParentFileUpload->fresh();
}

public function insertParentFileUpload($fileColumn){
    $parent_file_upload = StudentParentsFileUploads::where('student_register_id',$this->student_register->id)->first();
    if($parent_file_upload){
        $edit_parent_file_upload_path = $this->editing_parent_file_upload->store('uploads/student_register','public');
        $parent_file_upload->update([
            $fileColumn => $edit_parent_file_upload_path,
        ]);
    }
}
public function deleteHomePhoto($id){
    $home_photo = StudentRegisterHomePhotos::find($id);
    if ($home_photo) {
        $home_photo->update(['file_name' => null]);
    }
    $this->student_home_photos = StudentRegisterHomePhotos::where('student_register_id',$this->editing_student_register_id)->get();
}

public function insertStudentPhoto($id){
    // dd($this->editing_student_photo);
    // dd($id);
    $student_photo = StudentRegisterPhotos::find($id);
    $student_new_photo_path = $this->editing_student_photo->store('uploads/student_register','public');
    $student_photo->update([
        'file_name' => $student_new_photo_path,
    ]);
    $this->student_photos = $this->student_photos->fresh();
    // $this->student_photos = StudentRegisterPhotos::where('student_register_id',$this->editing_student_register_id)->get(); 
}

public function insertStudentHomePhoto($id){
    $student_home_photo = StudentRegisterHomePhotos::find($id);
    $student_new_home_photo_path = $this->editing_student_home_photo->store('uploads/student_register','public');

    $student_home_photo->update([
        'file_name' => $student_new_home_photo_path,
    ]);
    $this->student_home_photos = $this->student_home_photos->fresh();
}

public function insertStudentSponsored($id)
{
    StudentRegister::find($id)->update([
        'status' => 9
    ]);

    
    // dd($this->student_register->student_name);
    // $student_sponsored = StudentSponsored::create([
    //     'student_name' => $this->student_register->student_name,
    //     'tel' => $this->student_register->tel,
    //     'line_id' => $this->student_register->line_id,
    //     'adress' => $this->student_register->address,
    //     'education_level' =>  $this->student_register->education_level,
    //     'google_map_link' => $this->student_register->google_map_link,
    //     'note' => null
    // ]);

    // StudentSponsoredParents::create([
    //     'parent_name' => $this->student_register->StudentParent->parent_name,
    //     'tel' => $this->student_register->StudentParent->tel,
    //     'line_id' => $this->student_register->StudentParent->line_id,
    //     'address' => $this->student_register->StudentParent->address,
    //     'google_map_link' => $this->student_register->google_map_link,
    //     'student_sponsored_id' => $student_sponsored->id,
    // ]);

    // AcademicPerfomance::create([
    //     'file_name' => null,
    //     'annotation' => null,
    //     'sponsoredStudent_id' => $student_sponsored->id
    // ]);
    // StudentSponsoredPhotos::create([
    //     'file_name' => null,
    //     'studentSponsored_id' => $student_sponsored->id
    // ]);

    session()->flash('insert_student_sponsored', 'Student Data added to Sponsored!');

}

    public function deleteCertification($fill){
        $certificate = $this->student_register->CertificationDocument;
        if($certificate and isset($certificate->$fill)){
            Storage::delete($certificate->$fill);
            $certificate->update([
                $fill => null
            ]);
        }
        $this->student_register = $this->student_register->fresh();
    }

    public function render()
    {
        $certificate_document = CertificationDocument::where('student_register_id',$this->student_register)->first();

        if(Auth::user()->role_id == 1){
            return view('livewire.student-register.show-student-register-data',compact('certificate_document'))->layout('Admin.components.layouts.app');
        }elseif(Auth::user()->role_id == 2)
        
        return view('livewire.student-register.show-student-register-data',compact('certificate_document'));
    }
}

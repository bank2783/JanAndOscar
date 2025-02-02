<?php

namespace App\Livewire\StudentRegister;

use App\Models\StudentRegister;
use App\Models\StudentRegisterFileUploads;
use App\Models\StudentRegisterHomePhotos;
use App\Models\StudentRegisterPhotos;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ShowStudentRegisterData extends Component
{
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
    ]);
}


public function updateData()
{
    $this->validate();

    $student = StudentRegister::find($this->editing_student_register_id);

    if ($student) {
        $student->update([
            'student_name' => $this->editing_student_register_name,
            'tel' => $this->editing_student_register_tel,
            'line_id' => $this->editing_student_register_line_id,
            'google_map_link' => $this->editing_student_register_google_map_link,
            'education_level' => $this->editing_student_register_education_level,
            'address' => $this->editing_student_register_address,
        ]);

        session()->flash('success', 'Update is successfully');

        // รีเซ็ตค่าและโหลดข้อมูลใหม่
        $this->cancelEdit();
        $this->student_register = StudentRegister::find($this->student_register->id);
    }
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

public function deleteFileInStudentFileUpload($fileColumn)
{
    // ดึงข้อมูล studentRegisterFileUpload ของ student_register ปัจจุบัน
    $studentFile = $this->student_register->studentRegisterFileUpload;
    
    if ($studentFile && isset($studentFile->$fileColumn)) {
        // ลบไฟล์จาก Storage
        Storage::delete($studentFile->$fileColumn);

        // อัปเดตให้ค่านั้นเป็น NULL
        // $studentFile->update([
        //     $fileColumn => null
        // ]);

        // อัปเดตหน้า Livewire
        $this->student_register = $this->student_register->fresh();

        session()->flash('message', 'ลบไฟล์เรียบร้อยแล้ว');
    }
}


public function deleteHomePhoto($id){
    $home_photo = StudentRegisterHomePhotos::find($id);
    if ($home_photo) {
        $home_photo->update(['file_name' => null]);
    }
    $this->student_home_photos = StudentRegisterHomePhotos::where('student_register_id',$this->editing_student_register_id)->get();
}

    public function render()
    {

        return view('livewire.student-register.show-student-register-data');
    }
}

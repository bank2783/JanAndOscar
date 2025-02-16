<?php

namespace App\Livewire\StudentRegister;

use App\Models\StudentParents;
use App\Models\StudentParentsFileUploads;
use App\Models\StudentRegister;
use App\Models\StudentRegisterFileUploads;
use App\Models\StudentRegisterHomePhotos;
use App\Models\StudentRegisterPhotos;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowStudentRegisterList extends Component
{  

    public function delete($id){
        StudentRegister::find($id)->delete();
        StudentRegisterFileUploads::where('student_register_id',$id)->delete();
        StudentRegisterPhotos::where('student_register_id',$id)->delete();
        StudentRegisterHomePhotos::where('student_register_id',$id)->delete();
        StudentParents::where('student_register_id',$id)->delete();
        StudentParentsFileUploads::where('student_register_id',$id)->delete();
    }
    public function render()
    {
        $student_register_list = StudentRegister::where('user_id',Auth::user()->id)->get();
        return view('livewire.student-register.show-student-register-list',compact('student_register_list'));
    }
}

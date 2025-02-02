<?php

namespace App\Livewire\StudentRegister;

use App\Models\StudentRegister;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowStudentRegisterList extends Component
{
    public function render()
    {
        $student_register_list = StudentRegister::where('user_id',Auth::user()->id)->get();
        return view('livewire.student-register.show-student-register-list',compact('student_register_list'));
    }
}

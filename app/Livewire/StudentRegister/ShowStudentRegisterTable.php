<?php

namespace App\Livewire\StudentRegister;

use App\Models\StudentRegister;
use Livewire\Component;

class ShowStudentRegisterTable extends Component
{
    public function render()
    {
        $student = StudentRegister::all();
        return view('livewire.student-register.show-student-register-table',compact('student'));
    }
}

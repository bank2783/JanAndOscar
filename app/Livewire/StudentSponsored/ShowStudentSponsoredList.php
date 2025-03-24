<?php

namespace App\Livewire\StudentSponsored;

use App\Livewire\StudentRegister;
use Livewire\Component;
use App\Models\StudentSponsored;
use App\Models\StudentRegister as student;

class ShowStudentSponsoredList extends Component
{
    public function render()
    {
        $student_data = student::where('status_id',9)->get();
        return view('livewire.student-sponsored.show-student-sponsored-list',
        compact('student_data'))
        ->layout('Admin.components.layouts.app');
    }
}

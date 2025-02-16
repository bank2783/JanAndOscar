<?php

namespace App\Livewire\StudentSponsored;

use Livewire\Component;
use App\Models\StudentSponsored;

class ShowStudentSponsoredList extends Component
{
    public function render()
    {
        $student_data = StudentSponsored::all();
        return view('livewire.student-sponsored.show-student-sponsored-list',
        compact('student_data'))
        ->layout('Admin.components.layouts.app');
    }
}

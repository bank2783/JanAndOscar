<?php

namespace App\Livewire\StudentSponsored;

use App\Livewire\StudentRegister;
use Livewire\Component;
use App\Models\StudentRegister as StudentRegisterModel;

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


}

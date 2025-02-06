<?php

namespace App\Livewire\StudentSponsored;

use App\Models\StudentSponsored;
use Livewire\Component;

class ShowData extends Component
{
    public $student_data;

    public function mount(StudentSponsored $student){
        $this->student_data = $student;
    }
    public function render()
    {
        return view('livewire.student-sponsored.show-data')->layout('Admin.components.layouts.app');
    }
}

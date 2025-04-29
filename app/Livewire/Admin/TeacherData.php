<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class TeacherData extends Component
{
    public $teacher;
    public function mount(User $teacher){
        $this->teacher = $teacher;
    }
    public function render()
    {
        
        return view('livewire.admin.teacher-data',)->layout('Admin.components.layouts.app');
    }
}

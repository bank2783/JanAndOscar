<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Teacher extends Component
{
    public function render()
    {
        $teacher =  User::where('role_id',2)->get();
        return view('livewire.admin.teacher',compact('teacher'))->layout('Admin.components.layouts.app');
    }
}

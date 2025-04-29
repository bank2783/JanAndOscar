<?php

namespace App\Livewire\Admin;

use App\Models\ReceivingScholarship;
use Livewire\Component;

class Awarded extends Component
{
    public function render()
    {
        $scholarship = ReceivingScholarship::all();
        return view('livewire.admin.awarded',compact('scholarship'))->layout('Admin.components.layouts.app');;
    }
}

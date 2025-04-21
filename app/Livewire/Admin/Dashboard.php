<?php

namespace App\Livewire\Admin;

use App\Models\ReceivingScholarship;
use App\Models\StudentRegister;
use App\Models\User;
use App\Models\school;
use Livewire\Component;

class Dashboard extends Component
{
    public $student_sponsored;
    public $student_registers;
    public $teachers;
    public $awarded;
    public $total_money;

    public $schools;
    public function mount(){
        $this->student_sponsored = StudentRegister::where('status_id',9)->count();
        $this->student_registers = StudentRegister::where('status_id',8)->count();
        $this->teachers = User::where('role_id',2)->count();
        $this->schools = school::count();
        $this->awarded = ReceivingScholarship::count();
        $this->total_money = ReceivingScholarship::sum('scholarship');
    }
    public function render()
    {
        return view('livewire.admin.dashboard')->layout('Admin.components.layouts.app');
    }
}

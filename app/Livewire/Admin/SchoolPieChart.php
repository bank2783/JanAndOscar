<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SchoolPieChart extends Component
{
    public $sponsored_school_ratio;

    public function mount(){
        $data = DB::table('student_registers')
        ->join('schools','student_registers.school_id','=','schools.id')
        ->where('student_registers.status_id',9)
        ->select(
            'schools.school_name',
            DB::raw("COUNT(student_registers.id) as student_count")

        )
        ->groupBy('schools.school_name')
        ->orderBy('schools.school_name')->get();
        $this->sponsored_school_ratio = $data;
    }
    public function render()
    {
        return view('livewire.admin.school-pie-chart');
    }
}

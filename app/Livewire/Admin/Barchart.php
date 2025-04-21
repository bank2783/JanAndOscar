<?php

namespace App\Livewire\Admin;

use App\Models\School;
use App\Models\ReceivingScholarship;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
class Barchart extends Component
{
    public $schools_scholarships;

    public function mount(){

        $data = DB::table('receiving_scholarships')
    ->join('student_registers', 'receiving_scholarships.student_register_id', '=', 'student_registers.id')
    ->join('schools', 'student_registers.school_id', '=', 'schools.id')
    ->select(
        'schools.school_name as school_name',
        DB::raw('SUM(receiving_scholarships.scholarship) as scholarship_amount')
    )
    ->groupBy('schools.school_name')
    ->orderBy('schools.school_name')
    ->get();;

        

    $this->schools_scholarships = $data;

    }
    public function render()
    {
    
        
        return view('livewire.admin.barchart');
    }
}

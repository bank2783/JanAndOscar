<?php

namespace App\Livewire\Admin;

use App\Models\AcademicPerfomance;
use App\Models\StudentSponsored;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

class AcademicReport extends Component

{
    public $student_data;
    public $onselect_academic_performance;
    public $academic_performance;
    function mount(StudentSponsored $student){
        $this->student_data = $student;
        $this->academic_performance = AcademicPerfomance::where('student_register_id',$student->id)->get();
    }

    public function downloadPDF()
{
    
    // Prepare the base64 image
    
    $academic_performance = AcademicPerfomance::find($this->onselect_academic_performance);
    
    $base64logo = 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('LOGO/Logo-JO-pour-site-e1471510961440.png')));
   
    $academic_performance_base64 = 'data:image/jgp;base64,' . base64_encode(file_get_contents(public_path('storage/'.  $academic_performance->file_name)));


     
    // Pass the image to the view along with other data
    $pdf = Pdf::loadView('Admin.report.AcademicPerformanceReport', [
        'student_data' => $this->student_data,
        'base64logo' => $base64logo, // Pass the base64 image to the view
        'academic_performance_base64' => $academic_performance_base64,
        'academic_performance' =>  $academic_performance
    ]);

    // Stream the PDF to the browser for download
    return response()->streamDownload(function () use ($pdf) {
        echo $pdf->stream();
    }, 'academic_report.pdf');
}



    

    public function render()
    {
        
        return view('livewire.admin.academic-report')->layout('Admin.components.layouts.app');
    }
}

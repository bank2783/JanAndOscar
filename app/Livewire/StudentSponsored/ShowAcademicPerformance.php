<?php

namespace App\Livewire\StudentSponsored;

use App\Models\AcademicPerfomance;
use App\Models\StudentRegister;
use App\Models\StudentSponsored;
use Livewire\Component;
use Livewire\Attributes\Rule; 
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class ShowAcademicPerformance extends Component
{
    use WithFileUploads;
    public $student;

    #[Rule('required')]
    public $academic_image_upload;

    public $annotation;
 
    public function mount(StudentRegister $student){
        $this->student = $student;
    }
    public function render()
    {
        $student_academic_performance = AcademicPerfomance::where('student_register_id',$this->student->id)->get();
        return view('livewire.student-sponsored.show-academic-performance',compact('student_academic_performance'))->layout('Admin.components.layouts.app');
    }

    public function academicPerformanceFileUpload(){
        $this->validate();
            
            $academic_performance_file_path = $this->academic_image_upload->store('uploads/student_sponsored','public');
            AcademicPerfomance::create([
                'file_name' => $academic_performance_file_path,
                'annotation' => $this->annotation,
                'student_register_id' => $this->student->id,
            ]
            );

        session()->flash('insert_massage','student data updated!');
    }

    public function deletePhoto($id){
        $academic_performance = AcademicPerfomance::find($id);

        if($academic_performance){
            Storage::delete($academic_performance->file_name);
            $academic_performance->delete();
        }
    }
}

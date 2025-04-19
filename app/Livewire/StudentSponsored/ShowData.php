<?php

namespace App\Livewire\StudentSponsored;

use App\Models\StudentParents;
use App\Models\StudentRegister;
use App\Models\StudentSponsored;
use App\Models\StudentSponsoredParents;
use Livewire\Component;
use Livewire\Attributes\Rule; 

class ShowData extends Component
{
    public $student_data;

    public $editing_student_id;

    #[Rule('required')]
    public $editing_student_name;
    #[Rule('required')]
    public $editing_student_tel;
    #[Rule('required')]
    public $editing_student_line_id;
    #[Rule('required')]
    public $editing_student_education_level;
    #[Rule('required')]
    public $editing_student_google_map_link;
    #[Rule('required')]
    public $editing_student_address;
    
    public $editing_student_note;
    

    #[Rule('required')]
    public $editing_parent_name;
    #[Rule('required')]
    public $editing_parent_tel;
    #[Rule('required')]
    public $editing_parent_line_id;
    #[Rule('required')]
    public $editing_parent_address;
    #[Rule('required')] 
    public $editing_parent_google_map_link;
    


    public function mount(StudentRegister $student){
        $this->student_data = $student;
    }

    public function edit($id){
        $this->editing_student_id = $id;
        $student = StudentRegister::find($id);
        if(!$student){
            return;
        }
 
        $this->editing_student_name = $student->student_name;
        $this->editing_student_tel = $student->tel;
        $this->editing_student_line_id = $student->line_id;
        $this->editing_student_education_level = $student->education_level;
        $this->editing_student_google_map_link = $student->google_map_link;
        $this->editing_student_address = $student->address;
        $this->editing_student_note = $student->note;

        $this->editing_parent_name = $student->studentParent->parent_name;
        $this->editing_parent_tel = $student->studentParent->tel;
        $this->editing_parent_line_id = $student->studentParent->line_id;
        $this->editing_parent_google_map_link = $student->studentParent->google_map_link;
        $this->editing_parent_address = $student->studentParent->address;

        $this->student_data = $student;
    }

    public function update(){
        $this->validate();
        $student = StudentRegister::find($this->student_data->id);
        if($student){
            $student->update([
                'student_name' => $this->editing_student_name,
                'tel' => $this->editing_student_tel,
                'line_id' => $this->editing_student_line_id,
                'address' => $this->editing_student_address,
                'education_level' => $this->editing_student_education_level,
                'google_map_link' => $this->editing_student_google_map_link,
            ]);
        }

        $student_parent = StudentParents::where('student_sponsored_id',$this->student_data->id);

        if($student_parent){
            $student_parent->update([
                'parent_name' => $this->editing_parent_name,
                'tel' => $this->editing_parent_tel,
                'line_id' => $this->editing_parent_line_id,
                'google_map_link' => $this->editing_parent_google_map_link,
                'address' => $this->editing_parent_address
            ]);
        }
        session()->flash('insert_massage','student data updated!');
        $this->cancelEdit();
        $this->student_data = $this->student_data->fresh();
    }

    public function cancelEdit(){
        $this->reset([
            'editing_student_id',
            'editing_student_name',
            'editing_student_tel',
            'editing_student_line_id',
            'editing_student_education_level',
            'editing_student_google_map_link',
            'editing_student_address',
            'editing_parent_name',
            'editing_parent_tel',
            'editing_parent_line_id',
            'editing_parent_google_map_link',
            'editing_parent_address'

        ]);
    }

    public function render()
    {
        return view('livewire.student-sponsored.show-data')->layout('Admin.components.layouts.app');
    }

    
}

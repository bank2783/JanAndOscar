<?php

namespace App\Livewire\Admin;

use App\Models\School;
use App\Models\StudentParents;
use App\Models\StudentRegister;
use Livewire\Component;

class CreateStudent extends Component
{
    public $student_name;
    public $student_tel;
    public $student_line_id;
    public $education_level;
    public $student_address;
    public $student_google_map_link;
    public $school;
    public $parent_name;
    public $parent_tel;
    public $parent_line_id;
    public $parent_address;
    public $parent_google_map_link;


    public function createStudent(){
        $this->validate([
            'student_name' => 'required|string|max:255',
            'student_tel' => 'required|string|max:15',
            'student_line_id' => 'required|string|max:50',
            'education_level' => 'required|string|max:100',
            'student_address' => 'required|string|max:255',
            'student_google_map_link' => 'nullable|string|max:255',
            'parent_name' => 'required|string|max:255',
            'parent_tel' => 'required|string|max:15',
            'parent_line_id' => 'required|string|max:50',
            'parent_address' => 'required|string|max:255',
            'parent_google_map_link' => 'nullable|string|max:255',           
        ]);

        $create_student = StudentRegister::create([
            'student_name' => $this->student_name,
            'tel' => $this->student_tel,
            'address' => $this->student_address,
            'line_id' => $this->student_line_id,
            'google_map_link' => $this->student_google_map_link,
            'education_level' => $this->education_level,
            'status_id' => 9,
            'school_id' => $this->school
        ]);
        if($create_student){
            $student_parent = StudentParents::create([
                'parent_name' => $this->parent_name,
                'tel' => $this->parent_tel,
                'line_id' => $this->parent_line_id,
                'google_map_link' => $this->parent_google_map_link,
                'address' => $this->parent_address,
                'student_register_id' => $create_student->id,
                'status' => 0
            ]);
            
            if($create_student and $student_parent){
                return session()->flash('success','Uploaded successfully.');
            }
        }

    }
    public function render()
    {
        $schools = School::all();
        return view('livewire.admin.create-student',compact('schools'))->layout('Admin.components.layouts.app');
    }
}

<?php

namespace App\Livewire\Admin;

use App\Models\ReceivingScholarship as ModelsReceivingScholarship;
use App\Models\StudentRegister;
use App\Models\ReceivingScholarship as ReceivingScholarshipModel;
use Livewire\Component;

class ReceivingScholarship extends Component
{
    public $student_data;

    public $scholarship;
    public $annotation;


    public $editing_receiving_scholarship_id;
    public $editing_scholarship;
    public $editing_annotation;


    public function mount(StudentRegister $student){
        $this->student_data =  $student;
    }
    public function render()
    {
        $scholarship_data = ModelsReceivingScholarship::where('student_register_id',$this->student_data->id)->get();
        return view('livewire.admin.receiving-scholarship',compact('scholarship_data'))->layout('Admin.components.layouts.app');
    }

    public function insertData(){
          
        $this->validate([
            'scholarship' => 'required',
            'annotation' => 'required'
        ]);
             
        $insert = ModelsReceivingScholarship::create([
            'scholarship' => $this->scholarship,
            'annotation' => $this->annotation,
            'student_register_id' => $this->student_data->id,
        ]);
        if($insert){
            session()->flash('success','Uploaded successfully.');
        }
    }

    public function edit($id){
        $this->editing_receiving_scholarship_id = $id;
        $receiving_scholarship = ModelsReceivingScholarship::find($id);
        if(!$receiving_scholarship){
            return;
        }

        $this->editing_scholarship = $receiving_scholarship->scholarship;
        $this->editing_annotation = $receiving_scholarship->annotation;
        
        $this->student_data->StudentReceivingScholarship = $receiving_scholarship;
    }

    public function cancelEdit(){
        $this->reset([
            'editing_receiving_scholarship_id',
            'editing_scholarship',
            'editing_annotation'
        ]);
    }
    public function update($scholarship_id){
        $this->validate([
            'editing_scholarship' => 'required',
            'editing_annotation' => 'required'
        ]);
        $receiving_scholarship = ModelsReceivingScholarship::find($scholarship_id)->update([
            'scholarship' => $this->editing_scholarship,
            'annotation' => $this->editing_annotation,
            'student_register_id' => $this->student_data->id
        ]);

        if($receiving_scholarship){
        session()->flash('insert_massage','student data updated!');
        $this->cancelEdit();
        $this->student_data = $this->student_data->fresh();
        }   
    }

    public function delete(ReceivingScholarshipModel $scholarship){
        $scholarship->delete();
        if($scholarship){
            session()->flash('insert_massage','student data updated!');
        }
    }


}

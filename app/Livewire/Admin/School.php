<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\School as schoolModel;

class School extends Component
{
    public $editing_school_id;
    public $editing_school_name;

    public $search = '';
    
    public function edit($id){
        $school = schoolModel::find($id);
        if(!$school){
            return;
        }
        $this->editing_school_name = $school->school_name;
        $this->editing_school_id = $id;

    }

    public function cancelEdit(){
        $this->reset([
            'editing_school_id',
            'editing_school_name'
        ]);
    }

    public function update($id){
        $this->validate([
            'editing_school_name' => 'required'

        ]);
        $update = schoolModel::find($id)->update([
            'school_name' => $this->editing_school_name
        ]);
        if($update){
            session()->flash('insert_massage','student data updated!');
            $this->cancelEdit();  
        }
    }
    public function delete(schoolModel $school){
        $school->delete();
        if($school){
            session()->flash('insert_massage','delete is successfully!');
        }
    }
    public function render()
    {
        if(strlen($this->search) >=1){
            $schools = schoolModel::where('school_name','like','%'.$this->search.'%')->get();
        }else{
            $schools = schoolModel::all();
        }
        
        return view('livewire.admin.school',compact('schools'))->layout('Admin.components.layouts.app');
    }
}

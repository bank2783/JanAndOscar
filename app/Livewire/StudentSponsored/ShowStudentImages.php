<?php

namespace App\Livewire\StudentSponsored;

use App\Models\StudentRegister;
use App\Models\StudentRegisterPhotos;
use App\Models\StudentSponsored;
use App\Models\StudentSponsoredPhotos;
use Livewire\Component;
use Livewire\Attributes\Rule; 
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ShowStudentImages extends Component
{
    use WithFileUploads;
    public $student_images;
    public $student_data;

    #[Rule('required')]
    public $images_upload_file = [];

    public function mount(StudentRegister $student){
        $this->student_data = $student;
        
    }

    public function UploadImages(){
        $this->validate();
        foreach($this->images_upload_file as $file){
            $student_sponsored_file_path = $file->store('uploads/student_sponsored','public');
            StudentRegisterPhotos::create([
                'file_name' => $student_sponsored_file_path,
                'student_register_id' => $this->student_data->id,
            ]);
        }
        session()->flash('insert_massage','student data updated!');
        
    }

    public function deletePhoto($id){
        $student_image = StudentRegisterPhotos::find($id);

        if($student_image){
            Storage::delete($student_image->file_name);
            $student_image->delete();
        }
    }
    public function render()
    {
        $this->student_images = StudentRegisterPhotos::where('student_register_id',$this->student_data->id)->get();
        return view('livewire.student-sponsored.show-student-images')->layout('Admin.components.layouts.app');
    }
}

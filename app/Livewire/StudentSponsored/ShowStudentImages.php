<?php

namespace App\Livewire\StudentSponsored;

use App\Models\StudentRegisterPhotos;
use App\Models\StudentSponsored;
use App\Models\StudentSponsoredPhotos;
use Livewire\Component;
use Livewire\Attributes\Rule; 
use Livewire\WithFileUploads;

class ShowStudentImages extends Component
{
    use WithFileUploads;
    public $student_images;
    public $student_data;

    #[Rule('required')]
    public $images_upload_file = [];

    public function mount(StudentSponsored $student){
        $this->student_data = $student;
        $this->student_images = $student->StudentSponsoredPhoto()->get();
    }

    public function UploadImages(){
        $this->validate();
        foreach($this->images_upload_file as $file){
            $student_sponsored_file_path = $file->store('uploads/student_sponsored','public');
            StudentSponsoredPhotos::create([
                'file_name' => $student_sponsored_file_path,
                'studentSponsored_id' => $this->student_data->id,
            ]);
        }
    }
    public function render()
    {
        
        return view('livewire.student-sponsored.show-student-images')->layout('Admin.components.layouts.app');
    }
}

<?php

namespace App\Livewire;

use App\Models\CertificationDocument;
use App\Models\Financial;
use App\Models\RegisterPoint;
use App\Models\StudentParents;
use App\Models\StudentRegister as Student;
use App\Models\StudentParentsFileUploads;
use App\Models\StudentRegisterHomePhotos;
use App\Models\StudentRegisterPhotos;
use App\Models\School;
use App\Models\StudentRegisterFileUploads;
use App\Models\StudyLevel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithFileUploads;

class StudentRegister extends Component
{
    use WithFileUploads;
    public $student_name;
    public $student_address;
    public $student_tel;
    public $student_line_id;
    public $student_google_map_link;
    public $student_education_level;
    public $school_id;
    
    public $student_copy_of_birth_cercificate;
    public $student_copy_of_id_card;
    public $student_copy_of_house_registration; 
    public $essay;
    public $student_selft_image = [];

    public $student_selft_house = [];

    public $parent_name, $parent_tel, $parent_line_id, $parent_address, 
    $parent_google_map_link;

    public $parent_copy_of_house_registration, $parent_copy_of_id_card;

    public $study_point;
    public $financial_point;

    public $data_guarantee_document;
    public $financial_guarantee_document;

    public $certificate_point;

    public function render()
    {
        $schools = School::all();
        $study_level = StudyLevel::all();
        $financial = Financial::all();
        
        return view('livewire.student-register',compact('schools','study_level','financial'));
    }


    public function insert(){
        // dd($this->student_tel);
        // dd($this->school_id,$this->student_name,$this->student_address,$this->student_tel,$this->student_line_id,$this->student_google_map_link);
        // dd($this->essay,$this->student_copy_of_birth_cercificate,$this->student_copy_of_id_card,$this->student_copy_of_house_registration);
        $this->validate([
            'student_name' => 'required',
            'student_address' => 'required',
            
            
            'student_google_map_link' => 'required',
            'student_education_level' => 'required',
            'school_id' => 'required|exists:schools,id',
            'essay' => 'required',
            'student_copy_of_birth_cercificate' => 'required',
            'student_copy_of_id_card' => 'required',
            'student_copy_of_house_registration' => 'required',
            'student_selft_image' => 'required',
            'student_selft_house' => 'required',
            'parent_name' => 'required',
            'parent_tel' => 'required',
            'parent_line_id' => 'required',
            'parent_address' => 'required',
            'parent_google_map_link' => 'required',
            'parent_copy_of_house_registration' => 'required',
            'parent_copy_of_id_card' => 'required',

            'study_point' => 'required',
            'financial_point' => 'required',
            'data_guarantee_document' => 'nullable',
            'financial_guarantee_document' => 'nullable',


            
        ]);


        $student_insert = Student::create([
            'student_name' => $this->student_name,
            'address' => $this->student_address,
            'tel' => $this->student_tel,
            'line_id' => $this->student_line_id,
            'google_map_link' => $this->student_google_map_link,
            'education_level' => $this->student_education_level,
            'status_id' => 8,
            'user_id' => Auth::user()->id,
            'school_id' => $this->school_id,
        ]);

        

        if(!$this->data_guarantee_document and !$this->financial_guarantee_document){
            CertificationDocument::create([
                'data_guarantee_document' => null,
                'financial_guarantee' => null,
                'student_register_id' => $student_insert->id
            ]);
            $this->certificate_point = 0;
        }elseif($this->data_guarantee_document and !$this->financial_guarantee_document){
            $data_guarantee_document_path = $this->data_guarantee_document->store('uploads/student_register/Certification','public');
            CertificationDocument::create([
                'data_guarantee_document' => $data_guarantee_document_path,
                'financial_guarantee' => null,
                'student_register_id' => $student_insert->id
            ]);
            $this->certificate_point = 50;
        }elseif(!$this->data_guarantee_document and $this->financial_guarantee_document){
            $financial_guarantee_document_path = $this->financial_guarantee_document->store('uploads/student_register/Certification','public');
            CertificationDocument::create([
                'data_guarantee_document' => null,
                'financial_guarantee' => $financial_guarantee_document_path,
                'student_register_id' => $student_insert->id
            ]);
            $this->certificate_point = 50;
        }elseif($this->data_guarantee_document and $this->financial_guarantee_document){
            $data_guarantee_document_path = $this->data_guarantee_document->store('uploads/student_register/Certification','public');
            $financial_guarantee_document_path = $this->financial_guarantee_document->store('uploads/student_register/Certification','public');
            CertificationDocument::create([
                'data_guarantee_document' => $data_guarantee_document_path,
                'financial_guarantee_document' => $financial_guarantee_document_path,
                'student_register_id' => $student_insert->id
            ]);
            $this->certificate_point = 100;
        }

        $register_point = RegisterPoint::create([
            'total_point' => $this->study_point + $this->financial_point,
            'student_register_id' => $student_insert->id
        ]);
        
        

        if($this->student_copy_of_birth_cercificate){
            $student_copy_of_birth_cercificate_file_path = $this->student_copy_of_birth_cercificate->store('uploads/student_register','public');
        }

        if($this->student_copy_of_id_card){
            $student_copy_of_id_card_file_path = $this->student_copy_of_id_card->store('uploads/student_register','public');
        }

        if($this->student_copy_of_house_registration){
            $student_copy_of_house_registration_file_path = $this->student_copy_of_house_registration->store('uploads/student_register','public');
        }

        if($this->essay){
            $student_essay_file_path = $this->essay->store('uploads/student_register','public');
        }

        
        $student_insert_file_uploads = StudentRegisterFileUploads::create([
            'essay' => $student_essay_file_path,
            'copy_of_house_registration' =>$student_copy_of_house_registration_file_path,
            'copy_of_id_card' => $student_copy_of_id_card_file_path,
            'copy_of_birth_cercificate' =>  $student_copy_of_birth_cercificate_file_path,
            'student_register_id' => $student_insert->id
        ]);

        foreach($this->student_selft_image as $file){
            $student_selft_image_file_name = $file->store('uploads/student_register','public');
            $student_register_photos = StudentRegisterPhotos::create([
                'file_name' => $student_selft_image_file_name,
                'student_register_id' => $student_insert->id
            ]);
        }
        
        foreach($this->student_selft_house as $file){
            $student_selft_house_file_name = $file->store('uploads/student_register','public');
            $student_register_houses = StudentRegisterHomePhotos::create([
                'file_name' => $student_selft_house_file_name,
                'student_register_id' => $student_insert->id
            ]);
        }
        
        $student_parent = StudentParents::create([
            'parent_name' => $this->parent_name,
            'tel' => $this->parent_tel,
            'line_id' => $this->parent_line_id,
            'address' => $this->parent_address,
            'google_map_link' => $this->parent_google_map_link,
            'student_register_id' => $student_insert->id
        ]);


        if($this->parent_copy_of_house_registration){
            $parent_copy_of_house_registration_file_path = $this->parent_copy_of_house_registration->store('uploads/student_register','public');
        }

        if($this->parent_copy_of_id_card){
            $parent_copy_of_id_card_file_path = $this->parent_copy_of_id_card->store('uploads/student_register','public');
        }

        $student_parent_file_uploads = StudentParentsFileUploads::create([
            'copy_of_house_registration' => $parent_copy_of_house_registration_file_path,
            'copy_of_id_card' => $parent_copy_of_id_card_file_path,
            'student_register_id' => $student_insert->id
        ]);
        
        session()->flash('success','Uploaded successfully.');
        
    }
}

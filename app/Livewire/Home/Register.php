<?php

namespace App\Livewire\Home;

use App\Models\School;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $school_id;

    public $tel;

    public function render()
    {
        $schools = School::all();
        return view('livewire.home.register', compact('schools'));
    }

    public function insert()
    {
        $this->validate([
            'name' => 'required|min:2|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'school_id' => 'required',
            'tel' => 'required'
        ]);

        $insert_user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'status_id' => 1,
            'school_id' => $this->school_id,
            'role_id' => 2,
            'tel' => $this->tel
        ]);

        if($insert_user){
            redirect()->route('login');
        }

        // session()->flash('success', 'User registered successfully.');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'name' => 'required|min:2|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'school_id' => 'required',
        ]);
    }
}

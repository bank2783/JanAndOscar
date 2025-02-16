<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\Rule; 

class ShowUserData extends Component
{
    public $edit_user_id;
    
    #[Rule('required')]
    public $edit_user_name;
    #[Rule('required')]
    public $edit_user_email;
    #[Rule('required')]
    public $edit_user_tel;
    public function edit($id){
        $this->edit_user_id = $id;
        $user = User::find($id);
        if(!$user){
            return;
        }

        $this->edit_user_name = $user->name;
        $this->edit_user_email = $user->email;
        $this->edit_user_tel = $user->tel;

    }
    public function cancelEdit(){
        $this->reset([
            'edit_user_id',
            'edit_user_name',
            'edit_user_email',
            'edit_user_tel',
        ]);
    }

    public function update(){
        $this->validate();
        $user_update = User::find($this->edit_user_id)->update([
            'name' => $this->edit_user_name,
            'email' => $this->edit_user_email,
            'tel' => $this->edit_user_tel,
        ]);

        if($user_update){
            $this->cancelEdit();
        }else{
            return;
        }
    }
    
    public function render()
    {
        $user_data = User::find(Auth::user()->id)->first();
        return view('livewire.user.show-user-data',compact('user_data'));
    }
}

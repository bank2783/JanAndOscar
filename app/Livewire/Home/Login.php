<?php

namespace App\Livewire\Home;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;

class Login extends Component
{
    #[Rule('required|email')]
    public $email;

    #[Rule('required')]
    public $password;

    public function login()
    {
        // ตรวจสอบข้อมูล
        $this->validate();

        // พยายามล็อกอิน
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            // ล็อกอินสำเร็จ
            session()->flash('message', 'Login successful!');
            return redirect()->to('/'); // เปลี่ยนเส้นทางไปยังหน้า Dashboard
        } else {
            // ล็อกอินไม่สำเร็จ
            $this->addError('email', 'Invalid credentials.');
        }
    }

    public function render()
    {
        return view('livewire.home.login');
    }
}

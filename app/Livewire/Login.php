<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class Login extends Component
{
    #[Title('Login')]
    #[Layout('components.layouts.auth')]

    public $email;

    public $password;

    public function render()
    {
        return view('livewire.login');
    }

    public function login() {
        // dd($this->all());
        if(Auth::attempt([
            'email' => $this->email,
            'password' => $this->password
        ])) {
            return $this->redirect('/dashboard', navigate:true);
        } else {
            return $this->redirect('/login', navigate:true);
        }
    }
}

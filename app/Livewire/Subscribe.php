<?php

namespace App\Livewire;

use App\Models\Subscription;
use Livewire\Component;

class Subscribe extends Component
{
    public $name, $email;

    public function subscribe(){
        $this->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:subscriptions'
        ]);

        $subscribe = Subscription::create([
            'name' => $this->name,
            'email' => $this->email
        ]);

        if($subscribe){
          session()->flash('subscribedSuccess', 'Thanks. You have subscribed!');
        }
        else{
            session()->flash('subscribedFail', 'Failed to subscribe, try again!');
        }

    }
    public function render()
    {
        return view('livewire.subscribe');
    }
}

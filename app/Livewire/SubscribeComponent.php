<?php

namespace App\Livewire;

use App\Models\Subscription;
use Livewire\Component;

class SubscribeComponent extends Component
{
    public $email;

    public function subscribe(){
        $this->validate([
            'email' => ['required', 'email']
        ]);

        $subscribe = Subscription::create([
             'email' => $this->email
        ]);
        
        if($subscribe){
          $this->reset('email');
          session()->flash('subscribeSuccess', 'You have subscribed Successfully');
        }
        else{
            session()->flash('subscribeFail', 'You have subscribed Failed');
        }

       
    }

    public function render()
    {
        return view('livewire.subscribe-component');
    }
}

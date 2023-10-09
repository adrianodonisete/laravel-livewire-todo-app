<?php

namespace App\Livewire;

use Livewire\Component;

class Clicker extends Component
{
    public string $message = 'default';

    //https://www.youtube.com/watch?v=15KLG2UnCYE&list=PLqDySLfPKRn543NM_fTrJRdhjBgsogzSC&index=2
    public function handleClick()
    {
        try {
            dump('clicked');
        } catch (\Exception $e) {
            session()->flash('error', 'Fail to delete!');
            return;
        }
    }

    public function render()
    {
        return view('livewire.clicker');
    }
}

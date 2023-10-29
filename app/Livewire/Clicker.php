<?php

namespace App\Livewire;

use Livewire\Component;

class Clicker extends Component
{
    public string $message = 'default';
    public string $pagename;

    public function mount(string $pagename): void
    {
        $this->pagename = $pagename;
    }

    public function handleClick()
    {
        // https://www.youtube.com/watch?v=15KLG2UnCYE&list=PLqDySLfPKRn543NM_fTrJRdhjBgsogzSC&index=2
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

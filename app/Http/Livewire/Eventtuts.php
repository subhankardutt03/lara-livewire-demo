<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Eventtuts extends Component
{

    public function connected()
    {
        return $this->emit('testEvent');
    }

    public function render()
    {
        return view('livewire.eventtuts');
    }
}
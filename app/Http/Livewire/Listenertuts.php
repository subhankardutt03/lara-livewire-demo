<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Listenertuts extends Component
{

    protected $listeners = ['testEvent' => 'test'];

    public function test()
    {
        dd('jhfkjhg');
    }

    public function render()
    {
        return view('livewire.listenertuts');
    }
}
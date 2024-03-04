<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class Contact extends Component
{
    public function render()
    {
        return view('livewire.pages.contact');
    }
}

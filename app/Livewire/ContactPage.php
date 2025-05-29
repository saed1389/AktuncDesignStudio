<?php

namespace App\Livewire;

use Livewire\Component;

class ContactPage extends Component
{
    public function render()
    {
        $setting = getSetting();
        return view('livewire.contact-page', [
            'setting' => $setting,
        ]);
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;

class AboutPage extends Component
{
    public function render()
    {
        $setting = getSetting();
        return view('livewire.about-page', [
            'setting' => $setting,
        ]);
    }
}

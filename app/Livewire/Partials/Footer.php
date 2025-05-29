<?php

namespace App\Livewire\Partials;

use Livewire\Component;

class Footer extends Component
{
    public function render()
    {
        $setting = getSetting();
        return view('livewire.partials.footer',[
            'setting' => $setting,
        ]);
    }
}

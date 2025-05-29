<?php

namespace App\Livewire;

use App\Models\Slider;
use Livewire\Component;

class HomePage extends Component
{
    public function render()
    {
        $sliders = Slider::where('status', 1)->orderBy('sort_order', 'asc')->get();
        $setting = getSetting();
        return view('livewire.home-page', [
            'sliders' => $sliders,
            'setting' => $setting,
        ]);
    }
}

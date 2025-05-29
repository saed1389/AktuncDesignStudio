<?php

namespace App\Livewire\Partials;

use App\Models\Category;
use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        $categories = Category::where('status', 1)->get();
        $setting = getSetting();
        return view('livewire.partials.header', [
            'categories' => $categories,
            'setting' => $setting,
        ]);
    }
}

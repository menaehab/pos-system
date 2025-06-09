<?php

namespace App\Livewire;

use Livewire\Component;

class HomePage extends Component
{
    public function render()
    {
        return view('livewire.home-page')->layout('pages.layout', ['title' => __('keywords.home_page')]);
    }
}

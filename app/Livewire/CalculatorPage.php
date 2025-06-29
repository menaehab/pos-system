<?php

namespace App\Livewire;

use Livewire\Component;

class CalculatorPage extends Component
{
    public function render()
    {
        return view('livewire.calculator-page')->layout('pages.layout',[
            'title' => __('keywords.calculator')
        ]);
    }
}
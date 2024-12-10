<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Header extends Component
{
    public $store;

    public function __construct($store)
    {
        $this->store = $store;
    }

    public function render()
    {
        return view('components.header');
    }
}

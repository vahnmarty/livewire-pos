<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BadgeLabel extends Component
{
    public $label, $value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $value = 0)
    {
        $this->label = $label;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.badge-label');
    }
}

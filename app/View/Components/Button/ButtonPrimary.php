<?php

namespace App\View\Components\Button;

use Illuminate\View\Component;

class ButtonPrimary extends Component
{
    public $size;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($size = 'default')
    {
        $this->size = $size;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button.button-primary');
    }
}

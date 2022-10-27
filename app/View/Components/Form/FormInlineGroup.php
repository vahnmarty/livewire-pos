<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class FormInlineGroup extends Component
{
    public $required = false;
    public $label;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $required = false)
    {
        $this->label = $label;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.form-inline-group');
    }
}

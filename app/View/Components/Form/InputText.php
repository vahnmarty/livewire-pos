<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class InputText extends Component
{
    public $invalid = false;
    public $type;
    public $disabled = false;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($invalid = false, $type = 'text', $disabled = false)
    {
        $this->invalid = $invalid;
        $this->type = $type;
        $this->disabled = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input-text');
    }
}

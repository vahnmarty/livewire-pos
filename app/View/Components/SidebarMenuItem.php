<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SidebarMenuItem extends Component
{
    public $link = null;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($link = null)
    {
        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sidebar-menu-item');
    }
}

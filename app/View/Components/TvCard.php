<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TvCard extends Component
{
    public $series;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($series)
    {
        $this->series = $series;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tv-card');
    }
}

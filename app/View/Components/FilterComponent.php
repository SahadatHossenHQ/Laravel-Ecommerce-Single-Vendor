<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Helper\Sorting;

class FilterComponent extends Component
{
    public $sort;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($sort = null)
    {
        $this->sort = $sort;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $sorting = new Sorting();
        $lists    = $sorting->getList();
        return view('components.filter-component', compact('lists'));
    }
}

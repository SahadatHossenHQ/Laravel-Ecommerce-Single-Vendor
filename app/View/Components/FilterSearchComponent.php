<?php

namespace App\View\Components;

use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class FilterSearchComponent extends Component
{
    public $request;
    public $name;
    public $value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($request = null, $name = null, $value = null)
    {
        $this->request = $request;
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $brands = DB::table('brands')->where('status', true)->get();
        $colors = DB::table('colors')->where('status', true)->get();
        return view('components.filter-search-component', compact('brands', 'colors'));
    }
}

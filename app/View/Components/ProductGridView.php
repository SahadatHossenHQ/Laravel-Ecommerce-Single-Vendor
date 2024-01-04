<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductGridView extends Component
{
    public $product;
    public $classes;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($product, $classes = 'col-lg-3 col-md-3 col-sm-4 col-4')
    {
        $this->product = $product;
        $this->classes = $classes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.product-grid-view');
    }
}

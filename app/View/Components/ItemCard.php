<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ItemCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $name;
    public $type;
    public $region;
    public $image;
    public $desc;
    public $rating;
    public $maps;


    public function __construct($id, $name, $type, $region, $image, $desc, $rating, $maps)
    {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->region = $region;
        $this->image = $image;
        $this->desc = $desc;
        $this->rating = $rating;
        $this->maps = $maps;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.item-card');
    }
}

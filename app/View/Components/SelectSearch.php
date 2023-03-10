<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class SelectSearch extends Component
{
    public function __construct(public string $searchUrl = '', public string $entity)
    {
    }

    public function render(): View
    {
        return view('components.select-search');
    }
}

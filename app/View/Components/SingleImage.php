<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class SingleImage extends Component
{
    public function __construct(public ?string $url)
    {
    }

    public function render(): View
    {
        return view('components.single-image');
    }
}

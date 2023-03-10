<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class ErrorsComponent extends Component
{
    public function __construct(public array $errors = [])
    {
    }

    public function render(): View
    {
        return view('components.errors-component');
    }
}

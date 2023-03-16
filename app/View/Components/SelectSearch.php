<?php

namespace App\View\Components;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\View\Component;
use Illuminate\View\View;

class SelectSearch extends Component
{
    public function __construct(
        public string $entity,
        public string $label,
        public string $name,
        public bool $multiple,
        public Model|Collection|null $options = null
    ) {
    }

    public function render(): View
    {
        return view('components.select-search');
    }
}

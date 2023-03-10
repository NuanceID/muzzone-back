<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class ActionButtonsComponent extends Component
{
    public function __construct(public string $entity, public int $entityId, public string $entityPluraled = '')
    {
        $this->entityPluraled = str($this->entity)->plural();
    }

    public function render(): View
    {
        return view('components.action-buttons-component');
    }
}

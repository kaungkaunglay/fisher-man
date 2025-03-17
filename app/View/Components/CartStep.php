<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CartStep extends Component
{
    public $step;
    public $id;
    public $extraClass;
    public $isActive;

    public function __construct($step, $id, $extraClass = '')
    {
        $this->step = $step;
        $this->id = $id;
        $this->extraClass = $extraClass;

        $currentStep = min(request()->query('step', 1),5); 

        $this->isActive = $currentStep == $this->step;

        logger('Current Step: ' . $currentStep);
        logger('Step: ' . $this->step);
        logger('Is Active: ' . $this->isActive);
    }

    public function render()
    {
        return view('components.cart-step');
    }
}

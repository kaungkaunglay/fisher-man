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

        $currentStep = min(session('cart_step', 1),5); 

        if($currentStep == 5 && $step == 5)
        {
            session(['cart_step' => 1]);
        }
        
        $this->isActive = $currentStep == $this->step;

    }

    public function render()
    {
        return view('components.cart-step');
    }
}

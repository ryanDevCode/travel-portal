<?php

namespace App\Livewire;

use Livewire\Component;
use Exception;
use ParseError;
class CalculatorComponent extends Component
{
    public $expression = '';
    public $result = '';

    public function addNumber($number)
    {
        $this->expression .= $number;
        $this->calculate();
    }

    public function addOperator($operator)
    {
        $this->expression .= $operator;
        $this->calculate();
    }

    public function calculate()
    {
        try {
            $this->result = eval('return ' . $this->expression . ';');
        } catch (ParseError $e) {
            $this->result = 'Error';
        }
    }

    public function clear()
    {
        $this->expression = '';
        $this->result = '';
    }
    public function render()
    {
        return view('livewire.calculator-component');
    }
}

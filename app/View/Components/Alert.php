<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public $type;
    public $message;

    public function __construct($type, $message)
    {
        $this->type = $type;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $alertColors = $this->getAlertColors($this->type);
        return view('components.alert')->with($alertColors);
    }
    private function getAlertColors($type){
        $colors = [
            'success' => [
                'textColor' => 'blue-800',
                'borderColor' => 'blue-300',
                'bgColor' => 'blue-50',
                'darkTextColor' => 'blue-400',
                'darkBorderColor' => 'blue-800',
                'focusColor' => 'blue-400',
                'hoverBgColor' => 'blue-200',
            ],
            'fail' => [
                'textColor' => 'red-800',
                'borderColor' => 'red-300',
                'bgColor' => 'red-50',
                'darkTextColor' => 'red-400',
                'darkBorderColor' => 'red-800',
                'focusColor' => 'red-400',
                'hoverBgColor' => 'red-200',
            ],
        ];

        return $colors[$type] ?? $colors['success'];
    }
}

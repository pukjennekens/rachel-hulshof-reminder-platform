<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Icon extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $path = 'images/icons/' . $this->name . '.svg';

        if(file_exists(public_path($path))) {
            return view('components.icon', [
                'icon' => file_get_contents(public_path($path))
            ]);
        } else {
            return '<!-- Iccon niet gevonden: ' . $this->name . ' -->';
        }
    }
}

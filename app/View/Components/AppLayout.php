<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        // Render the main app layout view
        return view('layouts.app', [
            // Pass a global background class (like 'bg-gray-900') if needed for the layout
            'backgroundClass' => 'bg-gray-900 text-white min-h-screen' // You can change these classes as needed
        ]);
    }
}

<?php

namespace App\Http\ViewComposers;

use App\Models\Level;
use App\Models\Position;
use Illuminate\View\View;

class OptionComposer
{
    public function compose(View $view)
    {
        $levels = Level::orderBy('id', 'desc')->get();
        
        $positions = Position::orderBy('id', 'desc')->get();
        
        $view->with(compact('levels', 'positions'));
    }
}
<?php

namespace App\Http\ViewComposers;

use App\Models\Office;
use Illuminate\View\View;

class OfficePartComposer
{
    public function compose(View $view)
    {
        $offices = Office::with('parts')->orderBy('id', 'desc')->get();
        
        $view->with(compact('offices'));
    }
}
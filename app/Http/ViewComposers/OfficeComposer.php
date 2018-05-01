<?php

namespace App\Http\ViewComposers;

use App\Models\Office;
use Illuminate\View\View;

class OfficeComposer
{
    public function compose(View $view)
    {
        $offices = Office::orderBy('id', 'desc')->get();
        
        $view->with(compact('offices'));
    }
}
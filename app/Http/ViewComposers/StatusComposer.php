<?php

namespace App\Http\ViewComposers;

use App\Models\Status;
use Illuminate\View\View;

class StatusComposer
{
    public function compose(View $view)
    {
        $statuses = Status::get();
        
        $view->with(compact('statuses'));
    }
}
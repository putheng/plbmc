<?php

namespace App\Http\ViewComposers;

use App\Models\Group;
use Illuminate\View\View;

class GroupComposer
{
    public function compose(View $view)
    {
        $group = Group::orderBy('id', 'desc')->get();
        
        $view->with(compact('group'));
    }
}
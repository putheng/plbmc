<?php

namespace App\Http\Controllers\Officer;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataController extends Controller
{
    public function index()
    {
        $groups = Group::with(['offices'])->paginate(15);
        return view('data.index', compact(['groups']));
    }
    
    public function prints()
    {
        $groups = Group::with(['offices'])->get();
        return view('data.print', compact(['groups']));
    }
}

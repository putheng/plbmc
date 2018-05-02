<?php

namespace App\Http\Controllers\Officer;

use App\Models\{Level, Officer};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditOfficerController extends Controller
{
    public function level(Request $request, Officer $officer)
    {
        $this->validate($request, [
            'level' => 'required|exists:levels,id',
            'note' => 'required'
        ]);
        
        $officer->level_id = $request->level;
        $officer->save();
        
        $level = Level::find($request->level);
        $level->officers()->attach($officer);
        
        $level->officers()->where('note', 'empty')
            ->updateExistingPivot($officer->id, [
                'note' => $request->note,
            ]);
        
        
        return back()->withSuccess('Update successfuly!');
    }
}

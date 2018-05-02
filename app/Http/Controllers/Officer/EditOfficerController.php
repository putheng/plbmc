<?php

namespace App\Http\Controllers\Officer;

use App\Models\{Level, Officer, Position, Office};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditOfficerController extends Controller
{
    public function position(Request $request, Officer $officer)
    {
        $this->validate($request, [
            'position' => 'required|exists:positions,id',
            'note' => 'required'
        ]);
        
        $officer->position_id = $request->position;
        $officer->save();
        
        $position = Position::find($request->position);
        $position->officers()->attach($officer);
        
        $position->officers()->where('note', 'empty')
        ->updateExistingPivot($officer->id, [
            'note' => $request->note,
        ]);
        
        return back()->withSuccess('Update successfuly!');
    }
    
    public function level(Request $request, Officer $officer)
    {
        $this->validate($request, [
            'level' => 'required|exists:levels,id',
            'office' => 'required|exists:offices,id',
            'note' => 'required'
        ]);
        
        $officer->level_id = $request->level;
        $officer->office_id = $request->office;
        $officer->save();
        
        $level = Level::find($request->level);
        $office = Office::find($request->office);
        
        $level->officers()->attach($officer);
        
        $level->officers()->where('note', 'empty')
        ->updateExistingPivot($officer->id, [
            'note' => $request->note,
            'office_id' => $request->office,
        ]);
        
        
        return back()->withSuccess('Update successfuly!');
    }
}

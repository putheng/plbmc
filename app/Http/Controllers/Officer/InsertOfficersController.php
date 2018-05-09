<?php

namespace App\Http\Controllers\Officer;

use App\Models\{Office, Officer, Position, Level, Group};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InsertOfficersController extends Controller
{
    public function index()
    {
        return view('offices.insert');
    }
    
    public function store(Request $request)
    {
        $string = $request->text;
        $office = $request->office;
        
        $exp = str_replace("\t", "<==>", $string);
        
        $explode = explode('<==>', $exp);
        
        $lists = explode(PHP_EOL, $string);
        
        $data = [];
        $position = [];
        
        foreach($lists as $item){
            $explode =  explode(
                '<==>',
                str_replace("\t", "<==>", $item)
            );
            
            if(!empty($explode[1])){
                $data[] = [
                    'name' => $explode[0],
                    'indentify' => $explode[2],
                    'gender' => $explode[1],
                    'level_id' => Level::firstOrCreate(['name' => rtrim($explode[9], "\r")])->id,
                    'position_id' => Position::firstOrCreate(['name' => $explode[5]])->id,
                    'phone' => null,
                    'birthday' => $explode[3],
                    'start_word' => $explode[4],
                ];
            }else{
                $data[] = $explode[0];
            }
            
        }
        
        session()->put('main', $office);
        
        $main = [];
        $arr = [
			'១-', '២-', '៣-', '៤-', '៥-', '៦-', '៧-', '៨-', '៩-', '១០-',
			'១.', '២.', '៣.', '៤.', '៥.', '៦.', '៧.', '៨.', '៩.', '១០.'    
		];
        foreach($data as $value){
            if(!empty($value) && count($value) == 1){
                session()->put('main', str_replace($arr, '', $value));
            }
            
            $officeid = [
                'office_id' => Office::firstOrCreate(
                    [
                        'name' => session()->get('main'),
                        'parent_id' => $request->group,
                    ]
                )->id
            ];
            
            $main[] = array_flatten(array_merge($officeid, ['childrent' => $value]));
            
        }
        
        //dd($main);
        
        $sets = [];
        foreach($main as $key => $item){
            if(count($item) > 3){
                $officer = new Officer;
                
                $officer->name = $item[1];
                $officer->identity = $item[2];
                $officer->gender = $item[3];
                $officer->level_id = $item[4];
                $officer->position_id = $item[5];
                $officer->birthday = $item[7];
                $officer->start_word = $item[8];
                $officer->office_id = $item[0];
                
                $officer->save();
                
            }
            
            
        }
        return back();
        //dd($sets);
    }
    
    public function show()
    {
        $groups = Group::get();
        return view('officer.tree', compact('groups'));
    }
}

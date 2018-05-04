<?php

use Illuminate\Database\Seeder;

use App\Models\Position;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'ស្នងកា'],
            ['name' => 'ស្នងការរង'],
            ['name' => 'នាយការិយាល័យ'],
            ['name' => 'នាយរងការិយាល័យ'],
            ['name' => 'នាយផ្នែក ការិយាល័យ'],
            ['name' => 'នាយផ្នែក អធិកា'],
            ['name' => 'នាយផ្នែក វរៈ'],
			
            ['name' => 'នាយរងផ្នែក ការិយាល័យ'],
            ['name' => 'នាយរងផ្នែក អធិកា'],
            ['name' => 'នាយរងផ្នែក វរៈ'],
			
            ['name' => 'មន្រ្តី'],
        ];
        
        Position::insert($data);  
    }
}

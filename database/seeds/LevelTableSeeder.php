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
            ['name' => 'នាយផ្នែក'],
            ['name' => 'នាយរងផ្នែក'],
            ['name' => 'មន្រ្តី'],
        ];
        
        Position::insert($data);  
    }
}

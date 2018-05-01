<?php

use Illuminate\Database\Seeder;

use App\Models\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $value = [
            ['name' => 'មានមុខ'],
            ['name' => 'ច្បាប់'],
            ['name' => 'ឈឺ'],
            ['name' => 'បេសកកម្ម'],
            ['name' => 'រៀន'],
            ['name' => 'សេរី'],
            ['name' => 'ផ្ទេរ'],
            ['name' => 'មរណៈ'],
        ];
        
        Status::insert($value);
    }
}

<?php

use Illuminate\Database\Seeder;

use App\Models\Level;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
            ['name' => 'ពលបាលត្រី'],
            ['name' => 'ពលបាលទោ'],
            ['name' => 'ពលបាលឯក'],
            ['name' => 'ព្រិន្ទបាលទោ'],
            ['name' => 'ព្រិន្ទបាលឯក'],
            ['name' => 'អនុសេនីយ៍ត្រី'],
            ['name' => 'អនុសេនីយ៍ទោ'],
            ['name' => 'អនុសេនីយ៍ឯក'],
            ['name' => 'វរសេនីយ៍ត្រី'],
            ['name' => 'វរសេនីយ៍ទោ'],
            ['name' => 'វរសេនីយ៍ឯក'],
            ['name' => 'ឧត្តមសេនីយ៍ត្រី'],
            ['name' => 'ឧត្តមសេនីយ៍ទោ'],
            ['name' => 'ឧត្តមសេនីយ៍ឯក'],
        ];
        
        Level::insert($values);
 
    }
}

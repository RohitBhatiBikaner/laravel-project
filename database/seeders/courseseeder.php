<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class courseseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\course::factory(5)->create();
        // // \App\Models\course::factory()->create([
        // //     'name'=>'myseed',
        // //     'fees'=>150
        // ]);
    }
}

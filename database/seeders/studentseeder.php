<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class studentseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\student::factory(15)->create();
        // \App\Models\student::factory()->create([
        //     'name'=>'debhli',
        //     'mobile'=>'9664471727'
        // ]);

    }
}

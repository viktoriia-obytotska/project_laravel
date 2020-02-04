<?php

use Illuminate\Database\Seeder;

class PublicationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = \App\City::all();
        $owners = \App\Owner::all();

        for($i = 0; $i<=100; $i++)
        {
            $pub = new \App\Publication();
            $pub->city_id= $cities->random()->id;
            $pub->owner_id= $owners->random()->id;

            $pub->save();
        };

    }


}

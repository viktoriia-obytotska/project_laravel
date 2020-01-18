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
        $city_id = factory(App\City::class, 10)->create()->pluck('id')->toArray();
        $owner_id = factory(App\Owner::class, 5)->create()->pluck('id')->toArray();
        $book_id = factory(App\Book::class, 3)->create()->pluck('id')->toArray();

        $publications = factory(App\Publication::class, 100)->create()->each(function($pub)
        use ($city_id, $owner_id, $book_id) {
            $pub->city_id = Arr::random($city_id);
            $pub->owner_id = Arr::random($owner_id);
            $pub->book_id = Arr::random($book_id);
             $pub->save();
        });
    }


}

<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
                'user_id' => 1,
                'topic' => 'META',
                'body' => '
# Älska META!!

Jo visst vettu. Nu kan du ÄNTLIGEN posta meta-inlägg direkt in i flödet av nyheter. Du kan välja mellan:

* Att bara lägga in en länk
* Att skriva meta-inlägg
* Att infoga en (1) bild i ditt meta-inlägg
* Det går också att använda [markdown](https://guides.github.com/features/mastering-markdown/), för exempelvis fler bilder..

Kör hårt!',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

        DB::table('posts')->insert([
            'user_id' => 1,
            'topic' => "Haha kolla på den här otroligt roliga katten!",
            'body' => "Det ser ut som att saker böjra fungera! Fan va kul ![Image](http://media.giphy.com/media/11JTxkrmq4bGE0/giphy.gif)",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}

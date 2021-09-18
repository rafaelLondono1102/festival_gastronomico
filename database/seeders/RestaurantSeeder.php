<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurants')->insert([
            [
                'user_id' => 1,
                'name' => 'la vaca loca',
                'description' => 'comida de vaca muy buena',
                'city' => 'manizales',
                'phone' => '123',
                'category_id' => 1,
                'delivery' => 'y'
            ],
            [
                'user_id' => 1,
                'name' => 'la hamburguesa loca',
                'description' => 'hamborguesa',
                'city' => 'pereira',
                'phone' => '1321',
                'category_id' => 1,
                'delivery' => 'n'
            ],
            [
                'user_id' => 1,
                'name' => 'Pizza Feliz',
                'description' => 'comida italiana muy buena',
                'city' => 'armenia',
                'phone' => '897',
                'category_id' => 1,
                'delivery' => 'y'
            ],
            
        ]);
    }
}

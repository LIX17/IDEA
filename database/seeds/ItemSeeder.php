<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            ['type_id' => '1', 'name' => 'SLATTUM', 'image' => 'images\slattum.jpg', 'stock' => 10, 'price' => 1700000, 'description' => 'Upholstered bed frame, Knisa light grey 150x200cm'],
            ['type_id' => '1', 'name' => 'GRIMSBU', 'image' => 'images\grimsbu.jpg', 'stock' => 15, 'price' => 760000, 'description' => 'Bed frame, grey/Luröy 90x200cm'],
            ['type_id' => '2', 'name' => 'HATTEFJÄLL', 'image' => 'images\hattefjaell.jpg', 'stock' => 7, 'price' => 4800000, 'description' => 'Office chair with armrests, Smidig black'],
            ['type_id' => '2', 'name' => 'LOBERGET/BLYSKÄR', 'image' => 'images\loberget.jpg', 'stock' => 7, 'price' => 340000, 'description' => 'Swivel chair, white'],
            ['type_id' => '2', 'name' => 'ALEFJALL', 'image' => 'images\alefjall.jpg', 'stock' => 17, 'price' => 300000, 'description' => 'Office chair, beige'],
            ['type_id' => '2', 'name' => 'FJALLBERGET', 'image' => 'images\fjallberget.jpg', 'stock' => 10, 'price' => 350000, 'description' => 'Meeting chair, white colored oak wood'],
            ['type_id' => '2', 'name' => 'FLINTAN', 'image' => 'images\Flintan.jpg', 'stock' => 30, 'price' => 400000, 'description' => 'Office chair, gray and black'],
            ['type_id' => '2', 'name' => 'JARVFJALLET', 'image' => 'images\jarvfjallet.jpg', 'stock' => 50, 'price' => 340000, 'description' => 'Office chair with armrest, gray and black'],
            ['type_id' => '2', 'name' => 'POAENG', 'image' => 'images\poaeng.png', 'stock' => 7, 'price' => 240000, 'description' => 'White wooden chair'],
            ['type_id' => '2', 'name' => 'LANGFJALL', 'image' => 'images\LANGFJALL_Pink.jpg', 'stock' => 22, 'price' => 340000, 'description' => 'Pink office chair with armrest'],
            ['type_id' => '2', 'name' => 'LIDKULLEN', 'image' => 'images\LIDKULLEN.jpg', 'stock' => 5, 'price' => 440000, 'description' => 'Round swivel chair'],
            ['type_id' => '2', 'name' => 'MARKUS', 'image' => 'images\MARKUS.jpg', 'stock' => 15, 'price' => 280000, 'description' => 'Black office chair'],
            ['type_id' => '2', 'name' => 'TROLLBERGET', 'image' => 'images\TROLLBERGET.jpg', 'stock' => 37, 'price' => 300000, 'description' => 'Swivel chair, beige'],
            ['type_id' => '3', 'name' => 'TOMELILLA', 'image' => 'images\tomelilla.jpg', 'stock' => 50, 'price' => 170000, 'description' => 'Table lamp, nickel-plated/white 36cm'],
            ['type_id' => '3', 'name' => 'TERTIAL', 'image' => 'images\tertial.jpg', 'stock' => 70, 'price' => 170000, 'description' => 'Work lamp, dark grey'],
            ['type_id' => '4', 'name' => 'KULLEN', 'image' => 'images\kullen.jpg', 'stock' => 30, 'price' => 1400000, 'description' => 'Chest of 6 drawers, black-brown 140x72cm'],
            ['type_id' => '4', 'name' => 'ASKVOLL', 'image' => 'images\askvoll.jpg', 'stock' => 35, 'price' => 1400000, 'description' => 'Chest of 5 drawers, white stained oak effect/white 45x109cm'],
            ['type_id' => '5', 'name' => 'LINNMON/ALEX', 'image' => 'images\linnmon.jpg', 'stock' => 27, 'price' => 1500000, 'description' => 'Table, blue 150x75cm'],
            ['type_id' => '5', 'name' => 'FREDDE', 'image' => 'images\fredde.jpg', 'stock' => 19, 'price' => 3000000, 'description' => 'Desk, black 185x74x146cm']
        ]); 
    }
}

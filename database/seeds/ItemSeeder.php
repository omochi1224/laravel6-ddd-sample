<?php

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\Omochi\Shop\Infrastructure\Eloquents\EloquentItem::class, 50)->create();
    }

}

<?php

namespace Database\Seeders;

use App\Models\Phone;
use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PharIo\Manifest\Author;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Store::factory()
        ->times(3)
        ->create();

        foreach(Phone::all() as $phone){
            $stores = Store::inRandomOrder()->take(rand(1,3))->pluck('id');
            $phone->stores()->attach($stores);
        }
    }
}

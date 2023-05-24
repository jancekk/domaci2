<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Item;
use App\Models\Buyer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Buyer::truncate();
        Category::truncate();
        Item::truncate();
        
        $user = User::factory(5)->create();
        Buyer::factory(10)->create();
        Item::factory(5)->create();

        $cat1 = Category::create([
             'name' => 'Fashion',
             'slug' => 'fashion',
        ]);
        $cat2 = Category::create([
            'name' => 'Education',
            'slug' => 'education',
       ]);
       $cat3 = Category::create([
        'name' => 'Food',
        'slug' => 'food',
        ]);

        Item::factory(2)->create([
            'user_id'=>$user[0]->id,
            'category_id'=>$cat2->id
        ]);
        Item::factory(2)->create([
            'user_id'=>$user[1]->id,
            'category_id'=>$cat3->id
        ]);
    }
}

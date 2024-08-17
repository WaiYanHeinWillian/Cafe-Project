<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // \App\Models\User::factory()->create([
            //     'name' => 'Test User',
            //     'email' => 'test@example.com',
            // ]);

        // User::truncate();
        // Category::truncate();
        // Menu::truncate();

        $mgmg=User::factory()->create(['name'=>'mgmg','username'=>'mgmg']);
        $aungaung=User::factory()->create(['name'=>'aungaung','username'=>'aungaung']);

        $foods=Category::factory()->create(['name'=>'foods','slug'=>'foods']);
        $coffee=Category::factory()->create(['name'=>'coffeeanddrinks','slug'=>'coffeeanddrinks']);

        Menu::factory(2)->create(['category_id'=>$foods->id,'user_id'=>$mgmg->id]);
        Menu::factory(2)->create(['category_id'=>$coffee->id,'user_id'=>$aungaung->id]);



        }
}

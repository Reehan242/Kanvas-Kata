<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Raihan Hammam Sukma',
            'username' => 'raihan',
            'email' => 'raihan@gmail.com',
            'password' => bcrypt('12345')
        ]);

        User::factory(3)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug'=> 'web-programming'
        ]);
        Category::create([
            'name' => 'Personal',
            'slug'=> 'personal'
        ]);
        Category::create([
            'name' => 'Game Development',
            'slug'=> 'game-development'
        ]);

        Post::factory(20)->create();
        
        
        // User::create([
        //     'name' => 'Agnes Safira',
        //     'email' => 'Alexandra@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);


        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem placeat quas laborum fuga. Aspernatur amet ipsa perspiciatis eaque tenetur odit',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem placeat quas laborum fuga. Aspernatur amet ipsa perspiciatis eaque tenetur odit magnam dicta cumque, et quae placeat nemo tempore possimus facilis explicabo debitis quas? Accusamus, ratione voluptatibus voluptates, illum enim dolore distinctio explicabo quia reprehenderit ex odio architecto! Placeat aliquid, adipisci quod eius tenetur error excepturi nostrum ducimus sunt inventore ea illum libero explicabo nemo ratione cum expedita rerum, magnam amet voluptatibus alias non ad? Deleniti, voluptatum delectus exercitationem assumenda veritatis hic similique vitae facilis obcaecati et consequatur fugiat libero eius enim neque, labore sequi quam ipsa. Doloribus debitis culpa quibusdam?',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem placeat quas laborum fuga. Aspernatur amet ipsa perspiciatis eaque tenetur odit',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem placeat quas laborum fuga. Aspernatur amet ipsa perspiciatis eaque tenetur odit magnam dicta cumque, et quae placeat nemo tempore possimus facilis explicabo debitis quas? Accusamus, ratione voluptatibus voluptates, illum enim dolore distinctio explicabo quia reprehenderit ex odio architecto! Placeat aliquid, adipisci quod eius tenetur error excepturi nostrum ducimus sunt inventore ea illum libero explicabo nemo ratione cum expedita rerum, magnam amet voluptatibus alias non ad? Deleniti, voluptatum delectus exercitationem assumenda veritatis hic similique vitae facilis obcaecati et consequatur fugiat libero eius enim neque, labore sequi quam ipsa. Doloribus debitis culpa quibusdam?',
        //     'category_id' => 1,
        //     'user_id' => 2
        // ]);
        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem placeat quas laborum fuga. Aspernatur amet ipsa perspiciatis eaque tenetur odit',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem placeat quas laborum fuga. Aspernatur amet ipsa perspiciatis eaque tenetur odit magnam dicta cumque, et quae placeat nemo tempore possimus facilis explicabo debitis quas? Accusamus, ratione voluptatibus voluptates, illum enim dolore distinctio explicabo quia reprehenderit ex odio architecto! Placeat aliquid, adipisci quod eius tenetur error excepturi nostrum ducimus sunt inventore ea illum libero explicabo nemo ratione cum expedita rerum, magnam amet voluptatibus alias non ad? Deleniti, voluptatum delectus exercitationem assumenda veritatis hic similique vitae facilis obcaecati et consequatur fugiat libero eius enim neque, labore sequi quam ipsa. Doloribus debitis culpa quibusdam?',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Keempat',
        //     'slug' => 'judul-keempat',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem placeat quas laborum fuga. Aspernatur amet ipsa perspiciatis eaque tenetur odit',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem placeat quas laborum fuga. Aspernatur amet ipsa perspiciatis eaque tenetur odit magnam dicta cumque, et quae placeat nemo tempore possimus facilis explicabo debitis quas? Accusamus, ratione voluptatibus voluptates, illum enim dolore distinctio explicabo quia reprehenderit ex odio architecto! Placeat aliquid, adipisci quod eius tenetur error excepturi nostrum ducimus sunt inventore ea illum libero explicabo nemo ratione cum expedita rerum, magnam amet voluptatibus alias non ad? Deleniti, voluptatum delectus exercitationem assumenda veritatis hic similique vitae facilis obcaecati et consequatur fugiat libero eius enim neque, labore sequi quam ipsa. Doloribus debitis culpa quibusdam?',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
    }
}

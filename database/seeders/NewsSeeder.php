<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
<<<<<<< HEAD
use App\MOdels\News;
=======
use App\Models\News;
>>>>>>> 0a227c4 (Add localization support page)

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        News::factory()->count(10)->create();
    }
}

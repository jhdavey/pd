<?php

namespace Database\Seeders;

use App\Models\Build;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class BuildSeeder extends Seeder
{
    // Run the database seeds.

    public function run(): void
    {
        $tags = Tag::factory(3)->create();

        Build::factory(50)->hasAttached($tags)->create(new Sequence([
            'featured' => false,
        ], [
            'featured' => true,
        ]));
    }
}
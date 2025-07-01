<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::create([
            'title' => 'technology',
            'description' => 'lorem ipsum dolor sit amet',
        ]);
        Tag::create([
            'title' => 'car',
            'description' => 'lorem ipsum dolor sit amet2',
        ]);

    }
}

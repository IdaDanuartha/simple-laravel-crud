<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Catalog;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wearables = Category::create(['name' => 'Wearables', 'slug' => 'wearables']);
        $audio = Category::create(['name' => 'Audio', 'slug' => 'audio']);
        $gaming = Category::create(['name' => 'Gaming', 'slug' => 'gaming']);
        $accessories = Category::create(['name' => 'Accessories', 'slug' => 'accessories']);

        Catalog::create([
            'title' => 'Lumina Smartwatch Series II',
            'description' => 'A sleek white and silver smartwatch with a vibrant screen and advanced sensors.',
            'price' => 450.00,
            'image' => 'img/smartwatch_v2_1775707041055.png',
            'category_id' => $wearables->id,
        ]);

        Catalog::create([
            'title' => 'AeroPods Pearl Edition',
            'description' => 'Premium white true wireless earbuds with unmatched clarity.',
            'price' => 199.00,
            'image' => 'img/earbuds_v2_1775707056587.png',
            'category_id' => $audio->id,
        ]);

        Catalog::create([
            'title' => 'Neon Drift VR Headset',
            'description' => 'Vibrant neon red and blue VR headset for the modern metaverse.',
            'price' => 650.00,
            'image' => 'img/vr_v2_1775707071054.png',
            'category_id' => $gaming->id,
        ]);

        Catalog::create([
            'title' => 'RetroType Mechanical Keyboard',
            'description' => 'Retro custom mechanical keyboard with white, beige, and orange accents.',
            'price' => 185.00,
            'image' => 'img/keyboard_v2_1775707089862.png',
            'category_id' => $accessories->id,
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'nama' => 'Hidangan Pembuka',
                'slug' => 'hidangan-pembuka'
            ],
            [
                'nama' => 'Ramen',
                'slug' => 'ramen'
            ],
            [
                'nama' => 'Rice Set',
                'slug' => 'rice-set'
            ],
            [
                'nama' => 'Sushi Roll',
                'slug' => 'sushi-roll'
            ],
            [
                'nama' => 'Minuman',
                'slug' => 'minuman'
            ],
            [
                'nama' => 'Makanan Penutup',
                'slug' => 'makanan-penutup'
            ],
            // Tambahkan data kategori lainnya di sini
        ];

        // Memasukkan data ke dalam database
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

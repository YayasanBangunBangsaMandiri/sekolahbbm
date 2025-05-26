<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Berita Sekolah',
                'description' => 'Berita dan pengumuman terkait kegiatan sekolah',
            ],
            [
                'name' => 'Prestasi',
                'description' => 'Prestasi dan pencapaian siswa dan sekolah',
            ],
            [
                'name' => 'Kegiatan',
                'description' => 'Berbagai kegiatan yang diselenggarakan sekolah',
            ],
            [
                'name' => 'Artikel',
                'description' => 'Artikel pendidikan dan wawasan',
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
            ]);
        }
    }
} 
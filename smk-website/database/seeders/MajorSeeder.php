<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $majors = [
            [
                'name' => 'Teknik Komputer dan Jaringan',
                'code' => 'TKJ',
                'description' => 'Program keahlian yang mempelajari tentang komputer dan jaringan komputer',
            ],
            [
                'name' => 'Rekayasa Perangkat Lunak',
                'code' => 'RPL',
                'description' => 'Program keahlian yang mempelajari tentang pembuatan software',
            ],
            [
                'name' => 'Multimedia',
                'code' => 'MM',
                'description' => 'Program keahlian yang mempelajari tentang desain grafis dan multimedia',
            ],
            [
                'name' => 'Teknik Elektronika Industri',
                'code' => 'TEI',
                'description' => 'Program keahlian yang mempelajari tentang elektronika industri',
            ],
        ];

        foreach ($majors as $major) {
            Major::create($major);
        }
    }
}

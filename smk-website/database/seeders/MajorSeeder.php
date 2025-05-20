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
                'description' => 'Jurusan yang mempelajari tentang teknologi komputer dan jaringan.',
                'icon' => 'fas fa-network-wired',
            ],
            [
                'name' => 'Multimedia',
                'code' => 'MM',
                'description' => 'Jurusan yang mempelajari tentang desain grafis, animasi, dan multimedia.',
                'icon' => 'fas fa-photo-video',
            ],
            [
                'name' => 'Rekayasa Perangkat Lunak',
                'code' => 'RPL',
                'description' => 'Jurusan yang mempelajari tentang pengembangan software dan aplikasi.',
                'icon' => 'fas fa-laptop-code',
            ],
            [
                'name' => 'Akuntansi',
                'code' => 'AKT',
                'description' => 'Jurusan yang mempelajari tentang keuangan dan akuntansi.',
                'icon' => 'fas fa-calculator',
            ],
            [
                'name' => 'Administrasi Perkantoran',
                'code' => 'AP',
                'description' => 'Jurusan yang mempelajari tentang administrasi dan manajemen perkantoran.',
                'icon' => 'fas fa-briefcase',
            ],
        ];

        foreach ($majors as $major) {
            Major::create($major);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $staff = [
            [
                'name' => 'Dr. Ahmad Supriyadi, M.Pd.',
                'position' => 'Kepala Sekolah',
                'bio' => 'Berpengalaman lebih dari 20 tahun dalam dunia pendidikan dan manajemen sekolah.',
                'photo_url' => 'staff/kepsek.jpg',
                'email' => 'kepsek@smk.sch.id',
                'phone' => '08123456789',
                'type' => 'management',
            ],
            [
                'name' => 'Budi Santoso, S.Kom.',
                'position' => 'Ketua Jurusan TKJ',
                'bio' => 'Lulusan Teknik Informatika dengan pengalaman 10 tahun di industri IT.',
                'photo_url' => 'staff/kajur_tkj.jpg',
                'email' => 'tkj@smk.sch.id',
                'phone' => '08123456790',
                'type' => 'teacher',
            ],
            [
                'name' => 'Dewi Anggraini, S.Sn.',
                'position' => 'Ketua Jurusan Multimedia',
                'bio' => 'Desainer grafis profesional dengan pengalaman mengajar selama 8 tahun.',
                'photo_url' => 'staff/kajur_mm.jpg',
                'email' => 'mm@smk.sch.id',
                'phone' => '08123456791',
                'type' => 'teacher',
            ],
            [
                'name' => 'Eko Purnomo, S.T.',
                'position' => 'Ketua Jurusan RPL',
                'bio' => 'Pengembang software dengan pengalaman lebih dari 12 tahun di berbagai perusahaan teknologi.',
                'photo_url' => 'staff/kajur_rpl.jpg',
                'email' => 'rpl@smk.sch.id',
                'phone' => '08123456792',
                'type' => 'teacher',
            ],
            [
                'name' => 'Faridah Akmalia, S.E.',
                'position' => 'Ketua Jurusan Akuntansi',
                'bio' => 'Berpengalaman sebagai akuntan profesional selama 15 tahun sebelum mengajar.',
                'photo_url' => 'staff/kajur_akt.jpg',
                'email' => 'akuntansi@smk.sch.id',
                'phone' => '08123456793',
                'type' => 'teacher',
            ],
            [
                'name' => 'Gunawan Prasetyo, S.Pd.',
                'position' => 'Guru Matematika',
                'bio' => 'Mengajar matematika dengan metode yang menyenangkan dan mudah dipahami.',
                'photo_url' => 'staff/guru_matematika.jpg',
                'email' => 'matematika@smk.sch.id',
                'phone' => '08123456794',
                'type' => 'teacher',
            ],
            [
                'name' => 'Hana Kusuma, S.Pd.',
                'position' => 'Guru Bahasa Inggris',
                'bio' => 'Lulusan sastra Inggris dengan pengalaman mengajar di beberapa sekolah internasional.',
                'photo_url' => 'staff/guru_inggris.jpg',
                'email' => 'inggris@smk.sch.id',
                'phone' => '08123456795',
                'type' => 'teacher',
            ],
            [
                'name' => 'Irfan Maulana',
                'position' => 'Staff TU',
                'bio' => 'Menangani administrasi sekolah dengan efisien dan teliti.',
                'photo_url' => 'staff/tu.jpg',
                'email' => 'tu@smk.sch.id',
                'phone' => '08123456796',
                'type' => 'staff',
            ],
        ];

        foreach ($staff as $item) {
            Staff::create($item);
        }
    }
}

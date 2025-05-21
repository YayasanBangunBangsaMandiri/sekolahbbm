<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Major;
use App\Models\Post;
use App\Models\Staff;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'role' => 'admin',
        ]);

        // Buat jurusan
        $majors = [
            [
                'name' => 'Rekayasa Perangkat Lunak',
                'code' => 'rpl',
                'description' => 'Jurusan yang mempelajari pengembangan perangkat lunak dan aplikasi',
                'icon' => 'fas fa-laptop-code',
            ],
            [
                'name' => 'Teknik Komputer Jaringan',
                'code' => 'tkj',
                'description' => 'Jurusan yang mempelajari tentang jaringan komputer dan infrastruktur IT',
                'icon' => 'fas fa-network-wired',
            ],
            [
                'name' => 'Multimedia',
                'code' => 'mm',
                'description' => 'Jurusan yang mempelajari desain grafis, animasi, dan produksi multimedia',
                'icon' => 'fas fa-photo-video',
            ],
            [
                'name' => 'Akuntansi dan Keuangan Lembaga',
                'code' => 'akl',
                'description' => 'Jurusan yang mempelajari pembukuan keuangan dan akuntansi',
                'icon' => 'fas fa-calculator',
            ],
        ];

        foreach ($majors as $major) {
            Major::create($major);
        }

        // Buat staff
        $staff = [
            [
                'name' => 'Drs. Budi Santoso, M.Pd.',
                'position' => 'Kepala Sekolah',
                'bio' => 'Berpengalaman lebih dari 20 tahun di dunia pendidikan kejuruan',
                'photo_url' => null,
                'type' => 'management',
            ],
            [
                'name' => 'Ir. Siti Aminah, M.Kom.',
                'position' => 'Wakil Kepala Sekolah Bidang Kurikulum',
                'bio' => 'Ahli pengembangan kurikulum SMK berbasis industri',
                'photo_url' => null,
                'type' => 'management',
            ],
        ];

        foreach ($staff as $s) {
            Staff::create($s);
        }

        // Buat beberapa post
        $posts = [
            [
                'title' => 'Penerimaan Siswa Baru Tahun Ajaran 2025/2026',
                'content' => '<p>SMK Nusantara membuka pendaftaran siswa baru untuk tahun ajaran 2025/2026. Pendaftaran dapat dilakukan secara online melalui website resmi kami.</p><p>Persyaratan pendaftaran:</p><ul><li>Fotokopi ijazah/SKL SMP/MTs</li><li>Fotokopi akta kelahiran</li><li>Fotokopi kartu keluarga</li><li>Pas foto 3x4 (3 lembar)</li></ul><p>Untuk informasi lebih lanjut, silakan hubungi sekretariat sekolah.</p>',
                'slug' => 'penerimaan-siswa-baru-2025-2026',
                'category' => 'pengumuman',
                'featured_image' => null,
                'author_id' => 1,
            ],
            [
                'title' => 'Kunjungan Industri ke PT Teknologi Indonesia',
                'content' => '<p>Pada tanggal 15 Mei 2025, siswa-siswi jurusan Rekayasa Perangkat Lunak dan Teknik Komputer Jaringan melakukan kunjungan industri ke PT Teknologi Indonesia.</p><p>Kunjungan ini bertujuan untuk memberikan gambaran nyata kepada siswa tentang dunia kerja di bidang teknologi informasi. Siswa berkesempatan melihat langsung proses pengembangan software dan infrastruktur jaringan perusahaan.</p><p>Kegiatan ini merupakan bagian dari program link and match antara sekolah dan industri untuk mempersiapkan siswa memasuki dunia kerja.</p>',
                'slug' => 'kunjungan-industri-pt-teknologi-indonesia',
                'category' => 'kegiatan',
                'featured_image' => null,
                'author_id' => 1,
            ],
            [
                'title' => 'Prestasi Siswa dalam Lomba Kompetensi Siswa Tingkat Nasional',
                'content' => '<p>Selamat kepada Ananda Budi Pratama dari jurusan Multimedia yang berhasil meraih juara 1 dalam Lomba Kompetensi Siswa (LKS) tingkat nasional bidang Graphic Design Technology.</p><p>Prestasi ini merupakan bukti komitmen SMK Nusantara dalam mengembangkan kompetensi siswa sesuai standar industri. Semoga prestasi ini dapat memotivasi siswa-siswi lainnya untuk terus berprestasi.</p>',
                'slug' => 'prestasi-siswa-lks-nasional',
                'category' => 'prestasi',
                'featured_image' => null,
                'author_id' => 1,
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Penerimaan Siswa Baru Tahun Ajaran 2023/2024',
                'content' => '<p>SMK kita membuka pendaftaran untuk siswa baru tahun ajaran 2023/2024. Pendaftaran dapat dilakukan secara online melalui website kami atau datang langsung ke sekolah.</p><p>Syarat pendaftaran:</p><ul><li>Fotokopi ijazah SMP/sederajat</li><li>Fotokopi SKHUN</li><li>Fotokopi kartu keluarga</li><li>Fotokopi akta kelahiran</li><li>Pas foto 3x4</li></ul><p>Untuk informasi lebih lanjut, silakan hubungi 08123456789.</p>',
                'category' => 'pengumuman',
                'slug' => 'penerimaan-siswa-baru-2023-2024',
                'featured_image' => 'posts/penerimaan-siswa.jpg',
                'author_id' => 1,
            ],
            [
                'title' => 'Prestasi Siswa SMK di Lomba Kompetensi Siswa Nasional',
                'content' => '<p>Kami dengan bangga mengumumkan bahwa siswa-siswi SMK kita berhasil meraih juara di Lomba Kompetensi Siswa Nasional 2023. Berikut adalah daftar prestasi yang berhasil diraih:</p><ul><li>Juara 1 Kategori Web Design - Budi Santoso (XII RPL)</li><li>Juara 2 Kategori Networking - Dewi Anggraini (XII TKJ)</li><li>Juara 3 Kategori Animation - Eko Purnomo (XII MM)</li></ul><p>Selamat kepada para juara! Kami bangga atas prestasi yang telah kalian raih dan semoga menjadi motivasi bagi siswa lainnya.</p>',
                'category' => 'berita',
                'slug' => 'prestasi-siswa-lks-nasional',
                'featured_image' => 'posts/lomba-kompetensi.jpg',
                'author_id' => 2,
            ],
            [
                'title' => 'Kunjungan Industri ke PT Teknologi Indonesia',
                'content' => '<p>Sebagai bagian dari program pembelajaran, SMK kita telah melaksanakan kunjungan industri ke PT Teknologi Indonesia pada tanggal 10 Mei 2023. Kunjungan ini diikuti oleh siswa kelas XI jurusan TKJ, RPL, dan MM.</p><p>Dalam kunjungan tersebut, siswa mendapatkan kesempatan untuk melihat langsung proses pengembangan software dan hardware yang dilakukan oleh PT Teknologi Indonesia. Selain itu, siswa juga mendapatkan penjelasan tentang perkembangan teknologi terkini dan prospek karir di bidang IT.</p><p>Kegiatan ini sangat bermanfaat bagi siswa untuk menambah wawasan dan pengalaman mereka di dunia industri.</p>',
                'category' => 'kegiatan',
                'slug' => 'kunjungan-industri-pt-teknologi-indonesia',
                'featured_image' => 'posts/kunjungan-industri.jpg',
                'author_id' => 1,
            ],
            [
                'title' => 'Workshop Digital Marketing untuk Siswa SMK',
                'content' => '<p>SMK kita bekerja sama dengan Google Indonesia telah menyelenggarakan workshop Digital Marketing untuk siswa kelas XI dan XII pada tanggal 15 Juni 2023. Workshop ini bertujuan untuk memberikan pengetahuan dan keterampilan tentang pemasaran digital kepada siswa.</p><p>Materi yang disampaikan dalam workshop meliputi:</p><ul><li>Pengenalan digital marketing</li><li>Search engine optimization (SEO)</li><li>Social media marketing</li><li>Content marketing</li><li>Email marketing</li></ul><p>Workshop ini diharapkan dapat membekali siswa dengan keterampilan digital marketing yang sangat dibutuhkan di era digital saat ini.</p>',
                'category' => 'kegiatan',
                'slug' => 'workshop-digital-marketing',
                'featured_image' => 'posts/workshop-digital-marketing.jpg',
                'author_id' => 2,
            ],
            [
                'title' => 'Jadwal Ujian Akhir Semester Ganjil 2023/2024',
                'content' => '<p>Berikut adalah jadwal ujian akhir semester ganjil tahun ajaran 2023/2024:</p><table class="table table-bordered"><thead><tr><th>Tanggal</th><th>Mata Pelajaran</th><th>Waktu</th></tr></thead><tbody><tr><td>20 Desember 2023</td><td>Bahasa Indonesia</td><td>07.30 - 09.30</td></tr><tr><td>20 Desember 2023</td><td>Matematika</td><td>10.00 - 12.00</td></tr><tr><td>21 Desember 2023</td><td>Bahasa Inggris</td><td>07.30 - 09.30</td></tr><tr><td>21 Desember 2023</td><td>IPA/IPS</td><td>10.00 - 12.00</td></tr><tr><td>22 Desember 2023</td><td>Mata Pelajaran Kejuruan</td><td>07.30 - 09.30</td></tr></tbody></table><p>Pastikan untuk mempersiapkan diri dengan baik. Semoga sukses!</p>',
                'category' => 'pengumuman',
                'slug' => 'jadwal-ujian-akhir-semester-ganjil-2023-2024',
                'featured_image' => 'posts/jadwal-ujian.jpg',
                'author_id' => 1,
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}

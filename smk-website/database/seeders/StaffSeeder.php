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
                'name' => 'Leslie Medema',
                'position' => 'Head of School',
                'bio' => 'With over 20 years in progressive education, Leslie brings a wealth of experience in sustainable education leadership. She has dedicated her career to developing learning environments that nurture the whole child while fostering environmental stewardship.',
                'photo_url' => 'images/staff/head-of-school.jpg',
                'email' => 'head@greenschool.org',
                'phone' => '+62 361 469 875',
                'type' => 'leadership',
                'order' => 1,
            ],
            [
                'name' => 'Wayan Supriyadi',
                'position' => 'Director of Sustainability',
                'bio' => 'Born and raised in Bali, Wayan combines traditional ecological knowledge with modern sustainability science. He oversees all environmental initiatives on campus and ensures sustainability principles are integrated across the curriculum.',
                'photo_url' => 'images/staff/sustainability-director.jpg',
                'email' => 'sustainability@greenschool.org',
                'phone' => '+62 361 469 876',
                'type' => 'leadership',
                'order' => 2,
            ],
            [
                'name' => 'Sarah Johnson',
                'position' => 'Primary School Principal',
                'bio' => 'With a background in progressive education and child development, Sarah leads our Primary School program with a focus on nature-connected learning and foundational skills development through experiential education.',
                'photo_url' => 'images/staff/primary-principal.jpg',
                'email' => 'primary@greenschool.org',
                'phone' => '+62 361 469 877',
                'type' => 'leadership',
                'order' => 3,
            ],
            [
                'name' => 'Michael Green',
                'position' => 'Middle/High School Principal',
                'bio' => 'Michael brings 15 years of experience in international education to his leadership of our secondary program, emphasizing project-based learning and preparation for global green leadership.',
                'photo_url' => 'images/staff/secondary-principal.jpg',
                'email' => 'secondary@greenschool.org',
                'phone' => '+62 361 469 878',
                'type' => 'leadership',
                'order' => 4,
            ],
            [
                'name' => 'Ni Made Kartiasih',
                'position' => 'Balinese Studies Teacher',
                'bio' => 'Made shares her deep knowledge of Balinese culture, language, and traditional arts with our students. Her classes integrate cultural sustainability with environmental principles, highlighting the interconnection between cultural and natural heritage.',
                'photo_url' => 'images/staff/balinese-teacher.jpg',
                'email' => 'balinese@greenschool.org',
                'phone' => '+62 361 469 879',
                'type' => 'teacher',
                'order' => 5,
            ],
            [
                'name' => 'David Wilson',
                'position' => 'Green Studies Coordinator',
                'bio' => 'With a background in environmental science and outdoor education, David oversees our signature Green Studies program. He develops hands-on learning experiences that connect students with nature while building practical sustainability skills.',
                'photo_url' => 'images/staff/green-studies.jpg',
                'email' => 'greenstudies@greenschool.org',
                'phone' => '+62 361 469 880',
                'type' => 'teacher',
                'order' => 6,
            ],
            [
                'name' => 'Putu Ariani',
                'position' => 'Permaculture Teacher',
                'bio' => 'Putu manages our school gardens and teaches students the principles of permaculture design. Her classes combine practical growing skills with ecological principles, allowing students to participate in growing food for our school kitchen.',
                'photo_url' => 'images/staff/permaculture.jpg',
                'email' => 'permaculture@greenschool.org',
                'phone' => '+62 361 469 881',
                'type' => 'teacher',
                'order' => 7,
            ],
            [
                'name' => 'Emma Sullivan',
                'position' => 'Admissions Director',
                'bio' => 'Emma handles the admissions process for prospective families, coordinating campus tours and helping new families transition to the Green School community.',
                'photo_url' => 'images/staff/admissions.jpg',
                'email' => 'admissions@greenschool.org',
                'phone' => '+62 361 469 882',
                'type' => 'staff',
                'order' => 8,
            ],
        ];

        foreach ($staff as $item) {
            Staff::create($item);
        }
    }
}

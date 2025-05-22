<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            [
                'name' => 'Early Years Program',
                'description' => 'Nurturing curiosity and connection with nature for our youngest learners.',
                'grade_level' => 'elementary',
                'content' => '<p>Our Early Years Program creates a foundation for lifelong learning through play-based, nature-connected experiences. Children aged 3-6 explore our bamboo campus, develop pre-literacy and numeracy skills, and begin their journey as environmental stewards.</p><p>The curriculum emphasizes:</p><ul><li>Nature exploration and outdoor learning</li><li>Creative expression through art, music, and movement</li><li>Early literacy and numeracy through hands-on activities</li><li>Social skills and emotional intelligence</li><li>Connection to Balinese culture and traditions</li></ul>',
                'is_featured' => true,
                'order' => 1
            ],
            [
                'name' => 'Primary School',
                'description' => 'Building core skills through project-based learning and environmental education.',
                'grade_level' => 'elementary',
                'content' => '<p>Our Primary School Program (ages 6-11) develops strong academic foundations while nurturing children\'s natural curiosity and connection to the environment. Students engage in thematic, project-based learning that integrates sustainability principles across all subject areas.</p><p>Key features of our primary curriculum include:</p><ul><li>Integrated thematic learning units</li><li>Green Studies (environmental education)</li><li>Arts and creative expression</li><li>Physical education and outdoor adventures</li><li>Local language and cultural studies</li></ul>',
                'is_featured' => true,
                'order' => 2
            ],
            [
                'name' => 'Middle School',
                'description' => 'Developing critical thinking and practical skills through real-world challenges.',
                'grade_level' => 'middle',
                'content' => '<p>Our Middle School Program (ages 11-14) engages students in deeper exploration of academic subjects while developing their identity as change-makers. The curriculum balances academic rigor with practical skills and entrepreneurial thinking.</p><p>Students participate in:</p><ul><li>Core academic studies (mathematics, sciences, humanities, languages)</li><li>Green entrepreneurship projects</li><li>Environmental leadership initiatives</li><li>Community service and cultural immersion</li><li>Personal development and wellness practices</li></ul>',
                'is_featured' => false,
                'order' => 3
            ],
            [
                'name' => 'High School',
                'description' => 'Preparing global green leaders through innovative curriculum and sustainability projects.',
                'grade_level' => 'high',
                'content' => '<p>Our High School Program (ages 14-18) prepares students for university and beyond through a challenging academic curriculum that emphasizes sustainability leadership and innovative thinking. Students can choose between our international curriculum or the Green School diploma pathway.</p><p>The high school experience includes:</p><ul><li>University preparatory academics</li><li>Entrepreneurial projects with real-world impact</li><li>Internships and mentorships</li><li>Capstone sustainability projects</li><li>Global citizenship and leadership development</li></ul>',
                'is_featured' => true,
                'order' => 4
            ],
            [
                'name' => 'Green Studies',
                'description' => 'Specialized curriculum focusing on environmental science and sustainability practices.',
                'grade_level' => 'all',
                'content' => '<p>Green Studies is our signature program that runs across all grade levels, providing specialized education in environmental science, conservation, and sustainable practices. Students engage in hands-on projects that address real environmental challenges.</p><p>The curriculum includes:</p><ul><li>Permaculture and regenerative agriculture</li><li>Renewable energy systems</li><li>Waste management and circular economy</li><li>Biodiversity conservation</li><li>Climate science and solutions</li></ul>',
                'is_featured' => false,
                'order' => 5
            ],
        ];

        foreach ($programs as $program) {
            Program::create([
                'name' => $program['name'],
                'slug' => Str::slug($program['name']),
                'description' => $program['description'],
                'grade_level' => $program['grade_level'],
                'content' => $program['content'],
                'featured_image' => 'images/programs/' . Str::slug($program['name']) . '.jpg',
                'is_featured' => $program['is_featured'],
                'order' => $program['order'],
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = Program::all();
        
        $activities = [
            // Extracurricular Activities
            [
                'name' => 'Eco Action Club',
                'description' => 'Students participate in environmental conservation initiatives on campus and in local communities.',
                'content' => '<p>Eco Action Club is our flagship extracurricular program where students become active environmental stewards. Club members identify sustainability challenges in the school or local community and develop practical action plans to address them.</p><p>Activities include:</p><ul><li>Campus waste audits and improving recycling systems</li><li>Beach and river clean-up campaigns</li><li>Native tree planting and forest restoration</li><li>Environmental awareness campaigns for the local community</li><li>Advocacy work with local government on environmental policies</li></ul><p>Through these hands-on experiences, students develop leadership skills, project management abilities, and a deeper understanding of environmental systems. The club meets twice weekly and welcomes students from middle and high school.</p>',
                'is_extracurricular' => true,
                'schedule' => 'Tuesdays and Thursdays, 3:30-5:00 PM',
                'location' => 'Green Lab',
                'featured_image' => 'images/activities/eco-action-club.jpg',
            ],
            [
                'name' => 'Bamboo Orchestra',
                'description' => 'Students learn to play traditional and contemporary music on bamboo instruments.',
                'content' => '<p>Our Bamboo Orchestra blends traditional Balinese music with contemporary influences, all performed on sustainable bamboo instruments. Students learn to play various bamboo instruments, including angklung, jegog, and bamboo flutes, and collaborate with local musicians to develop their skills.</p><p>The orchestra also explores the sustainability aspects of bamboo as a renewable resource and its cultural significance in Balinese traditions. Students participate in the design and creation of bamboo instruments, gaining appreciation for both the art and science of musical instrument making.</p><p>The Bamboo Orchestra performs at school events, community gatherings, and occasionally at cultural festivals across Bali. Practice sessions are held three times weekly after school.</p>',
                'is_extracurricular' => true,
                'schedule' => 'Monday, Wednesday, Friday, 3:30-5:00 PM',
                'location' => 'Music Pavilion',
                'featured_image' => 'images/activities/bamboo-orchestra.jpg',
            ],
            [
                'name' => 'Green Entrepreneurship',
                'description' => 'Students develop sustainable business ideas and learn entrepreneurial skills.',
                'content' => '<p>The Green Entrepreneurship program nurtures the next generation of eco-conscious business leaders. Participants identify environmental or social challenges, then develop sustainable business models that address these issues while generating value.</p><p>Throughout the program, students learn essential entrepreneurship skills including:</p><ul><li>Market research and customer validation</li><li>Sustainable product/service design</li><li>Financial planning and budgeting</li><li>Marketing and communication</li><li>Social and environmental impact assessment</li></ul><p>Students work in teams to develop their business ideas, with guidance from mentors from the local business community. The program culminates in a pitch competition where teams present their ideas to a panel of judges, with winners receiving seed funding to launch their ventures.</p>',
                'is_extracurricular' => true,
                'schedule' => 'Wednesdays, 3:30-5:30 PM',
                'location' => 'Innovation Hub',
                'featured_image' => 'images/activities/green-entrepreneurship.jpg',
            ],

            // Academic Activities
            [
                'name' => 'Annual Green Camp',
                'description' => 'A week-long immersive experience in nature, focusing on survival skills and environmental awareness.',
                'content' => '<p>Our Annual Green Camp takes students out of the classroom and into Bali\'s natural environments for a week of immersive, experiential learning. Set in different locations each year—from coastal ecosystems to mountain forests—the camp challenges students to connect deeply with nature while developing practical sustainability skills.</p><p>Camp activities include:</p><ul><li>Wilderness survival and bushcraft</li><li>Ecosystem studies and biodiversity surveys</li><li>Traditional ecological knowledge from local communities</li><li>Low-impact camping and outdoor cooking</li><li>Team challenges and leadership development</li></ul><p>The Green Camp is structured by age groups, with activities tailored to different developmental stages. All students from grades 4-12 participate, making this a core part of our educational experience.</p>',
                'is_extracurricular' => false,
                'schedule' => 'Annual event - March',
                'location' => 'Various locations around Bali',
                'featured_image' => 'images/activities/annual-green-camp.jpg',
            ],
            [
                'name' => 'Bio-Blitz Day',
                'description' => 'A 24-hour intensive field study where students document all living species on campus.',
                'content' => '<p>Bio-Blitz Day transforms our campus into a living laboratory as students and staff work alongside visiting scientists to identify and document as many species as possible within a 24-hour period. This citizen science activity increases our understanding of campus biodiversity while teaching valuable skills in scientific observation and classification.</p><p>Participants are organized into teams focusing on different taxonomic groups (plants, insects, birds, etc.) or habitats (forest, gardens, wetlands). Teams use digital tools to record observations and contribute to global biodiversity databases like iNaturalist.</p><p>The day concludes with a community gathering where findings are shared, including new species discoveries for the campus and changes observed from previous years. This annual event highlights the rich biodiversity that surrounds us and our responsibility to protect it.</p>',
                'is_extracurricular' => false,
                'schedule' => 'Annual event - October',
                'location' => 'School campus',
                'featured_image' => 'images/activities/bio-blitz-day.jpg',
            ],
            [
                'name' => 'Cultural Exchange Program',
                'description' => 'Students experience Balinese culture through village stays and participation in traditional activities.',
                'content' => '<p>The Cultural Exchange Program deepens students\' understanding of Balinese culture through immersive experiences with local communities. This program recognizes that environmental sustainability is inseparable from cultural sustainability, and that traditional knowledge offers valuable perspectives on living in harmony with nature.</p><p>Program components include:</p><ul><li>Village homestays with local families</li><li>Participation in traditional ceremonies and cultural practices</li><li>Learning traditional arts such as dance, music, and crafts</li><li>Agricultural activities using traditional farming methods</li><li>Language exchange and cross-cultural dialogue</li></ul><p>Through these experiences, students develop cultural sensitivity, communication skills across language barriers, and appreciation for diverse ways of knowing and being. The program includes regular visits throughout the school year, culminating in a week-long cultural immersion for older students.</p>',
                'is_extracurricular' => false,
                'schedule' => 'Quarterly visits and annual immersion',
                'location' => 'Local villages around Bali',
                'featured_image' => 'images/activities/cultural-exchange-program.jpg',
            ],
        ];

        foreach ($activities as $index => $activity) {
            $programId = $programs->isEmpty() ? null : $programs[($index % count($programs))]->id;
            
            Activity::create([
                'name' => $activity['name'],
                'slug' => Str::slug($activity['name']),
                'description' => $activity['description'],
                'content' => $activity['content'],
                'is_extracurricular' => $activity['is_extracurricular'],
                'schedule' => $activity['schedule'],
                'location' => $activity['location'],
                'featured_image' => $activity['featured_image'],
                'program_id' => $programId,
            ]);
        }
    }
}

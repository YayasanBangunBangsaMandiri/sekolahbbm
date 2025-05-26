<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Program;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = Program::all();
        $admin = User::where('role', 'admin')->first();
        
        if (!$admin) {
            $admin = User::first();
        }
        
        $projects = [
            [
                'title' => 'Bamboo Bicycle Workshop',
                'description' => 'Students designed and built sustainable transportation using locally sourced bamboo.',
                'content' => '<p>In this project, high school students designed and built functional bicycles using Bali\'s abundant bamboo resources. Working with local craftspeople and engineers, students learned about sustainable materials, structural design, and practical engineering skills.</p><p>The bicycles were not only beautiful examples of sustainable design but also functional vehicles that students could actually ride. This project combined traditional craftsmanship with modern design principles, creating a powerful learning experience about transportation alternatives.</p>',
                'featured_image' => 'images/projects/bamboo-bicycle.jpg',
                'is_featured' => true,
            ],
            [
                'title' => 'Bio-digesters for Local Farms',
                'description' => 'Middle school students built simple bio-digesters to convert organic waste into clean cooking fuel.',
                'content' => '<p>This project addressed two sustainability challenges at once: organic waste management and access to clean cooking energy. Our middle school students researched, designed and built simple bio-digesters that convert food scraps and animal waste into biogas, which local families can use for cooking instead of firewood.</p><p>Working with nearby farms, students installed their bio-digesters and trained farmers on maintenance and operation. The project continues to evolve as students monitor impact and make improvements to their designs.</p>',
                'featured_image' => 'images/projects/bio-digester.jpg',
                'is_featured' => true,
            ],
            [
                'title' => 'Plastic Upcycling Initiative',
                'description' => 'Primary students collected plastic waste and transformed it into useful products and art pieces.',
                'content' => '<p>Our primary students tackled Bali\'s plastic pollution problem by collecting waste plastic from beaches and villages, then transforming it into beautiful and functional new items. Using simple tools and techniques, they created planters, decorative items, and even furniture from what would otherwise be environmental pollution.</p><p>The project expanded to include community workshops where students taught local children and adults how to upcycle their own plastic waste, spreading the impact beyond our campus.</p>',
                'featured_image' => 'images/projects/plastic-upcycling.jpg',
                'is_featured' => false,
            ],
            [
                'title' => 'Organic School Garden',
                'description' => 'Students across all grade levels participate in growing food for the school kitchen using organic methods.',
                'content' => '<p>Our organic garden project is a cornerstone of Green School\'s practical sustainability education. Students of all ages participate in planning, planting, maintaining, and harvesting food that goes directly to our school kitchen.</p><p>Through this project, students learn about soil health, composting, pest management without chemicals, seed saving, and the importance of local food systems. The garden also serves as an outdoor classroom for biology, mathematics, and even language arts as students document their learning through writing and presentations.</p>',
                'featured_image' => 'images/projects/school-garden.jpg',
                'is_featured' => true,
            ],
            [
                'title' => 'Solar Powered Water Pumps',
                'description' => 'High school students designed and installed solar-powered irrigation systems for local farmers.',
                'content' => '<p>In this engineering project, our high school students addressed water access challenges faced by local farmers by designing solar-powered irrigation pumps. Working with engineering mentors, students calculated water needs, designed efficient systems, and installed working solar pumps that help farmers reduce their dependence on fossil fuels.</p><p>The project incorporated principles of physics, electronics, and agricultural science while making a tangible difference for local food producers. Students continue to monitor and maintain the systems, gathering data on fuel savings and crop yields.</p>',
                'featured_image' => 'images/projects/solar-pump.jpg',
                'is_featured' => false,
            ],
        ];

        foreach ($projects as $index => $project) {
            $programId = $programs->isEmpty() ? null : $programs[($index % count($programs))]->id;
            
            Project::create([
                'title' => $project['title'],
                'slug' => Str::slug($project['title']),
                'description' => $project['description'],
                'content' => $project['content'],
                'featured_image' => $project['featured_image'],
                'is_featured' => $project['is_featured'],
                'program_id' => $programId,
                'created_by' => $admin ? $admin->id : null,
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
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
        $admin = User::where('role', 'admin')->first();
        
        if (!$admin) {
            $admin = User::first();
        }
        
        $posts = [
            [
                'title' => 'Green School Hosts Annual Sustainability Fair',
                'content' => '<p>This weekend, Green School Bali hosted its annual Sustainability Fair, bringing together students, parents, local businesses, and community members to celebrate and share sustainable practices.</p><p>The fair featured student project exhibitions, workshops on composting and zero-waste living, organic food stalls, and performances by our talented students. Local artisans demonstrated traditional crafts using sustainable materials, and several renewable energy companies showcased their latest technologies.</p><p>"This event perfectly encapsulates what Green School is all about," said the school director. "It\'s a celebration of sustainability that reaches beyond our campus and into the wider community."</p><p>The highlight of the day was the student sustainability innovation competition, where middle and high school students presented solutions to local environmental challenges. The winning project, a solar-powered water filtration system designed for remote villages, will receive funding to develop a working prototype.</p>',
                'category' => 'events',
                'published_at' => now()->subDays(5),
                'is_featured' => true,
            ],
            [
                'title' => 'Students Win Regional Environmental Science Competition',
                'content' => '<p>We are proud to announce that a team of Green School high school students has won first place in the Regional Environmental Science Competition with their project on coral reef restoration techniques.</p><p>The team spent six months developing and testing different methods for growing coral fragments and monitoring their growth rates. Their innovative approach combined traditional knowledge with cutting-edge scientific methods, creating a system that local communities can implement with minimal resources.</p><p>Judges praised the project for its scientific rigor, community engagement component, and potential for real-world impact on Bali\'s threatened reef ecosystems. The team will now represent the region at the national competition next month.</p><p>"This achievement reflects our students\' deep understanding of environmental systems and their commitment to finding practical solutions," said their science teacher. "They\'ve demonstrated exactly the kind of thinking we foster at Green School."</p>',
                'category' => 'achievements',
                'published_at' => now()->subDays(14),
                'is_featured' => true,
            ],
            [
                'title' => 'New Bamboo Design Lab Opens on Campus',
                'content' => '<p>Green School Bali is excited to announce the opening of our new Bamboo Design Lab, a dedicated space for students to explore the possibilities of this sustainable, versatile building material.</p><p>The lab itself is a marvel of bamboo architecture, designed in collaboration with IBUKU, the renowned bamboo design firm. It features flexible workspaces, traditional and modern bamboo crafting tools, and examples of innovative bamboo structures from around the world.</p><p>In this new facility, students will learn about bamboo as a sustainable alternative to conventional building materials, study its properties and cultivation methods, and develop hands-on skills in bamboo construction and product design.</p><p>"Bamboo represents the perfect blend of traditional wisdom and future-focused sustainability," explained the lab\'s coordinator. "It grows quickly, sequesters carbon, and can replace many materials that currently contribute to environmental degradation."</p><p>The lab\'s first major project will be designing and building bamboo bike shelters for the campus, encouraging more students and staff to cycle to school.</p>',
                'category' => 'news',
                'published_at' => now()->subDays(21),
                'is_featured' => false,
            ],
            [
                'title' => 'Integrating Traditional Knowledge into Modern Sustainability Education',
                'content' => '<p>At Green School Bali, we believe that traditional ecological knowledge holds valuable lessons for modern sustainability challenges. That\'s why we\'ve been expanding our efforts to integrate Balinese and other indigenous wisdom into our curriculum.</p><p>This approach recognizes that many traditional practices evolved over generations to work in harmony with natural systems—something our modern world is struggling to achieve. From traditional water management systems (subak) to natural farming methods and bamboo construction techniques, there\'s much to learn from these time-tested approaches.</p><p>Our students engage with local elders and knowledge keepers to understand traditional practices firsthand. They then explore how these approaches can be combined with modern science and technology to address contemporary environmental challenges.</p><p>"When we honor traditional knowledge, we not only preserve cultural heritage but also gain valuable perspectives on sustainability that differ from the Western scientific paradigm," explains our Cultural Studies coordinator. "Our students learn to value different ways of knowing and to see sustainability through multiple cultural lenses."</p><p>This integrated approach prepares our students to develop sustainability solutions that are both innovative and culturally appropriate—an essential skill for the complex environmental challenges they will face.</p>',
                'category' => 'blog',
                'published_at' => now()->subDays(30),
                'is_featured' => true,
            ],
            [
                'title' => 'Green School Named Among Top Eco-Schools Globally',
                'content' => '<p>We are honored to announce that Green School Bali has been recognized as one of the top eco-schools in the world by the Global Green Education Network. This recognition highlights our commitment to sustainability education and our innovative approach to preparing environmentally conscious global citizens.</p><p>The award specifically acknowledged our campus design, which minimizes environmental impact while serving as a living laboratory for sustainable practices; our curriculum integration of sustainability across all subject areas; and our community engagement initiatives that extend our impact beyond the campus boundaries.</p><p>"This recognition belongs to our entire community—students, teachers, staff, parents, and local partners who collaborate to make Green School a model of sustainable education," said the school director. "It affirms our direction while inspiring us to continue evolving our approach."</p><p>As part of this recognition, Green School has been invited to participate in an international consortium of leading eco-schools to share best practices and collaborate on advancing sustainability education worldwide.</p>',
                'category' => 'achievements',
                'published_at' => now()->subDays(45),
                'is_featured' => false,
            ],
        ];

        foreach ($posts as $post) {
            Post::create([
                'title' => $post['title'],
                'slug' => Str::slug($post['title']),
                'content' => $post['content'],
                'excerpt' => Str::limit(strip_tags($post['content']), 150),
                'category' => $post['category'],
                'featured_image' => 'images/posts/' . Str::slug($post['title']) . '.jpg',
                'author_id' => $admin->id,
                'published_at' => $post['published_at'],
                'is_featured' => $post['is_featured'],
                'status' => 'published',
            ]);
        }
    }
}

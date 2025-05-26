<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\PageSection;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
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
        
        // Home Page
        $homePage = Page::create([
            'title' => 'Home',
            'slug' => 'home',
            'meta_description' => 'Green School Bali - A community of learners making our world sustainable',
            'meta_keywords' => 'green school, bali, sustainable education, eco-friendly school, bamboo campus',
            'status' => 'published',
            'author_id' => $admin->id,
        ]);

        // About Page
        $aboutPage = Page::create([
            'title' => 'About Us',
            'slug' => 'about-us',
            'meta_description' => 'Learn about Green School Bali\'s mission, vision, and our unique approach to education',
            'meta_keywords' => 'green school history, sustainability education, bamboo campus, bali green school',
            'status' => 'published',
            'author_id' => $admin->id,
        ]);

        // Contact Page
        $contactPage = Page::create([
            'title' => 'Contact Us',
            'slug' => 'contact',
            'meta_description' => 'Get in touch with Green School Bali - Visit our campus or send us a message',
            'meta_keywords' => 'contact green school, visit green school, bamboo campus tour, bali school',
            'status' => 'published',
            'author_id' => $admin->id,
        ]);

        // Create sections for About page
        $aboutSections = [
            [
                'title' => 'Our Mission & Vision',
                'content' => '<h2>Our Vision</h2><p>A community of learners making our world sustainable.</p><h2>Our Mission</h2><p>We educate for sustainability through community-integrated, entrepreneurial learning, in a wall-less, natural environment. Our holistic curriculum empowers and inspires our students to be green leaders.</p>',
                'order' => 1,
            ],
            [
                'title' => 'Our History',
                'content' => '<p>Green School was founded in 2008 by John and Cynthia Hardy with the vision to create a natural, holistic, student-centered learning environment that empowers and inspires students to be creative, innovative green leaders.</p><p>Since then, Green School has grown from 90 students to over 400 students from Early Years to High School, representing more than 35 nationalities. The original campus has expanded, but always with the same commitment to sustainability and minimizing environmental impact.</p><p>Today, Green School serves as the flagship for a growing network of schools around the world, with additional campuses in New Zealand, South Africa, and more in development.</p>',
                'order' => 2,
            ],
            [
                'title' => 'Our Values',
                'content' => '<p>At Green School, we are committed to:</p><ul><li><strong>Integrity:</strong> We are honest, ethical and strive to always do the right thing</li><li><strong>Responsibility:</strong> We take responsibility for our actions and their impact on the environment</li><li><strong>Empathy:</strong> We care for each other, our community, and our planet</li><li><strong>Sustainability:</strong> We model sustainable practices in all that we do</li><li><strong>Peace:</strong> We prioritize peaceful resolution of conflicts</li><li><strong>Equity:</strong> We value diversity and believe in fair treatment for all</li><li><strong>Community:</strong> We foster connection and cooperation</li><li><strong>Trust:</strong> We build relationships based on mutual trust and respect</li></ul>',
                'order' => 3,
            ],
        ];

        foreach ($aboutSections as $section) {
            PageSection::create([
                'page_id' => $aboutPage->id,
                'title' => $section['title'],
                'content' => $section['content'],
                'order' => $section['order'],
            ]);
        }

        // Create sections for Contact page
        $contactSections = [
            [
                'title' => 'Get In Touch',
                'content' => '<p>We\'d love to hear from you! Whether you\'re interested in enrolling your child, visiting our campus, or learning more about our approach to education, our team is here to help.</p><p>You can reach us through the contact form below, by email, or by phone.</p>',
                'order' => 1,
            ],
            [
                'title' => 'Visit Our Campus',
                'content' => '<p>Experience the magic of Green School by visiting our beautiful bamboo campus. We offer guided tours on weekdays for prospective families and interested visitors.</p><p>To schedule a tour, please contact our admissions team using the form below or email admissions@greenschool.org.</p>',
                'order' => 2,
            ],
            [
                'title' => 'Contact Information',
                'content' => '<ul><li><strong>Address:</strong> Jl. Raya Sibang Kaja, Banjar Saren, Abiansemal, Badung, Bali 80352, Indonesia</li><li><strong>Phone:</strong> +62 361 469 875</li><li><strong>Email:</strong> admissions@greenschool.org</li><li><strong>Office Hours:</strong> Monday to Friday, 8:00 AM - 4:00 PM</li></ul>',
                'order' => 3,
            ],
        ];

        foreach ($contactSections as $section) {
            PageSection::create([
                'page_id' => $contactPage->id,
                'title' => $section['title'],
                'content' => $section['content'],
                'order' => $section['order'],
            ]);
        }
    }
}

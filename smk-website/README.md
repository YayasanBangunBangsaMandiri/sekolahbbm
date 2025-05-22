# Green School Bali Website

This is a Laravel-based website for Green School Bali, featuring a public frontend and an admin panel for content management.

## Features

### Public Interface (Frontend)

- **Homepage**: School philosophy, promotional videos, photo galleries, and news highlights
- **About Us**: History, vision, mission, and sustainability values
- **Programs**: Environment-based curriculum (elementary to high school), extracurricular activities, student projects
- **News & Events**: Blog/articles about school activities, events, and achievements
- **Contact**: Contact form, location map, and social media links
- **Responsive Design**: Mobile-friendly layout with a green/natural theme and rich visuals

### Admin Panel (Backend)

- **Secure Authentication**: Admin login/registration using Laravel Breeze
- **Content Management (CRUD)**:
  - Manage news/articles (title, content, images, categories)
  - Manage photo/video galleries (upload, delete, categorization)
  - Edit static pages (About Us, Programs, etc.) via WYSIWYG editor
  - Manage staff data
- **Additional Features**:
  - Notifications for new contact form submissions
  - Export event registrations or inquiries to CSV/Excel

## Technology Stack

- **Framework**: Laravel 10+
- **Authentication**: Laravel Breeze
- **Database**: MySQL
- **Frontend**: Tailwind CSS + Alpine.js
- **Libraries**: 
  - Intervention Image (for image processing)
  - Spatie Laravel Media Library

## Installation

1. Clone the repository
```
git clone https://github.com/your-username/green-school-bali.git
cd green-school-bali
```

2. Install dependencies
```
composer install
npm install
```

3. Set up environment variables
```
cp .env.example .env
php artisan key:generate
```

4. Configure your database in the `.env` file
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=green_school
DB_USERNAME=root
DB_PASSWORD=
```

5. Run migrations and seed the database
```
php artisan migrate
php artisan db:seed
```

6. Create a symbolic link for storage
```
php artisan storage:link
```

7. Compile assets
```
npm run dev
```

8. Start the development server
```
php artisan serve
```

## Usage

### Admin Access

1. Navigate to `/login`
2. Use the following credentials:
   - Email: admin@example.com
   - Password: password

### Content Management

1. Log in to the admin panel
2. Use the sidebar navigation to access different sections:
   - Dashboard: Overview of site activity
   - Posts: Manage news and events
   - Programs: Manage school programs
   - Projects: Manage student projects
   - Activities: Manage school activities
   - Gallery: Manage photo and video galleries
   - Staff: Manage staff profiles
   - Pages: Manage static pages
   - Contacts: View and export contact form submissions

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


# Sample Blog 

A Sample Blog For Laravel Beginner Test that give from https://github.com/LaravelDaily/Laravel-Roadmap-Beginner-Challenge.

This is a basic CRUD application built with Laravel 11 and Tailwind CSS, following the Laravel Daily Beginner Challenge. It allows authenticated users to create, view, edit, and delete their own articles, with simple category management.


## Features

- User Authentication: User Login (Breeze or Jetstream).
- Article CRUD: Full Article Management (Create, View, Update, Delete) for authenticated users.
- Category Linking: Articles can be assigned to a specific category.
- Image Handling: File upload for article images (stored locally in storage).
- Access Control: Users can only Edit/Delete their own articles (Authorization).


## Installation

- Requirements
    -  PHP >= 8.2, Composer, Node.js & NPM, Database (MySQL/SQLite).
- Clone Repository
    - git clone [https://github.com/amie-frog/sample-blog-task.git]

Install my-project with npm

```bash
  cd my-project
  composer install
  cp .env.example .env
  Database Configure (.env ထဲတွင် DB_DATABASE, DB_USERNAME စသည်တို့ကို ပြင်ဆင်ပါ)
  php artisan key:generate 
  php artisan migrate
  npm install
  npm run dev (for CSS/JS assets)
  php artisan serve
```
    
## Authors

- [@azinphyoe](https://www.github.com/azinphyoe)


## Usage/Examples

```javascript
Login to the Dashboard.
Click the "New Blog" button to create an article.
After creating, you can view the article and you can read more about that blog by clicking Read More , if you are the author, you will see the "EDIT" and "DELETE" buttons.
```

### Technologies Used

![PHP Version](https://img.shields.io/badge/PHP-8.2+-777BB4.svg?style=flat&logo=php)
![Laravel Framework](https://img.shields.io/badge/Laravel-11-FF2D20.svg?style=flat&logo=laravel)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-v3-06B6D4.svg?style=flat&logo=tailwindcss)
![Database](https://img.shields.io/badge/Database-MySQL-4479A1.svg?style=flat&logo=mysql)
## Contact

- Github
    - https://github.com/amie-frog
- linkedin
    - https://mm.linkedin.com/in/a-zin-phyoe-0147a2325
- E-Mail
    - azinphyo452@gmail.com
- Phone Number
    - +959 699781564

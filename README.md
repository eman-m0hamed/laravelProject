# Installation

1-clone the application first

    git clone https://github.com/eman-m0hamed/laravelProject.git

2-open cmd inside the application then run

    composer install

3-copy .env.example and rename the copy to .env

4-add your database configration inside .env

5-generate qpplication key

    php artisan key:generate

6-run migration file

    php artisan migrate
   
7- run seeder files for creating fake data in database tables
   
    php artisan db:seed --class=AdminSeeder  // for admins Table
    php artisan db:seed --class=UserSeeder   // for users Table
    php artisan db:seed --class=JobSeeder   // for jobs Table
    php artisan db:seed --class=JobQuestionSeeder  // for job_questions Table
    php artisan db:seed --class=JobUserSeeder      // for job_user Table

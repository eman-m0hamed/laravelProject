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

**For admins Table**

    php artisan db:seed --class=AdminSeeder  
    
**For users Table**

    php artisan db:seed --class=UserSeeder  
    
**For jobs Table**

    php artisan db:seed --class=JobSeeder   
    
**For job_questions Table**

    php artisan db:seed --class=JobQuestionSeeder  
    
**For job_user Table**

    php artisan db:seed --class=JobUserSeeder     

***Warning***

**you can't use jobSeeder before using AdminSeeder if admins table is Empty**
    
**you can't use job_questionSeeder before using JobSeeder if jobs table is Empty**

**you can't use JobUserSeeder before using job_questionSeeder & UserSeeder   if users table and job_questions are Empty**
    
    
    

## Basic Laravel Order Application

This application have 2 screens. A Dashboard that shows a list of
Orders and a edit screen to view the details of the order. 

Technologies I used for the Laravel application.
MySQL for the database.
Laravel Breeze starter kit (Breeze & Blade). 

Make sure to add Database connections details in the .env file.
Note: make sure you have enabled 'engine' => 'InnoDB' in the config/database.php file.

After you added the database connection details run the following commands to get started:

##Create the tables
``php artisan migrate``

##Add data to the tables
``php artisan db:seed``

##Start the Server to access the application
``php artisan serve``

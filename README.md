## Basic Laravel Order Application

This application has 2 screens. A Dashboard that shows a list of
Orders and an edit screen to view the details of the order.

Technologies I used for the Laravel application.
MySQL for the database.
Laravel Breeze starter kit (Breeze & Blade).

I have added a Queue to process the Orders.

There is 1 API '/api/orders'. This API will create a new order and add it to the queue. If you run the Laravel worker command this order will be processed and added to the orders table.

Make sure to add Database connection details in the .env file.
Note: make sure you have enabled 'engine' => 'InnoDB' in the config/database.php file.

After you added the database connection details run the following commands to get started:

## Create the tables

``php artisan migrate``

## Add data to the tables

``php artisan db:seed``

## Start the Server to access the application

``php artisan serve``

## Start the queueing worker

``php artisan queue:work``

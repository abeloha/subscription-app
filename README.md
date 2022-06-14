Description:
Create a simple subscription platform(only RESTful APIs with MySQL) in which users can subscribe to a website (there can be multiple websites in the system). Whenever a new post is published on a particular website, all it's subscribers shall receive an email with the post title and description in it.

Documentation:
Postman documentation: https://documenter.getpostman.com/view/14135488/UzBgwAgy

Requirement
1. PHP 7.x
2. Laravel 8.x

Installation:
1. Create .env file from the .env.example file
2. Create a database for the app and configure the env file to connect to database.
3. Configure your email smtp server

Queues:
The app uses queue to run some services such as sending of email at the background. Configure your queue services properly. Here is laravel documentation for that: https://laravel.com/docs/8.x/queues

Commands:
You can email all subscribers to a post with the following command:
php artisan mail:send {post_id}

eg: php artisan mail:send 5 will send details of post with id 5 to all who subscribed to the posts website




## Online Hotel Booking

<img src="https://www.technoheaven.net/Theme/img/Hotel-Booking-Software.jpg">

**Created By :**  Mohamed Ahmed
**Email :** mohamed.ahmed.rc@gmail.com

🏨 Online Hotel Booking System


About the Project:


This is a fully functional Online Hotel Booking System built with Laravel, designed to provide users with a seamless and efficient booking experience.

Key Features:

Secure Payment System:

Supports PayPal and Stripe for smooth and secure transactions.


Real-Time Cart Updates: Utilizes Pusher to update the cart instantly without page reloads.


Email Notifications: Sends booking confirmations and updates directly via Email.


Admin Dashboard: A professional Filament-powered dashboard for managing bookings and rooms efficiently.


Room Availability System: Checks room availability based on selected dates, considering limited room types (e.g., only 5 rooms per type).


## Installation

To get started, clone this repository.

```
git clone https://github.com/MohamedAhmedv8/online-hotel-booking.git
```

Next, copy your `.env.example` file as `.env` and configure your Database connection.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=YOUR-DATABASE-NAME
DB_USERNAME=YOUR-DATABASE-USERNAME
DB_PASSWORD=YOUR-DATABASE-PASSWROD
```

## Run Packages and helpers

You have to all used packages and load helpers as below.

```
composer install
npm install
npm run build
```

## Generate new application key

You have to generate new application key as below.

```
php artisan key:generate
```

## Run Migrations and Seeders

You have to run all the migration files included with the project and also run seeders as below.

```
php artisan migrate
```

# Account Balance Increment Scheduler

A Laravel + Vue application that automatically increments user account balances by 1,000 units every 5 minutes.

## Features

- Auth System
- Set initial account balance
- Automatic balance increments every 5 minutes
- View full increment history
- Background job processing

## System Overview

1. **Frontend**: Vue 3 + Inertia.js interface
2. **Backend**: Laravel handles scheduling and increments
3. **Database**: Stores balances and increment history using mysql
4. **Automation**: Bash script manages background workers

## Requirements

- PHP 8.1+
- Composer
- Node.js 16+
- MySQL/SQLite

## Installation

Clone the repository
git clone https://github.com/kodedjackson/increment.git
cd increment

# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install

# Create environment file
cp .env.example .env

# Create a DB and add the configuration files, this is an example of my DB in .env file
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=increment
DB_USERNAME=root
DB_PASSWORD=

# Generate application key
php artisan key:generate

# Run Migrations
php artisan migrate

#Running the Application
Build frontend assets:

- bash
npm run build
Start the development server:

- bash
php artisan serve

In a NEW terminal window, start the workers i created:

bash
chmod +x run_workers.sh  will make script executable
./run_workers.sh         will Start queue and scheduler
Access the application at:

http://localhost:8000

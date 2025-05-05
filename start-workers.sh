#!/bin/bash

# Start the Laravel queue worker in the background
php artisan queue:work --daemon > storage/logs/queue.log 2>&1 &

# Start the schedule worker in the background
php artisan schedule:work > storage/logs/schedule.log 2>&1 &

echo "Queue and scheduler workers started successfully"
echo "Queue worker PID: $!"
echo "Schedule worker PID: $!"

# Keep the script running
tail -f /dev/null

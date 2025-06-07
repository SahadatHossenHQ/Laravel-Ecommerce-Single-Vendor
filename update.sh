#!/bin/bash

# Navigate to your project directory
cd /path/to/your/project

# Reset the repository to the latest commit on the current branch
git reset --hard

# Pull the latest changes from the remote repository
git pull

# Run Laravel Artisan migrate command
php artisan migrate

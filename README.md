# Music Festival
A web application for a fictional music festival. This project uses the MVC design pattern, along with other popular web technologies and libraries.

# Technologies and Libraries Used:
MVC Design Pattern: Modular approach separating the application into Model, View, and Controller components.  

Bootstrap: Responsive design framework for styling and component utility. 

jQuery: JavaScript library simplifying DOM manipulations and event handling.  

PHP: Server-side scripting language.  

Composer: Dependency manager for PHP.  

Webpack: A module bundler and task runner that packs module dependencies to create highly optimized bundle

# Installation:
Clone the repository:

git clone git@github.com:coder-d/music_fest.git

Navigate to the project directory:

cd [directory_name]

# Install PHP dependencies with Composer:
composer install

# Autoload Composer dependencies:
composer dump-autoload

# Configure Webpack:

Rename webpack.config.js.env in the root directory to webpack.config.js.
Update the publicPath in webpack.config.js to reflect your server's subdirectory (e.g., publicPath: '/your_server_sub_directory/dist/').
Update the '##BASE_URL##': 'http://localhost/music_fest/'


# Configure the Base URL:
Rename SiteSettings.php.env in /app/Core to SiteSettings.php

Update the file to set the BASE_URL to your project's URL.
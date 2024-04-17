#!/bin/bash

# Clone the repository
git clone https://github.com/julienby/phpexpress.git

# Move the .htaccess file to the current directory
mv ./phpexpress/.htaccess .

# Change directory to the cloned repository
cd ./phpexpress

# Update dependencies with Composer
composer update

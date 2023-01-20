## Quick Start

```bash
# download project
git clone git@github.com:kibo13/test-devport.git

# install dependencies
composer install

# copy file .env
copy .env.example .env

# generate key
php artisan key:generate

# database configuration
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=database_username
DB_PASSWORD=database_password

# run migrations 
php artisan migrate
```

# Laravel Simple Blog

## Requirements
- Guest users can view posts.
- Registered users can write posts.
- Only the owner of a post can edit or remove it. 

## Set up
Copy, rename and modify the configuration .example files and run the following commands in this running order:

```
composer install
npm install
php artisan key:generate
php artisan migrate --seed
```

## Credentials for test users
The password for the test users is equivalent to his `name`.
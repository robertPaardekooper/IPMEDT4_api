# IPMEDT4
Repo voor hoofdzaak van IPMEDT4

Deploy instructions WIP:
```bash
$ composer install
```


```php
# Copy .env file from example
php -r "file_exists('.env') || copy('.env.example', '.env');"
```

```php
php artisan key:generate
php artisan jwt:secret
npm install
```
Verander de databasecredentials in je .env file:
```bash
$ nano .env

```

Finally, migrate en seed de database als dit nog niet gedaan is:
```php
$ php artisan migrate:fresh --seed
```
(dit werkt ook als nuke&fix voor de database, dus pas hier wel mee op)

Krijg je bij het seeden een [ReflectionException] fix dit door:
```bash
$ composer dump-autoload
$ php artisan db:seed
```

# Instructions to use

We use PHP 7.3, so please use this version. PHP unit version is 9

##  Steps to follow:

### Do a `git pull`


### Run

```
composer install
```
To install the dependencies 

### Import DB

`db.sql` file on root directory, mysql version > 5.6

### Change database connection settings

```
src->config->Dbconfig.php
```

### Run following commands for various use case

#### Do Booking

```
php -f booking.php Tarun Upadhyay 22 Male Emirates A380 First%20Class
```

#### Get Passenger List

```
php -f passenger_list.php Emirates A380 First%20Class

```
#### Get Available Seats

```
php -f available_seats.php Emirates A380 First%20Class
```

### Run following commands for test all cases

```
php vendor/phpunit/phpunit/phpunit tests
```





# Laravel 8 eCommerce project example

## Installation

``` bash
# clone the repo
$ git clone https://github.com/laravel1911/OnlineShop.git

# go into app's directory
$ cd OnlineShop

# install app's dependencies
$ composer install

# install app's dependencies
$ npm install

$ npm run dev

# livewire assets
$ php artisan vendor:publish --force --tag=livewire:assets


```

### If you choice to use phpMyAdmin

``` bash

# create database in phpmyadmin

```
Copy file ".env.example", and change its name to ".env".
Then in file ".env" replace this database configuration:
* DB_CONNECTION=mysql
* DB_HOST=127.0.0.1
* DB_PORT=3306
* DB_DATABASE=onlineShop
* DB_USERNAME=root
* DB_PASSWORD=root

### Set APP_URL

> If your project url looks like: example.com/sub-folder 
Then go to `my-project/.env`
And modify this line:

* APP_URL = 

To make it look like this:

* APP_URL = http://example.com/sub-folder


### Next step

``` bash
# in your app directory
# generate laravel APP_KEY
$ php artisan key:generate

# run database migration
$ php artisan migrate
```
## Usage

``` bash
# start local server
$ php artisan serve

```

Open your browser with address: [localhost:8000](localhost:8000)  
Click "Login" on sidebar menu and log in with credentials:

--- 

## Features

### Table of contents:
* [Notes](#notes)
* [Users](#users)
* [Management of menus](#menu-management)
* [Manage menu items](#Manage-menu-items)
* [Role management](#Role-management)
* [Management of the media](#Manage-media)
* [BREAD](#BREAD-system)
* [Email Templates](#E-mail-Templates)

#### Notes
It is an example of data presentation in a pagination table, and CRUD functionality.

#### Users
It is a simple example of how to manage registered users.

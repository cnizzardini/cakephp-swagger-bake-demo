# CakePHP Sakila

This is a vanilla CakePHP 4.0.6 install that comes with a snapshot and data seeds for the
[MySQL Sakila Sample Data](https://dev.mysql.com/doc/sakila/en/). I found myself needing test data when I am creating
new plugins and wanted something with complex enough relations for realistic development.

## Installation

- Clone the repository `git clone git@github.com:cnizzardini/cakephp-sakila.git`

- Install via composer `composer install`

- Create your database using your favorite tool

- Update `.env` with your DSN for connecting to your database

- Build your schema and seed data

```bash
bin/cake migrations migrate
bin/cake migrations seed
```

- Run a web server

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765` to see the welcome page.

## Baking

No assumptions were made about how you'd like to use this project. So nothing has been pre-baked.
You may run the following to bake everything:

```bash
bin/cake bake all Actors
bin/cake bake all Addresses
bin/cake bake all Categories
bin/cake bake all Cities
bin/cake bake all Countries
bin/cake bake all Customers
bin/cake bake all Employees
bin/cake bake all FilmActors
bin/cake bake all FilmCategories
bin/cake bake all FilmTexts
bin/cake bake all Films
bin/cake bake all Inventories
bin/cake bake all Languages
bin/cake bake all Payments
bin/cake bake all Rentals
bin/cake bake all Stores
```

You should now be able to browse to /actors etc...

# Swagger Bake Demo Application

[Demo Site](http://cakephpswaggerbake.cnizz.com/) |
[Project Home](https://github.com/cnizzardini/cakephp-swagger-bake)

Submit problems or requests for additional examples as github issues.

## Installation

Clone repository:

```console
git clone git@github.com:cnizzardini/cakephp-swagger-bake-demo.git
```

Install via composer:

```console
composer install
```

Configure the application for database access using `config/.env` or `config/app_local.php`, then run
migrations to build/seed your database.

```console
bin/cake migrations migrate -p Sakila
bin/cake migrations seed -p Sakila
```

Configure your web server or run the cake web server:

```console
bin/cake server
```

That's it, you're done!

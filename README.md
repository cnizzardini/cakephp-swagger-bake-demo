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

## Examples

Here is a list of some examples. It's best to search `src/` for an exhaustive list of examples.

| Feature | Example |
| ------------- | ------------- |
| SwaggerBake Events | [App\Event\SwaggerBakeListener](src/Event/SwaggerBakeListener.php) |
| OpenApiDto | [App\Controller\ExamplesControllers](src/Controller/ExamplesController.php) |
| OpenApiDtoQuery | [App\Dto\QueryDto](src/Dto/QueryDto.php) |
| OpenApiDtoRequestBody | [App\Dto\RequestBodyDto](src/Dto/QueryDto.php) |
| OpenApiForm | [App\Controller\ExamplesController::formExample](src/Controller/ExamplesControllers.php) |
| OpenApiHeader | [App\Controller\ExamplesController::headerExample](src/Controller/ExamplesController.php) |
| OpenApiOperation | [App\Controller\ActorsController::index](src/Controller/ActorsController.php) |
| OpenApiPaginator | Most controller `index()` actions have this defined |
| OpenApiPath | |
| OpenApiPathParam | |
| OpenApiQueryParam | [App\Controller\ExamplesController::headerExample](src/Controller/ExamplesController.php) |
| OpenApiRequestBody | |
| OpenApiResponse | [App\Controller\CountriesController](src/Controller/CountriesController.php) |
| OpenApiResponse associations | [App\Controller\ActorsController::films](src/Controller/ActorsController.php) |
| OpenApiSchema | [App\Model\Entity\Rental](src/Model/Entity.php) |
| OpenApiSchemaProperty |  |
| OpenApiSearch | [FilmsController::index](src/Controller/FilmsController) |
| OpenApiSecurity |  |

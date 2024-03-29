<?php
/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

/*
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 */
/** @var \Cake\Routing\RouteBuilder $routes */
$routes->setRouteClass(DashedRoute::class);

$routes->scope('/', function (RouteBuilder $builder) {
    // Register scoped middleware for in scopes.
    $builder->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'httponly' => true,
    ]));

    /*
     * Apply a middleware to the current route scope.
     * Requires middleware to be registered through `Application::routes()` with `registerMiddleware()`
     */
    //$builder->applyMiddleware('csrf');

    /*
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, templates/Pages/home.php)...
     */
    //$builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
    /*
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    //$builder->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    /*
     * Connect catchall routes for all controllers.
     *
     * The `fallbacks` method is a shortcut for
     *
     * ```
     * $builder->connect('/:controller', ['action' => 'index']);
     * $builder->connect('/:controller/:action/*', []);
     * ```
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $builder->fallbacks();
    $builder->setExtensions(['json','xml']);
    $builder->connect('/', ['controller' => 'Swagger', 'action' => 'index', 'plugin' => 'SwaggerBake']);

    $builder->resources('Actors', [
        'map' => [
            'films' => [
                'method' => 'GET',
                'action' => 'films',
                'path' => '{id}/films'
            ]
        ]
    ]);

    $builder->resources('Languages', ['path' => 'admin/languages', 'prefix' => 'Admin']);
    $builder->resources('Languages', [
        'only' => ['view','index']
    ]);
    $builder->resources('Countries', ['only' => 'create'], function(RouteBuilder $builder){
        $builder->resources('Cities', ['only' => ['index'], 'prefix' => 'Countries']);
    });

    $builder->resources('Examples', [
        'only' => [
            'formExample',
            'queryExample',
            'headerExample',
            'dtoBodyExample',
            'dtoQueryExample',
            'apiKeyExample',
            'optionsOrHead',
            'customResponseSchema',
            'modellessForm',
        ],
        'map' => [
            'formExample' => [
                'method' => 'post',
                'action' => 'formExample',
                'path' => 'form-example'
            ],
            'queryExample' => [
                'method' => 'get',
                'action' => 'queryExample',
                'path' => 'query-example'
            ],
            'headerExample' => [
                'method' => 'get',
                'action' => 'headerExample',
                'path' => 'header-example'
            ],
            'dtoBodyExample' => [
                'method' => 'post',
                'action' => 'dtoBodyExample',
                'path' => 'dto-body-example'
            ],
            'dtoQueryExample' => [
                'method' => 'get',
                'action' => 'dtoQueryExample',
                'path' => 'dto-query-example'
            ],
            'apiKeyExample' => [
                'method' => 'get',
                'action' => 'apiKeyExample',
                'path' => 'api-key-example'
            ],
            'optionsOrHead' => [
                'method' => ['options','head'],
                'action' => 'optionsOrHead',
                'path' => 'options-or-head'
            ],
            'customResponseSchema' => [
                'method' => ['get'],
                'action' => 'customResponseSchema',
                'path' => 'custom-response-schema'
            ],
            'modellessForm' => [
                'method' => ['post'],
                'action' => 'modellessForm',
                'path' => 'modelless-form'
            ]
        ]
    ]);

    $builder->resources('FilmActors', [
        'only' => ['create','delete']
    ]);
    $builder->resources('Films');

});
/*
 * If you need a different set of middleware or none at all,
 * open new scope and define routes there.
 *
 * ```
 * $routes->scope('/api', function (RouteBuilder $builder) {
 *     // No $builder->applyMiddleware() here.
 *     // Connect API actions here.
 * });
 * ```
 */

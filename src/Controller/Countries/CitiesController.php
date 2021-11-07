<?php
declare(strict_types=1);

namespace App\Controller\Countries;

use App\Controller\AppController;
use SwaggerBake\Lib\Attribute\OpenApiPaginator;

/**
 * Cities Controller
 *
 * @property \App\Model\Table\CitiesTable $Cities
 * @method \App\Model\Entity\City[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CitiesController extends AppController
{
    /**
     * List cities by country
     *
     * This is an example of a sub-resource that has been grouped with the Countries endpoint. See
     * `App\Controller\Countries\CitiesController` and `routes.php` for code sample.
     *
     * @see https://book.cakephp.org/4/en/development/routing.html#creating-nested-resource-routes
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Http\Exception\MethodNotAllowedException When invalid method
     */
    #[OpenApiPaginator]
    public function index()
    {
        $this->request->allowMethod('get');
        $this->paginate = [
            'contain' => ['Countries'],
            'conditions' => ['country_id' => $this->getRequest()->getParam('country_id')]
        ];
        $cities = $this->paginate($this->Cities);

        $this->set(compact('cities'));
        $this->viewBuilder()->setOption('serialize', 'cities');
    }
}

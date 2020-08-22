<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Exception\BadRequestException;
use Cake\Http\Exception\MethodNotAllowedException;
use Cake\Http\Exception\NotImplementedException;
use Exception;
use SwaggerBake\Lib\Annotation as Swag;

/**
 * Examples Controller
 *
 * An assortment of examples
 *
 * @property \App\Model\Table\ActorsTable $Actors
 * @method \App\Model\Entity\Actor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExamplesController extends AppController
{
    public function initialize() : void
    {
        parent::initialize();

        $this->loadComponent('Authentication.Authentication');
        $this->Authentication->allowUnauthenticated([
            'formExample',
            'queryExample',
            'dtoExample',
            'headerExample',
            'optionsOrHead',
            'index',
        ]);
    }

    /**
     * Index
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     * @throws MethodNotAllowedException
     */
    public function index()
    {
        $this->request->allowMethod('get');
        return $this->getResponse()->withType('text/plain')->withStringBody('hello world');
    }

    /**
     * Form Example
     *
     * @Swag\SwagForm(name="my_input", description="a custom input", required=true)
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     * @throws MethodNotAllowedException
     */
    public function formExample()
    {
        $this->request->allowMethod('post');
        $data = $this->getRequest()->getData('my_input');
        $this->set(compact('data'));
        $this->viewBuilder()->setOption('serialize', 'data');
    }

    /**
     * Query Example
     *
     * @Swag\SwagQuery(name="my_enum", description="a description", required=true, enum={"a","b"})
     * @Swag\SwagQuery(name="format_datetime", format="date-time")
     * @Swag\SwagQuery(name="explode", explode=true)
     * @Swag\SwagQuery(name="example", allowReserved=true, example="example of example")
     * @Swag\SwagQuery(name="deprecated", deprecated=true, allowEmptyValue=true)
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     * @throws MethodNotAllowedException
     */
    public function queryExample()
    {
        $this->request->allowMethod('get');
        $data = 'just an example for SwagQuery';
        $this->set(compact('data'));
        $this->viewBuilder()->setOption('serialize', 'data');
    }

    /**
     * Dto Example
     *
     * This is an example of a Data Transfer Object. This works for either GET or POST and parses the doc blocks of
     * your DTO. It works with any DTO as long as you can define the class attributes (properties) in your doc block.
     *
     * @Swag\SwagDto(class="\App\Dto\QueryData")
     *
     * @see https://github.com/spatie/data-transfer-object
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     * @throws MethodNotAllowedException
     */
    public function dtoExample()
    {
        $this->request->allowMethod('get');
        $data = [
            'firstName' => $this->getRequest()->getQuery('firstName'),
            'lastName' => $this->getRequest()->getQuery('lastName'),
        ];
        $this->set(compact('data'));
        $this->viewBuilder()->setOption('serialize', 'data');
    }

    /**
     * Header Example
     *
     * @Swag\SwagHeader(name="my_header", description="a custom header", required=true)
     * @Swag\SwagHeader(ref="#/x-demo/components/parameters/anotherHeader")
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     * @throws MethodNotAllowedException
     */
    public function headerExample()
    {
        $this->request->allowMethod('get');
        $data = $this->getRequest()->getHeader('my_header');
        $this->set(compact('data'));
        $this->viewBuilder()->setOption('serialize', 'data');
    }

    /**
     * View (Security Example)
     *
     * Example showing integration with AuthenticationComponent. Use API-KEY: 123
     *
     * @see https://book.cakephp.org/authentication/2/en/index.html AuthenticationComponent
     */
    public function apiKeyExample()
    {
        $this->request->allowMethod('get');
        $data = $this->getRequest()->getHeader('ApiKey');
        $this->set(compact('data'));
        $this->viewBuilder()->setOption('serialize', 'data');
    }

    public function optionsOrHead()
    {
        $this->request->allowMethod(['options','head']);

        if ($this->request->is('options')) {
            return $this->response->withHeader('Allow', 'OPTIONS,,  HEAD')->withStatus(200);
        }

        return $this->response->withStatus(200);
    }
}

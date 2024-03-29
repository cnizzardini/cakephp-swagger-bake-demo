<?php
declare(strict_types=1);

namespace App\Controller;

use App\Dto\QueryDto;
use App\Dto\RequestBodyDto;
use App\Dto\Response;
use App\Form\ModellessForm;
use SwaggerBake\Lib\Attribute\OpenApiDto;
use SwaggerBake\Lib\Attribute\OpenApiForm;
use SwaggerBake\Lib\Attribute\OpenApiHeader;
use SwaggerBake\Lib\Attribute\OpenApiQueryParam;
use SwaggerBake\Lib\Attribute\OpenApiResponse;
use SwaggerBake\Lib\Attribute\OpenApiSecurity;

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
            'dtoQueryExample',
            'dtoBodyExample',
            'headerExample',
            'optionsOrHead',
            'index',
            'modellessForm',
        ]);
    }

    /**
     * Index
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     * @throws \Cake\Http\Exception\MethodNotAllowedException
     */
    public function index()
    {
        $this->request->allowMethod('get');
        return $this->getResponse()->withType('text/plain')->withStringBody('hello world');
    }

    /**
     * Form Example
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     * @throws \Cake\Http\Exception\MethodNotAllowedException
     */
    #[OpenApiForm(name: "my_input", description: "a custom input", isRequired: true)]
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
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     * @throws \Cake\Http\Exception\MethodNotAllowedException
     */
    #[OpenApiQueryParam(name: "my_enum", description: "a description")]
    #[OpenApiQueryParam(name: "format_datetime", format: "date-time")]
    #[OpenApiQueryParam(name: "explode", explode: true)]
    #[OpenApiQueryParam(name: "deprecated", isDeprecated: true, allowEmptyValue: true)]
    public function queryExample()
    {
        $this->request->allowMethod('get');
        $data = 'just an example for OpenApiQueryParam';
        $this->set(compact('data'));
        $this->viewBuilder()->setOption('serialize', 'data');
    }


    /**
     * DTO Body Example
     *
     * This is an example of OpenApiDto and OpenApiResponse. This takes RequestBodyDto and returns it.
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     * @throws \Cake\Http\Exception\MethodNotAllowedException
     */
    #[OpenApiDto(class: RequestBodyDto::class)]
    #[OpenApiResponse(schema: Response::class)]
    public function dtoBodyExample()
    {
        $this->request->allowMethod('post');
        $dto = RequestBodyDto::createFromRequest($this->request);
        $response = new Response($dto->getLastName(), $dto->getFirstName());
        $this->set(compact('response'));
        $this->viewBuilder()->setOption('serialize', 'response');
    }

    /**
     * DTO Query Example
     *
     * This is an example of OpenApiDto and OpenApiResponse. This takes QueryDto and returns it as a list.
     *
     * @see https://github.com/spatie/data-transfer-object
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     * @throws \Cake\Http\Exception\MethodNotAllowedException
     */
    #[OpenApiDto(class: QueryDto::class)]
    #[OpenApiResponse(schemaType: 'array', schema: Response::class)]
    public function dtoQueryExample()
    {
        $this->request->allowMethod('get');
        $dto = QueryDto::createFromRequest($this->request);
        $response = [new Response($dto->getLastName(), $dto->getFirstName())];
        $this->set(compact('response'));
        $this->viewBuilder()->setOption('serialize', 'response');
    }

    /**
     * Header Example
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     * @throws \Cake\Http\Exception\MethodNotAllowedException
     */
    #[OpenApiHeader(name: "my_header", description: "a custom header", isRequired: true)]
    #[OpenApiHeader(ref: "#/x-demo/components/parameters/anotherHeader")]
    public function headerExample()
    {
        $this->request->allowMethod('get');
        $data = $this->getRequest()->getHeader('my_header');
        $this->set(compact('data'));
        $this->viewBuilder()->setOption('serialize', 'data');
    }

    /**
     * View (Security Example)
     */
    #[OpenApiSecurity(name: 'ApiKey')]
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

    #[OpenApiDto(class: ModellessForm::class)]
    public function modellessForm()
    {
        $form = new ModellessForm();
        if ($form->execute($this->request->getData())) {
            return $this->response->withStatus(200);
        }
        return $this->response->withStatus(400);
    }
}

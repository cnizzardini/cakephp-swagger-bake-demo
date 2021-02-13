<?php
declare(strict_types=1);

namespace App\Controller;

use Exception;
use SwaggerBake\Lib\Annotation as Swag;

/**
 * Actors Controller
 *
 * @property \App\Model\Table\ActorsTable $Actors
 * @method \App\Model\Entity\Actor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ActorsController extends AppController
{
    /**
     * List Actors
     *
     * This example uses the `@SwagPaginator` annotation to automatically add in page, limit, sort, and direction
     *
     * @Swag\SwagPaginator
     * @see https://github.com/cnizzardini/cakephp-swagger-bake#swagpaginator
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->request->allowMethod('get');
        $actors = $this->paginate($this->Actors);
        $this->set(compact('actors'));
        $this->viewBuilder()->setOption('serialize', 'actors');
    }

    /**
     * View Actor
     *
     * Barebones example, this was all built direct from your cake models and routes. Additional information is
     * parsed from docblocks using "@see" for links and "@throws" for HTTP 40x and 50x responses. The path parameter
     * was automatically added and these comments come direct from your DocBlock comments.
     *
     * @see https://github.com/cnizzardini/cakephp-swagger-bake#doc-blocks
     * SwaggerBake parses your DocBlock comments, read more!
     * @param string|null $id Actor id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->request->allowMethod('get');

        $actor = $this->Actors->get($id, [
            'contain' => ['FilmActors'],
        ]);

        $this->set('actor', $actor);
        $this->viewBuilder()->setOption('serialize', 'actor');
    }

    /**
     * Add Actor
     *
     * Your Swagger forms are built automatically straight from your Cake Models and Routes, without the need for
     * additional annotations! All batteries were included in this example.
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     * @throws \Cake\Http\Exception\MethodNotAllowedException Method Not Allowed, use HTTP POST
     * @throws Exception
     */
    public function add()
    {
        $this->request->allowMethod('post');
        $actor = $this->Actors->patchEntity(
            $this->Actors->newEmptyEntity(),
            $this->request->getData()
        );
        if ($this->Actors->save($actor)) {
            $this->set(compact('actor'));
            $this->viewBuilder()->setOption('serialize', 'actor');
            return;
        }
        throw new Exception('Unable to save');
    }

    /**
     * Edit Actor
     *
     * The path parameter was automatically added and these comments come direct from your DocBlock comments.
     *
     * @param string|null $id Actor id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @throws \Cake\Http\Exception\MethodNotAllowedException
     * @throws Exception
     */
    public function edit($id = null)
    {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $actor = $this->Actors->get($id, [
            'contain' => [],
        ]);
        $actor = $this->Actors->patchEntity($actor, $this->request->getData());
        if ($this->Actors->save($actor)) {
            $this->set(compact('actor'));
            $this->viewBuilder()->setOption('serialize', 'actor');
            return;
        }
        throw new Exception('Unable to save');
    }

    /**
     * Delete Actor
     *
     * Deletes are disabled in this example
     *
     * @param string|null $id Actor id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException
     * @throw \Cake\Http\Exception\MethodNotAllowedException
     * @throw \Exception Just a Terrible No Good 500 Error
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['delete']);
        $response = $this->response->withHeader('_demo_mode_', 'DELETES ARE DISABLED IN DEMO MODE');
        return $response->withStatus(422);
        /*
        $actor = $this->Actors->get($id);
        if ($this->Actors->delete($actor)) {
            return $this->response->withStatus(202);
        }
        new Exception('Unable to delete');
        */
    }

    /**
     * Actor Films
     *
     * Example of a sub-resource using SwagResponseSchema schemaType and schemaItems to build an array of objects
     *
     * @Swag\SwagResponseSchema(schemaItems={"$ref"="#/components/schemas/Film"})
     *
     * @param string|null $id Actor id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @throw \Cake\Http\Exception\MethodNotAllowedException
     * @throw \Exception hello world
     */
    public function films($id)
    {
        $this->request->allowMethod('get');
        $actor = $this->Actors->get($id, [
            'contain' => ['Films'],
        ]);
        $this->set('films', $actor->films);
        $this->viewBuilder()->setOption('serialize', 'films');
    }
}

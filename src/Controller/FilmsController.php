<?php
declare(strict_types=1);

namespace App\Controller;

use SwaggerBake\Lib\Annotation as Swag;
use SwaggerBake\Lib\Extension\CakeSearch\Annotation\SwagSearch;

/**
 * Films Controller
 *
 * @property \App\Model\Table\FilmsTable $Films
 * @method \App\Model\Entity\Film[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FilmsController extends AppController
{
    public function initialize() : void
    {
        parent::initialize();

        $this->loadComponent('Search.Search', [
            'actions' => ['index'],
        ]);
    }

    /**
     * Search plugin
     *
     * Support for the friendsofcake/search plugin
     *
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\MethodNotAllowedException When invalid method
     * @see https://github.com/FriendsOfCake/search friendsofcake/search extension
     *
     * @SwagSearch(tableClass="\App\Model\Table\FilmsTable", collection="default")
     */
    public function index()
    {
        $this->request->allowMethod('get');
        $query = $this->Films
            ->find('search', [
                'search' => $this->request->getQueryParams(),
                'collection' => 'default'
            ])
            ->contain(['Languages']);
        $films = $this->paginate($query);

        $this->set(compact('films'));
        $this->viewBuilder()->setOption('serialize', 'films');
    }

    /**
     * View method
     *
     * @param string|null $id Film id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @throws \Cake\Datasource\Exception\MethodNotAllowedException When invalid method
     */
    public function view($id = null)
    {
        $this->request->allowMethod('get');

        $film = $this->Films->get($id, [
            'contain' => ['Languages', 'FilmActors', 'FilmCategories', 'FilmTexts', 'Inventories'],
        ]);

        $this->set('film', $film);
        $this->viewBuilder()->setOption('serialize', 'film');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void HTTP 200 on successful add, HTTP 422 on error
     * @throws \Cake\Datasource\Exception\MethodNotAllowedException When invalid method
     */
    public function add()
    {
        $this->request->allowMethod('post');
        $film = $this->Films->newEmptyEntity();
        $film = $this->Films->patchEntity($film, $this->request->getData());
        $this->set(compact('film', 'languages'));
        $this->viewBuilder()->setOption('serialize', 'film', 'languages');
        /*
        if ($this->Films->save($film)) {
            $languages = $this->Films->Languages->find('list', ['limit' => 200]);
            $this->set(compact('film', 'languages'));
            $this->viewBuilder()->setOption('serialize', 'film', 'languages');
            return;
        }
        return $this->response->withStatus(422);
        */
    }

    /**
     * Edit method
     *
     * @param string|null $id Film id.
     * @return \Cake\Http\Response|null|void HTTP 200 on successful edit, HTTP 422 on error
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @throws \Cake\Datasource\Exception\MethodNotAllowedException When invalid method
     */
    public function edit($id = null)
    {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $film = $this->Films->get($id, [
            'contain' => [],
        ]);
        $film = $this->Films->patchEntity($film, $this->request->getData());
        $this->set(compact('film', 'languages'));
        $this->viewBuilder()->setOption('serialize', 'film', 'languages');
        /*
        if ($this->Films->save($film)) {
            $languages = $this->Films->Languages->find('list', ['limit' => 200]);
            $this->set(compact('film', 'languages'));
            $this->viewBuilder()->setOption('serialize', 'film', 'languages');
            return;
        }
        return $this->response->withStatus(422);
        */
    }

    /**
     * Delete method
     *
     * @Swag\SwagResponseSchema(refEntity="", statusCode="204")
     *
     * @param string|null $id Film id.
     * @return \Cake\Http\Response|null|void HTTP 204 on success, HTTP 422 on error.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @throws \Cake\Datasource\Exception\MethodNotAllowedException When invalid method
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['delete']);
        return $this->response->withStatus(422);
        /*
        $film = $this->Films->get($id);
        if ($this->Films->delete($film)) {
            return $this->response->withStatus(204);
        }
        return $this->response->withStatus(422);
        */
    }
}

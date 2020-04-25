<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * FilmCategories Controller
 *
 * @property \App\Model\Table\FilmCategoriesTable $FilmCategories
 * @method \App\Model\Entity\FilmCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FilmCategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\MethodNotAllowedException When invalid method
     */
    public function index()
    {
        $this->request->allowMethod('get');
        $this->paginate = [
            'contain' => ['Films', 'Categories'],
            'conditions' => ['FilmCategories.film_id' => $this->request->getParam('film_id')]
        ];
        $filmCategories = $this->paginate($this->FilmCategories);

        $this->set(compact('filmCategories'));
        $this->viewBuilder()->setOption('serialize', 'filmCategories');
    }

    /**
     * View method
     *
     * @param string|null $id Film Category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @throws \Cake\Datasource\Exception\MethodNotAllowedException When invalid method
     */
    public function view($id = null)
    {
        $this->request->allowMethod('get');

        $filmCategory = $this->FilmCategories->get($id, [
            'contain' => ['Films', 'Categories'],
        ]);

        $this->set('filmCategory', $filmCategory);
        $this->viewBuilder()->setOption('serialize', 'filmCategory');
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
        $filmCategory = $this->FilmCategories->newEmptyEntity();
        $filmCategory = $this->FilmCategories->patchEntity($filmCategory, $this->request->getData());
        if ($this->FilmCategories->save($filmCategory)) {
    $films = $this->FilmCategories->Films->find('list', ['limit' => 200]);
    $categories = $this->FilmCategories->Categories->find('list', ['limit' => 200]);
            $this->set(compact('filmCategory', 'films', 'categories'));
            $this->viewBuilder()->setOption('serialize', 'filmCategory', 'films', 'categories');
            return;
        }
        return $this->response->withStatus(422);
    }

    /**
     * Edit method
     *
     * @param string|null $id Film Category id.
     * @return \Cake\Http\Response|null|void HTTP 200 on successful edit, HTTP 422 on error
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @throws \Cake\Datasource\Exception\MethodNotAllowedException When invalid method
     */
    public function edit($id = null)
    {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $filmCategory = $this->FilmCategories->get($id, [
            'contain' => [],
        ]);
        $filmCategory = $this->FilmCategories->patchEntity($filmCategory, $this->request->getData());
        if ($this->FilmCategories->save($filmCategory)) {
    $films = $this->FilmCategories->Films->find('list', ['limit' => 200]);
    $categories = $this->FilmCategories->Categories->find('list', ['limit' => 200]);
            $this->set(compact('filmCategory', 'films', 'categories'));
            $this->viewBuilder()->setOption('serialize', 'filmCategory', 'films', 'categories');
            return;
        }
        return $this->response->withStatus(422);
    }

    /**
     * Delete method
     *
     * @param string|null $id Film Category id.
     * @return \Cake\Http\Response|null|void HTTP 204 on success, HTTP 422 on error.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @throws \Cake\Datasource\Exception\MethodNotAllowedException When invalid method
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['delete']);
        $filmCategory = $this->FilmCategories->get($id);
        if ($this->FilmCategories->delete($filmCategory)) {
            return $this->response->withStatus(204);
        }
        return $this->response->withStatus(422);
    }
}

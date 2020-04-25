<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoriesController extends AppController
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
        $categories = $this->paginate($this->Categories);

        $this->set(compact('categories'));
        $this->viewBuilder()->setOption('serialize', 'categories');
    }

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @throws \Cake\Datasource\Exception\MethodNotAllowedException When invalid method
     */
    public function view($id = null)
    {
        $this->request->allowMethod('get');

        $category = $this->Categories->get($id, [
            'contain' => ['FilmCategories'],
        ]);

        $this->set('category', $category);
        $this->viewBuilder()->setOption('serialize', 'category');
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
        $category = $this->Categories->newEmptyEntity();
        $category = $this->Categories->patchEntity($category, $this->request->getData());
        if ($this->Categories->save($category)) {
            $this->set(compact('category'));
            $this->viewBuilder()->setOption('serialize', 'category');
            return;
        }
        return $this->response->withStatus(422);
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void HTTP 200 on successful edit, HTTP 422 on error
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @throws \Cake\Datasource\Exception\MethodNotAllowedException When invalid method
     */
    public function edit($id = null)
    {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $category = $this->Categories->get($id, [
            'contain' => [],
        ]);
        $category = $this->Categories->patchEntity($category, $this->request->getData());
        if ($this->Categories->save($category)) {
            $this->set(compact('category'));
            $this->viewBuilder()->setOption('serialize', 'category');
            return;
        }
        return $this->response->withStatus(422);
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void HTTP 204 on success, HTTP 422 on error.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @throws \Cake\Datasource\Exception\MethodNotAllowedException When invalid method
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['delete']);
        $category = $this->Categories->get($id);
        if ($this->Categories->delete($category)) {
            return $this->response->withStatus(204);
        }
        return $this->response->withStatus(422);
    }
}

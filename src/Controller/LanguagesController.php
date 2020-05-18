<?php
declare(strict_types=1);

namespace App\Controller;

use SwaggerBake\Lib\Annotation as Swag;

/**
 * Languages Controller
 *
 * @property \App\Model\Table\LanguagesTable $Languages
 * @method \App\Model\Entity\Language[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LanguagesController extends AppController
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
        $languages = $this->paginate($this->Languages);

        $this->set(compact('languages'));
        $this->viewBuilder()->setOption('serialize', 'languages');
    }

    /**
     * View method
     *
     * @param string|null $id Language id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @throws \Cake\Datasource\Exception\MethodNotAllowedException When invalid method
     */
    public function view($id = null)
    {
        $this->request->allowMethod('get');

        $language = $this->Languages->get($id, [
            'contain' => ['Films'],
        ]);

        $this->set('language', $language);
        $this->viewBuilder()->setOption('serialize', 'language');
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
        $language = $this->Languages->newEmptyEntity();
        $language = $this->Languages->patchEntity($language, $this->request->getData());
        $this->set(compact('language'));
        $this->viewBuilder()->setOption('serialize', 'language');
        /*
        if ($this->Languages->save($language)) {
            $this->set(compact('language'));
            $this->viewBuilder()->setOption('serialize', 'language');
            return;
        }
        return $this->response->withStatus(422);
        */
    }

    /**
     * Edit method
     *
     * @param string|null $id Language id.
     * @return \Cake\Http\Response|null|void HTTP 200 on successful edit, HTTP 422 on error
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @throws \Cake\Datasource\Exception\MethodNotAllowedException When invalid method
     */
    public function edit($id = null)
    {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $language = $this->Languages->get($id, [
            'contain' => [],
        ]);
        $language = $this->Languages->patchEntity($language, $this->request->getData());
        $this->set(compact('language'));
        $this->viewBuilder()->setOption('serialize', 'language');
        /*
        if ($this->Languages->save($language)) {
            $this->set(compact('language'));
            $this->viewBuilder()->setOption('serialize', 'language');
            return;
        }
        return $this->response->withStatus(422);
        */
    }

    /**
     * Delete method
     *
     * @Swag\SwagResponseSchema(refEntity="", httpCode=204)
     *
     * @param string|null $id Language id.
     * @return \Cake\Http\Response|null|void HTTP 204 on success, HTTP 422 on error.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @throws \Cake\Datasource\Exception\MethodNotAllowedException When invalid method
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['delete']);
        return $this->response->withStatus(204);
        /*
        $language = $this->Languages->get($id);
        if ($this->Languages->delete($language)) {
            return $this->response->withStatus(204);
        }
        return $this->response->withStatus(422);
        */
    }
}

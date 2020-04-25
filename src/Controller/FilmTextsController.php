<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * FilmTexts Controller
 *
 * @property \App\Model\Table\FilmTextsTable $FilmTexts
 * @method \App\Model\Entity\FilmText[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FilmTextsController extends AppController
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
            'contain' => ['Films'],
            'conditions' => ['FilmTexts.film_id' => $this->request->getParam('film_id')]
        ];
        $filmTexts = $this->paginate($this->FilmTexts);

        $this->set(compact('filmTexts'));
        $this->viewBuilder()->setOption('serialize', 'filmTexts');
    }

    /**
     * View method
     *
     * @param string|null $id Film Text id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @throws \Cake\Datasource\Exception\MethodNotAllowedException When invalid method
     */
    public function view($id = null)
    {
        $this->request->allowMethod('get');

        $filmText = $this->FilmTexts->get($id, [
            'contain' => ['Films'],
        ]);

        $this->set('filmText', $filmText);
        $this->viewBuilder()->setOption('serialize', 'filmText');
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
        $filmText = $this->FilmTexts->newEmptyEntity();
        $filmText = $this->FilmTexts->patchEntity($filmText, $this->request->getData());
        if ($this->FilmTexts->save($filmText)) {
    $films = $this->FilmTexts->Films->find('list', ['limit' => 200]);
            $this->set(compact('filmText', 'films'));
            $this->viewBuilder()->setOption('serialize', 'filmText', 'films');
            return;
        }
        return $this->response->withStatus(422);
    }

    /**
     * Edit method
     *
     * @param string|null $id Film Text id.
     * @return \Cake\Http\Response|null|void HTTP 200 on successful edit, HTTP 422 on error
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @throws \Cake\Datasource\Exception\MethodNotAllowedException When invalid method
     */
    public function edit($id = null)
    {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $filmText = $this->FilmTexts->get($id, [
            'contain' => [],
        ]);
        $filmText = $this->FilmTexts->patchEntity($filmText, $this->request->getData());
        if ($this->FilmTexts->save($filmText)) {
    $films = $this->FilmTexts->Films->find('list', ['limit' => 200]);
            $this->set(compact('filmText', 'films'));
            $this->viewBuilder()->setOption('serialize', 'filmText', 'films');
            return;
        }
        return $this->response->withStatus(422);
    }

    /**
     * Delete method
     *
     * @param string|null $id Film Text id.
     * @return \Cake\Http\Response|null|void HTTP 204 on success, HTTP 422 on error.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @throws \Cake\Datasource\Exception\MethodNotAllowedException When invalid method
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['delete']);
        $filmText = $this->FilmTexts->get($id);
        if ($this->FilmTexts->delete($filmText)) {
            return $this->response->withStatus(204);
        }
        return $this->response->withStatus(422);
    }
}

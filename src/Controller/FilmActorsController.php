<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

use SwaggerBake\Lib\Annotation as Swag;

/**
 * FilmActors Controller
 *
 * @property \App\Model\Table\FilmActorsTable $FilmActors
 * @method \App\Model\Entity\FilmActor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FilmActorsController extends AppController
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
            'contain' => ['Actors', 'Films'],
            'conditions' => ['FilmActors.film_id' => $this->request->getParam('film_id')]
        ];
        $filmActors = $this->paginate($this->FilmActors);

        $this->set(compact('filmActors'));
        $this->viewBuilder()->setOption('serialize', 'filmActors');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     * @throws MethodNotAllowedException
     * @throws Exception
     */
    public function add()
    {
        $this->request->allowMethod('post');
        $filmActor = $this->FilmActors->newEntity([
            'film_id' => $this->request->getParam('film_id'),
            'actor_id' => $this->request->getData('actor_id'),
        ]);
        $this->set(compact('filmActor'));
        $this->viewBuilder()->setOption('serialize', 'filmActor');
    }

    /**
     * Delete method
     *
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @throw MethodNotAllowedException
     * @throw Exception
     */
    public function delete()
    {
        $this->request->allowMethod(['delete']);
        return $this->response->withStatus(204);
    }
}

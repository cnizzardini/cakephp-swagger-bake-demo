<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

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
}

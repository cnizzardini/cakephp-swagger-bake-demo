<?php
declare(strict_types=1);

namespace App\Controller;

use SwaggerBake\Lib\Annotation as Swag;

/**
 * Cities Controller
 *
 * @property \App\Model\Table\CitiesTable $Cities
 * @method \App\Model\Entity\City[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CitiesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\MethodNotAllowedException When invalid method
     * @Swag\SwagResponseSchema(refEntity="#/components/schemas/CityExtended")
     * @Swag\SwagPaginator()
     */
    public function index()
    {
        $this->request->allowMethod('get');
        $this->paginate = [
            'contain' => ['Countries'],
        ];
        $cities = $this->paginate($this->Cities);

        $this->set(compact('cities'));
        $this->viewBuilder()->setOption('serialize', 'cities');
    }

    /**
     * View method
     *
     * @param string|null $id City id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @throws \Cake\Datasource\Exception\MethodNotAllowedException When invalid method
     */
    public function view($id = null)
    {
        $this->request->allowMethod('get');

        $city = $this->Cities->get($id, [
            'contain' => ['Countries'],
        ]);

        $this->set('city', $city);
        $this->viewBuilder()->setOption('serialize', 'city');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void HTTP 200 on successful add
     * @throws \Cake\Datasource\Exception\MethodNotAllowedException When invalid method
     * @throws \Exception
     */
    public function add()
    {
        $this->request->allowMethod('post');
        $city = $this->Cities->newEmptyEntity();
        $city = $this->Cities->patchEntity($city, $this->request->getData());
        if ($this->Cities->save($city)) {
            $this->viewBuilder()->setOption('serialize', 'city');
            return;
        }
        throw new \Exception("Record not created");
    }

    /**
     * Edit method
     *
     * @param string|null $id City id.
     * @return \Cake\Http\Response|null|void HTTP 200 on successful edit
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @throws \Cake\Datasource\Exception\MethodNotAllowedException When invalid method
     * @throws \Exception
     */
    public function edit($id = null)
    {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $city = $this->Cities->get($id, [
            'contain' => [],
        ]);
        $city = $this->Cities->patchEntity($city, $this->request->getData());
        if ($this->Cities->save($city)) {
            $this->viewBuilder()->setOption('serialize', 'city');
            return;
        }
        throw new \Exception("Record not saved");
    }

    /**
     * Delete method
     *
     * @param string|null $id City id.
     * @return \Cake\Http\Response|null|void HTTP 204 on success
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @throws \Cake\Datasource\Exception\MethodNotAllowedException When invalid method
     * @throws \Exception
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['delete']);
        $city = $this->Cities->get($id);
        if ($this->Cities->delete($city)) {
            return $this->response->withStatus(204);
        }
        throw new \Exception("Record not deleted");
    }
}

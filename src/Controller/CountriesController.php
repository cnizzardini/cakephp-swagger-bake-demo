<?php
declare(strict_types=1);

namespace App\Controller;

use SwaggerBake\Lib\Attribute\OpenApiPaginator;
use SwaggerBake\Lib\Attribute\OpenApiRequestBody;
use SwaggerBake\Lib\Attribute\OpenApiResponse;

/**
 * Countries Controller
 *
 * @property \App\Model\Table\CountriesTable $Countries
 * @method \App\Model\Entity\Country[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CountriesController extends AppController
{
    /**
     * Index method
     *
     * Use a custom OpenApi schema from swagger.yaml
     *
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Http\Exception\MethodNotAllowedException When invalid method
     */
    #[OpenApiPaginator]
    #[OpenApiResponse(schemaType: "", ref: "#/components/schemas/Places")]
    public function index()
    {
        $this->request->allowMethod('get');
        $countries = $this->paginate($this->Countries);

        $this->set(compact('countries'));
        $this->viewBuilder()->setOption('serialize', 'countries');
    }

    /**
     * View method
     *
     * Use a custom OpenApi schema from swagger.yaml
     *
     * @param string|null $id Country id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @throws \Cake\Http\Exception\MethodNotAllowedException When invalid method
     */
    #[OpenApiResponse(ref: "#/components/schemas/Place")]
    public function view($id = null)
    {
        $this->request->allowMethod('get');

        $country = $this->Countries->get($id, [
            'contain' => ['Cities'],
        ]);

        $this->set('country', $country);
        $this->viewBuilder()->setOption('serialize', 'country');
    }

    /**
     * Add method
     *
     * Use a custom OpenApi schema from swagger.yaml
     *
     * @return \Cake\Http\Response|null|void HTTP 200 on successful add
     * @throws \Cake\Http\Exception\MethodNotAllowedException When invalid method
     * @throws \Exception
     */
    #[OpenApiRequestBody(ref: "#/components/schemas/Place")]
    #[OpenApiResponse(ref: "#/components/schemas/Place")]
    public function add()
    {
        $this->request->allowMethod('post');
        $country = $this->Countries->newEmptyEntity();
        $country = $this->Countries->patchEntity($country, $this->request->getData());
        if ($this->Countries->save($country)) {
            $this->viewBuilder()->setOption('serialize', 'country');
            return;
        }
        throw new \Exception("Record not created");
    }

    /**
     * Edit method
     *
     * Use a custom OpenApi schema from swagger.yaml
     *
     * @param string|null $id Country id.
     * @return \Cake\Http\Response|null|void HTTP 200 on successful edit
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @throws \Cake\Http\Exception\MethodNotAllowedException When invalid method
     */
    #[OpenApiRequestBody(ref: "#/components/schemas/Place")]
    #[OpenApiResponse(ref: "#/components/schemas/Place")]
    public function edit($id = null)
    {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $country = $this->Countries->get($id, [
            'contain' => [],
        ]);
        $country = $this->Countries->patchEntity($country, $this->request->getData());
        if ($this->Countries->save($country)) {
            $this->viewBuilder()->setOption('serialize', 'country');
            return;
        }
        throw new \Exception("Record not saved");
    }

    /**
     * Delete method
     *
     * @param string|null $id Country id.
     * @return \Cake\Http\Response|null|void HTTP 204 on success
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @throws \Cake\Http\Exception\MethodNotAllowedException When invalid method
     * @throws \Exception
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['delete']);
        $response = $this->response->withHeader('_demo_mode_', 'DELETES ARE DISABLED IN DEMO MODE');
        return $response->withStatus(422);
/*        $country = $this->Countries->get($id);
        if ($this->Countries->delete($country)) {
            return $this->response->withStatus(204);
        }
        throw new \Exception("Record not deleted");*/
    }
}

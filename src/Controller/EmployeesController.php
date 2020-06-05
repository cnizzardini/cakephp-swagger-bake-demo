<?php
declare(strict_types=1);

namespace App\Controller;

use SwaggerBake\Lib\Annotation as Swag;

/**
 * Employees Controller
 *
 * @property \App\Model\Table\EmployeesTable $Employees
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployeesController extends AppController
{
    public function initialize() : void
    {
        parent::initialize();

        $this->loadComponent('Authentication.Authentication');
        $this->Authentication->allowUnauthenticated(['index']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\MethodNotAllowedException When invalid method
     * @Swag\SwagPaginator()
     */
    public function index()
    {
        $this->request->allowMethod('get');
        $this->paginate = [
            'contain' => ['Addresses', 'Stores'],
        ];
        $employees = $this->paginate($this->Employees);

        $this->set(compact('employees'));
        $this->viewBuilder()->setOption('serialize', 'employees');
    }

    /**
     * View (Security Example)
     *
     * Example showing integration with AuthenticationComponent. Use API-KEY: 123
     *
     * @see https://book.cakephp.org/authentication/2/en/index.html AuthenticationComponent
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @throws \Cake\Datasource\Exception\MethodNotAllowedException When invalid method
     */
    public function view($id = null)
    {
        $this->request->allowMethod('get');

        $employee = $this->Employees->get($id);

        $this->set('employee', $employee);
        $this->viewBuilder()->setOption('serialize', 'employee');
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
        $employee = $this->Employees->newEmptyEntity();
        $employee = $this->Employees->patchEntity($employee, $this->request->getData());
        if ($this->Employees->save($employee)) {
            $this->viewBuilder()->setOption('serialize', 'employee');
            return;
        }
        throw new \Exception("Record not created");
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null|void HTTP 200 on successful edit
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * @throws \Cake\Datasource\Exception\MethodNotAllowedException When invalid method
     * @throws \Exception
     */
    public function edit($id = null)
    {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $employee = $this->Employees->get($id, [
            'contain' => [],
        ]);
        $employee = $this->Employees->patchEntity($employee, $this->request->getData());
        if ($this->Employees->save($employee)) {
            $this->viewBuilder()->setOption('serialize', 'employee');
            return;
        }
        throw new \Exception("Record not saved");
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null|void HTTP 204 on success
     * @Swag\SwagResponseSchema(refEntity="", statusCode="4XX", description="Deletion errors")
     * @throws \Exception
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['delete']);
        $employee = $this->Employees->get($id);
        if ($this->Employees->delete($employee)) {
            return $this->response->withStatus(204);
        }
        throw new \Exception("Record not deleted");
    }
}

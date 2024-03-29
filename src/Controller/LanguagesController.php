<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use SwaggerBake\Lib\Attribute\OpenApiPaginator;

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
     * @throws \Cake\Http\Exception\MethodNotAllowedException When invalid method
     */
    #[OpenApiPaginator]
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
     * @throws \Cake\Http\Exception\MethodNotAllowedException When invalid method
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
}

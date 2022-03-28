<?php

namespace OtherDemo\Controller;

use Demo\Controller\AppController;
use SwaggerBake\Lib\Attribute\OpenApiResponse;

class TestController extends AppController
{
    /**
     * Just an example of a plugin.
     *
     * @return \Cake\Http\Response
     */
    #[OpenApiResponse(description: 'other demo', mimeTypes: ['text/plain'])]
    public function index()
    {
        return $this->response->withStringBody('hello world');
    }
}

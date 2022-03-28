<?php

namespace Demo\Controller;

use SwaggerBake\Lib\Attribute\OpenApiResponse;

class TestController extends AppController
{
    /**
     * Just an example of a plugin.
     *
     * @return \Cake\Http\Response
     */
    #[OpenApiResponse(description: 'demo', mimeTypes: ['text/plain'])]
    public function index()
    {
        return $this->response->withStringBody('hello world');
    }
}

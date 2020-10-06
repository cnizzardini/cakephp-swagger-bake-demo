<?php

namespace App\Event;

use Cake\Event\Event;
use Cake\Event\EventManager;
use SwaggerBake\Lib\OpenApi\Operation;
use SwaggerBake\Lib\OpenApi\Schema;
use SwaggerBake\Lib\Swagger;

class SwaggerBakeListener
{
    /**
     * Listens for SwaggerBake events
     *
     * @return void
     */
    public function listen(): void
    {
        EventManager::instance()
            ->on('SwaggerBake.Schema.created', function (Event $event) {
                return $this->schemaCreated($event);
            });

        EventManager::instance()
            ->on('SwaggerBake.Operation.created', function (Event $event) {
                return $this->operationCreated($event);
            });

        EventManager::instance()
            ->on('SwaggerBake.beforeRender', function (Event $event) {
                return $this->beforeRender($event);
            });
    }

    /**
     * @param Event $event
     * @return \SwaggerBake\Lib\OpenApi\Schema
     */
    private function schemaCreated(Event $event): Schema
    {
        /** @var Schema $schema */
        $schema = $event->getSubject();
        if ($schema->getName() === 'Actor') {
            $schema->setDescription('Actor Entity (modified by SwaggerBake.Schema.created event)');
        }

        return $schema;
    }

    /**
     * @param Event $event
     * @return \SwaggerBake\Lib\OpenApi\Operation
     */
    private function operationCreated(Event $event): Operation
    {
        /** @var Operation $operation */
        $operation = $event->getSubject();

        if ($operation->getOperationId() === 'actors:add:post') {
            $operation->setDescription(
                $operation->getDescription() . ' (modified by SwaggerBake.Operation.created event)'
            );
        }

        return $operation;
    }

    /**
     * @param Event $event
     * @return \SwaggerBake\Lib\Swagger
     */
    private function beforeRender(Event $event): Swagger
    {
        /** @var Swagger $swagger */
        $swagger = $event->getSubject();
        $openApi = $swagger->getArray();
        $openApi['info']['description'].= ' This is sentence was added via the SwaggerBake.beforeRender event';
        $swagger->setArray($openApi);

        return $swagger;
    }
}

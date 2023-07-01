<?php

namespace App\Identifier\Resolver;

use Authentication\Identifier\Resolver\ResolverInterface;

class CustomResolver implements ResolverInterface
{
    public function find(array $conditions, string $type = self::TYPE_AND): \ArrayAccess|array|null
    {
        if ($conditions['token'] === '123') {
            return [''];
        }

        return null;
    }
}

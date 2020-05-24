<?php
declare(strict_types=1);

namespace App\Model\Filter;

use Search\Model\Filter\FilterCollection;

class FilmsPrivateCollection extends FilterCollection
{
    public function initialize(): void
    {
        $this
            ->add('id', 'Search.Value', [
                'before' => true,
                'after' => true,
                'mode' => 'or',
                'comparison' => 'LIKE',
                'wildcardAny' => '*',
                'wildcardOne' => '?',
                'fields' => ['id'],
            ])
        ;


        // More $this->add() calls here. The argument for FilterCollection::add()
        // are same as those of searchManager()->add() shown above.
    }
}

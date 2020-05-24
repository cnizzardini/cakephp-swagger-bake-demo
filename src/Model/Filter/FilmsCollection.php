<?php
declare(strict_types=1);

namespace App\Model\Filter;

use Search\Model\Filter\FilterCollection;

class FilmsCollection extends FilterCollection
{
    public function initialize(): void
    {
        $this
            ->add('title', 'Search.Like', [
                'before' => true,
                'after' => true,
                'mode' => 'or',
                'comparison' => 'LIKE',
                'wildcardAny' => '*',
                'wildcardOne' => '?',
                'fields' => ['title'],
            ])
            ->add('rating', 'Search.Value', [
                'before' => true,
                'after' => true,
                'mode' => 'or',
                'wildcardAny' => '*',
                'wildcardOne' => '?',
                'fields' => ['rating'],
            ])
/*            ->add('language', 'Search.Value', [
                'before' => true,
                'after' => true,
                'mode' => 'or',
                'wildcardAny' => '*',
                'wildcardOne' => '?',
                'fields' => ['Language.name'],
            ])*/
        ;


        // More $this->add() calls here. The argument for FilterCollection::add()
        // are same as those of searchManager()->add() shown above.
    }
}

<?php

declare(strict_types=1);

namespace BehaviorFixtures\ORM;

use Doctrine\ORM\EntityRepository;
use Knp\DoctrineBehaviors\ORM\Filterable;

class FilterableRepository extends EntityRepository
{
    use Filterable\FilterableRepository;

    public function getILikeFilterColumns()
    {
        return [];
    }

    public function getLikeFilterColumns()
    {
        return ['e:name'];
    }

    public function getEqualFilterColumns()
    {
        return ['e:code'];
    }

    public function getInFilterColumns()
    {
        return [];
    }
}

<?php

declare(strict_types=1);

/**
 * This file is part of the KnpDoctrineBehaviors package.
 *
 * (c) KnpLabs <http://knplabs.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Knp\DoctrineBehaviors\Model\Loggable;

trait Loggable
{
    /**
     * @return string some log informations
     */
    public function getUpdateLogMessage(array $changeSets = [])
    {
        $message = [];
        foreach ($changeSets as $property => $changeSet) {
            for ($i = 0, $s = sizeof($changeSet); $i < $s; $i++) {
                if ($changeSet[$i] instanceof \DateTime) {
                    $changeSet[$i] = $changeSet[$i]->format('Y-m-d H:i:s.u');
                }
            }

            if ($changeSet[0] !== $changeSet[1]) {
                $message[] = sprintf(
                    '%s #%d : property "%s" changed from "%s" to "%s"',
                    self::class,
                    $this->getId(),
                    $property,
                    ! is_array($changeSet[0]) ? $changeSet[0] : 'an array',
                    ! is_array($changeSet[1]) ? $changeSet[1] : 'an array'
                );
            }
        }

        return implode("\n", $message);
    }

    public function getCreateLogMessage()
    {
        return sprintf('%s #%d created', self::class, $this->getId());
    }

    public function getRemoveLogMessage()
    {
        return sprintf('%s #%d removed', self::class, $this->getId());
    }
}

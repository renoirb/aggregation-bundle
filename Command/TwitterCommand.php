<?php

namespace Renoir\AggregationBundle\Command;

use Guzzle\Service\Command\DynamicCommand;

/**
 * Base Command class for Twitter service
 *
 * - Favour json
 */
class TwitterCommand extends DynamicCommand
{
    /**
     * {@inheritdoc}
     */
    protected function build()
    {
        parent::build();
        // JSON only please
        $this->request->setHeader('Content-Type', 'application/json');
    }
}
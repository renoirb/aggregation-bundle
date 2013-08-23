<?php

namespace Renoir\AggregationBundle\Command\Twitter;

use Renoir\AggregationBundle\Command\AbstractJsonCommand as Base;

/**
 *
 * End point:     http://api.twitter.com/1/statuses/user_timeline.format
 * Doc:           https://dev.twitter.com/docs/api/1/get/statuses/user_timeline
 */
class Tweets extends Base   
{
    /**
     * {@inheritdoc}
     */
    protected function build()
    {
        $this->request = $this->client->get(
            array(
                '/statuses/user_timeline.json'.
                '?include_entities=true'.
                '&include_rts=true'.
                '&screen_name=renoirb'
                ,$this->data
            )
        );
        parent::build();
    }
}
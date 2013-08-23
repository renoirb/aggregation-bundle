<?php 

namespace Renoir\AggregationBundle\Manager;

// Internal
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpKernel\Log\LoggerInterface;

// Specific
use Symfony\Component\Security\Core\SecurityContextInterface;

// Domain objects

// Entities

// Exceptions
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use \Exception;

/**
 * Abstract Manager
 */
abstract class AbstractManager 
{


    public function fetch($clientKey=null)
    {
        if(in_array($clientKey,$this->supportedClientKeys)) {
            $this->clientKey = $clientKey;
        }
        return $this->_call();
    }

    /**
     * 
     * @return Renoir\AggregationBundle\AbstractClient instance
     */
    protected function _call()
    {
        $serviceBuilder = $this->get('guzzle.service_builder');
        $client = $serviceBuilder->get($this->clientKey);
 
        return $client;

    /*
        $command = $client->getCommand('pingtestprout');
        $out = $command->getRequest()->getUrl();
        #$out = $command->getResponse()->getBody();
    */  
    /*
        $command = $client->getCommand('image', array(
            'screen_name'=>'gabiviana',
            'size'=>'original'
        ));
        $out = print_r($command->getResult()->getHeaders(),1);
    */
    /* 
        $command = $client->getCommand('statuses', array(
            'screen_name'=>'renoirb'
        ));


        $execution = $client->execute($command);

        $out = print_r($command->getResult(),1);   
    */
    }

}
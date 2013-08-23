<?php

namespace Renoir\AggregationBundle;

use Guzzle\Service\Inspector;
use Guzzle\Service\Client;
use Symfony\Component\Config\FileLocator;
use Guzzle\Service\Description\ServiceDescription;

/**
 * Abstract Guzzle Client from Guzzle ServiceBuilder
 */
abstract class AbstractClient extends Client
{


    /**
     * Define service description filename
     * 
     * Here to patch a _cleaner_ way to declare a client's
     * commands definitions xml file.
     * 
     * A solution path would be to do a Compile Pass in the DiC
     * 
     * http://richardmiller.co.uk/2012/02/22/symfony2-manipulating-service-parameters-and-definitions/
     *
     * @author Renoir Boulanger <hello@renoirboulanger.com>
     * 
     * @param string $fileName File name to search for within $config['client']['configDir']
     */
    protected function setServiceDescriptionXml($fileName)
    {
        $clientConfigArray = $this->getConfig('client');
        $locator = new FileLocator($clientConfigArray['configDir']);
        $commandDescriptionFiles = $locator->locate($fileName, null, false);
        $descriptions = ServiceDescription::factory($commandDescriptionFiles[0]);
        $this->setDescription($descriptions);
    }

    
    public function __construct($baseUrl, $config)
    {
        $config['client']['configDir'] = array(__DIR__.'/Resources/config');
        parent::__construct($baseUrl, $config);
    }
}

<?php

namespace Renoir\AggregationBundle;

use Guzzle\Service\Inspector;

/**
 * Twitter Client
 */
class TwitterClient extends AbstractClient
{

    /* Notes: http://guzzlephp.org/api/class-Guzzle.Service.Client.html */
    #protected $magicMethodBehavior = true;

    /**
     * Factory method to create a new TwitterClient
     *
     * @param array|Collection $config Configuration data. Array keys:
     *    base_url - Base URL of the web service
     *    scheme - API scheme (aka. http/https), defaults: "https"
     *    sub - API subdomain endpoint, defaults: "api"
     *    version - API version declared in endpoint url, defaults: 1
     *
     * @return TwitterClient
     */
    public static function factory($config = array())
    {
        $default = array(
            'base_url' => '{scheme}://{sub}.twitter.com/{version}/',
            'scheme' => 'https',
            'sub' => 'api',
            'version' => 1
        );
        $required = array('scheme', 'version', 'base_url', 'sub');
        $config = Inspector::prepareConfig($config, $default, $required);

        $client = new self(
            $config->get('base_url'),
            array(
                'scheme'=> $config->get('scheme')
                ,'sub'=> $config->get('sub')
                ,'version'=> $config->get('version')
            )
        );
        $client->setConfig($config);

        return $client;
    }

    /**
     * Client constructor
     *
     * @param string $baseUrl Base URL of the web service
     * @param string $scheme  API scheme (aka. http/https), defaults: "https"
     * @param string $sub     API subdomain endpoint, defaults: "api"
     * @param string $version API version declared in endpoint url, defaults: 1
     */
    public function __construct($baseUrl, $config)
    {
        parent::__construct($baseUrl,$config);
        $this->scheme = $config['scheme'];
        $this->sub = $config['sub'];
        $this->version = $config['version'];

        $this->setServiceDescriptionXml('twitter.commands.xml');
        
        $oauthConfig = array(
            'consumer_key' => 'CONSUMERKEY'
            ,'token' => 'TOKEN'
            ,'token_secret' => 'SECRET'
        );


        #$oauth = new \Guzzle\Http\Plugin\OauthPlugin($oauthConfig);
        #$this->addSubscriber($oauth);
    }
}

<?php

namespace Taiga;

use Buzz\Browser,
    Buzz\Client\Curl;

class RestClient
{
    private $baseUrl;
    private $token;

    /**
     * Constructor
     * @param string $token
     * @param string $baseUrl
     */
    public function __construct($token, $baseUrl)
    {
        $this->token = $token;
        $this->baseUrl = $baseUrl;
    }

    /**
     * Prepare the curl request
     *
     * @param string $apiCall the API call function
     * @param array $payload Parameters
     * @return array
     */
    public function request($method, $apiCall, $payload = [])
    {
        $url = rtrim($this->baseUrl . $apiCall, '/?');
        $curl = $this->prepareCurl();
        $browser = new Browser($curl);
        $headers = [
            "Authorization" => "Bearer ".$this->token,
            "Content-type"  => "application/json"
        ];
        $response = $browser->call($url, $method, $headers, json_encode($payload));

        return $response->getContent();
    }

    /**
     * resolve curl configuration
     * @return Curl
     */
    private function prepareCurl()
    {
        $curl = new Curl();
        $curl->setOption(CURLOPT_USERAGENT, 'Taiga-PHP-SDK');
        $curl->setVerifyPeer(false);
        $curl->setTimeout(200);

        return $curl;
    }

}

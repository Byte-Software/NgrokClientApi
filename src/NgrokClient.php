<?php

namespace ByteSoftware\NgrokClientApi;

use GuzzleHttp\Client;

class NgrokClient 
{
    /** @var GuzzleHttp\Client; **/
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('ngrokclient.host'),
            'http_errors' => false,
            'exceptions' => false,
            'timeout'  => 2.0
        ]);
    }

    public function getTunnels()
    {
        try {
            $response = $this->client->request('GET', '/api/tunnels');
        } catch (\GuzzleHttp\Exception\TransferException $ex) {
            return false;
        }

        $tunnels = json_decode($response->getBody()->getContents(), true);

        return $tunnels;
    }

    public function startTunnel()
    {
        $response = $this->client->request('POST', '/api/tunnels', ['json' => $body])->getBody()->getContents();

        return $response;
    }

    public function getTunnelDetails()
    {

    }

    public function stopTunnel($name)
    {
        $response = $this->client->request('DELETE', '/api/tunnels/' . $name)->getBody()->getContents();

        return $response;
    }
}
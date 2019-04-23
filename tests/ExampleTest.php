<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

require_once 'vendor/autoload.php';
use GuzzleHttp\Client;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $client = new Client([
        base_uri'        => 'https://api.github.com',
               'timeout'         => 0,
               'allow_redirects' => false,
               'proxy'           => '192.168.16.1:10'
        ]);
        // Create a client and provide a base URL
        //$client = new Client('https://api.github.com');
// Create a request with basic Auth
        $request = $client->get('/user')->setAuth('hooduku', 'Java0man');
// Send the request and get the response
        $response = $request->send();
        echo $response->getBody();
// >>> {"type":"User", ...
        echo $response->getHeader('Content-Length');
        $this->get('/');

        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );
    }
}

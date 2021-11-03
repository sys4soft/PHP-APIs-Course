<?php

class api_logic
{

    private $endpoint;
    private $params;

    // --------------------------------------------------
    public function __construct($endpoint, $params = null)
    {
        // define the object/class properties
        $this->endpoint = $endpoint;
        $this->params = $params;
    }

    // --------------------------------------------------
    public function endpoint_exists()
    {
        // check if the endpoint is a valid class method
        return method_exists($this, $this->endpoint);
    }












    // --------------------------------------------------
    // ENDPOINTS
    // --------------------------------------------------
    public function status()
    {
        return [
            'status' => 'SUCCESS',
            'message' => 'API is running ok!',
            'results' => null
        ];
    }

    // --------------------------------------------------
    public function get_all_clients()
    {
        return [
            'status' => 'SUCCESS',
            'message' => '',
            'results' => [
                'joao','ana','pedro','antónio'
            ]
        ];
    }

    // --------------------------------------------------
    public function get_all_products()
    {
        return [
            'status' => 'SUCCESS',
            'message' => '',
            'results' => [
                'laranjas','ananás','martelo','parafuso'
            ]
        ];
    }
}
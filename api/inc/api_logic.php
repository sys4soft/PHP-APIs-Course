<?php

class api_logic
{

    private $endpoint;
    private $params;

    public function __construct($endpoint, $params = null)
    {
        $this->endpoint = $endpoint;
        $this->params = $params;
    }

    public function endpoint_exists()
    {
        // verifica se o método existe
        return method_exists($this, $this->endpoint);
    }

    public function status()
    {
        return [
            'status' => 'SUCCESS',
            'message' => 'API running OK.'
        ];
    }
}
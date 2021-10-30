<?php

class api_class
{
    private $data;
    private $available_methods = ['GET', 'POST'];

    // ===============================================================
    public function __construct()
    {
        $this->data = [];
    }

    // ===============================================================
    public function check_method($method)
    {
        // check if method is valid
        return in_array($method, $this->available_methods);
    }

    // ===============================================================
    public function set_method($method)
    {
        // sets the response method
        $this->data['method'] = $method;
    }

    // ===============================================================
    public function get_method()
    {
        // returns the request method
        return $this->data['method'];
    }

    // ===============================================================
    public function set_endpoint($endpoint)
    {
        // sets the request endpoint
        $this->data['endpoint'] = $endpoint;
    }

    // ===============================================================
    public function get_endpoint()
    {
        // returns the current request endpoint
        return $this->data['endpoint'];
    }

    // ===============================================================
    public function add_to_data($key, $value)
    {
        // add new key to data
        $this->data[$key] = $value;
    }









    // ===============================================================
    public function api_request_error($message = '')
    {
        // output an api error message
        $this->data['status'] = 'ERROR';
        $this->data['error_message'] = $message;
        $this->send_response();
    }

    // ===============================================================
    public function send_response()
    {
        // output final response
        header("Content-Type:application/json");
        echo json_encode($this->data);
        die(1);
    }
}

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
    public function error_response($message)
    {
        // returns an error from the API
        return [
            'status' => 'ERROR',
            'message' => $message,
            'results' => []
        ];
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
    // CLIENTES
    // --------------------------------------------------
    public function get_all_clients()
    {
        // returns all clients from our database
        $db = new database();
        $results = $db->EXE_QUERY("SELECT * FROM clientes");

        return [
            'status' => 'SUCCESS',
            'message' => '',
            'results' => $results
        ];
    }

    // --------------------------------------------------
    public function get_all_active_clients()
    {
        // returns all active clients from our database
        $db = new database();
        $results = $db->EXE_QUERY("SELECT * FROM clientes WHERE deleted_at IS NULL");

        return [
            'status' => 'SUCCESS',
            'message' => '',
            'results' => $results
        ];
    }

    // --------------------------------------------------
    public function get_all_inactive_clients()
    {
        // returns all inactive clients from our database
        $db = new database();
        $results = $db->EXE_QUERY("SELECT * FROM clientes WHERE deleted_at IS NOT NULL");

        return [
            'status' => 'SUCCESS',
            'message' => '',
            'results' => $results
        ];
    }

    // --------------------------------------------------
    public function get_client()
    {
        // returns of all data from a certain client
        $sql = "SELECT * FROM clientes WHERE 1 ";

        // check if id exists
        if(key_exists('id', $this->params)){

            if(filter_var($this->params['id'], FILTER_VALIDATE_INT)){
                $sql .= "AND id_cliente = " . intval($this->params['id']);
            }
        } else {
            return $this->error_response('ID client not specified.');
        }

        $db = new database();
        $results = $db->EXE_QUERY($sql);

        return [
            'status' => 'SUCCESS',
            'message' => '',
            'results' => $results
        ];
    }

    // --------------------------------------------------
    public function create_new_client() {

        // check if all data is available
        if(
            !isset($this->params['nome']) || 
            !isset($this->params['email']) ||
            !isset($this->params['telefone'])
        ) {
            return $this->error_response('Insufficient client data.');
        }

        // check if there is already another cliente with the same: name or email
        $db = new database();
        $params = [
            ':nome' => $this->params['nome'],
            ':email' => $this->params['email']
        ];        
        $results = $db->EXE_QUERY("
            SELECT id_cliente FROM clientes
            WHERE nome = :nome OR email = :email
        ", $params);
        if(count($results) != 0){
            return $this->error_response('There is already another client with the same name or email.');
        }
        
        // add new client to the database
        $params = [
            ':nome' => $this->params['nome'],
            ':email' => $this->params['email'],
            ':telefone' => $this->params['telefone'],
        ];        

        $db->EXE_QUERY("
            INSERT INTO clientes VALUES(
                0,
                :nome,
                :email,
                :telefone,
                NOW(),
                NOW(),
                NULL
            )
        ", $params);

        return [
            'status' => 'SUCCESS',
            'message' => 'New client added with success.',
            'results' => []
        ];
    }













    // --------------------------------------------------
    // PRODUTOS
    // --------------------------------------------------
    public function get_all_products()
    {
        // returns all products in the database

        $db = new database();
        $results = $db->EXE_QUERY("SELECT * FROM produtos");

        return [
            'status' => 'SUCCESS',
            'message' => '',
            'results' => $results
        ];
    }

    // --------------------------------------------------
    public function get_all_active_products()
    {
        // returns all active products in the database

        $db = new database();
        $results = $db->EXE_QUERY("SELECT * FROM produtos WHERE deleted_at IS NULL");

        return [
            'status' => 'SUCCESS',
            'message' => '',
            'results' => $results
        ];
    }

    // --------------------------------------------------
    public function get_all_inactive_products()
    {
        // returns all inactive products in the database

        $db = new database();
        $results = $db->EXE_QUERY("SELECT * FROM produtos WHERE deleted_at IS NOT NULL");

        return [
            'status' => 'SUCCESS',
            'message' => '',
            'results' => $results
        ];
    }

    // --------------------------------------------------
    public function get_all_products_without_stock()
    {
        // returns all products with stock <= 0 in the database

        $db = new database();
        $results = $db->EXE_QUERY("SELECT id_produto, produto FROM produtos WHERE quantidade <= 0 AND deleted_at IS NULL");

        return [
            'status' => 'SUCCESS',
            'message' => '',
            'results' => $results
        ];
    }

    // --------------------------------------------------
    public function create_new_product() {

        // check if all data is available
        if(
            !isset($this->params['produto']) || 
            !isset($this->params['quantidade'])
        ) {
            return $this->error_response('Insufficient product data.');
        }

        // check if there is already another product with the same
        $db = new database();
        $params = [
            ':produto' => $this->params['produto'],
        ];        
        $results = $db->EXE_QUERY("
            SELECT id_produto FROM produtos
            WHERE produto = :produto
        ", $params);
        if(count($results) != 0){
            return $this->error_response('There is already another product with the same name.');
        }
        
        // add new product to the database
        $params = [
            ':produto' => $this->params['produto'],
            ':quantidade' => $this->params['quantidade']
        ];        

        $db->EXE_QUERY("
            INSERT INTO produtos VALUES(
                0,
                :produto,
                :quantidade,
                NOW(),
                NOW(),
                NULL
            )
        ", $params);

        return [
            'status' => 'SUCCESS',
            'message' => 'New product added with success.',
            'results' => []
        ];
    }
}
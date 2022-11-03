<?php


// Use to fetch product data
class Productpage
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }



    // fetch product data using getData Method
    public function getProduct($table = 'product'){
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

        $recordPerPage = 16;

        $pages = ($currentPage - 1) * $recordPerPage;

        $result = $this->db->con->query("SELECT * FROM {$table} LIMIT $recordPerPage OFFSET $pages");

        $resultArray = array();

        // fetch product data one by one
        while ($items = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $items;
        }

        return $resultArray;   
    }

    
    // get product using item id
    public function getProducts($item_id = null, $table= 'product'){
        if (isset($item_id)){
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE item_id={$item_id}");

            $resultArray = array();

            // fetch product data one by one
            while ($items = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $items;
            }

            return $resultArray;
        }
    }

}






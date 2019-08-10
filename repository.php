<?php

class Repository
{
  const DB_USER = "root";
  const DB_PASSWORD = "";
  const DB_DATABASE = "tokodelia";
  const DB_HOST = "localhost";
  const ITEM_PER_PAGE = 10;

  private $error_message = null;

  private $databaseConnection = null;

  private static $instance = null;

  private function __construct()
  {
      @$this->databaseConnection = new mysqli(self::DB_HOST, 
        self::DB_USER, 
        self::DB_PASSWORD, 
        self::DB_DATABASE);
  }

  public static function getInstance()
  {
    if (self::$instance === null)
    {
      self::$instance = new Repository();
    }

    return self::$instance;
  }

  private function isDatabaseError()
  {
    if ($this->databaseConnection->connect_error)
    {
      $this->error_message = $this->databaseConnection->connect_error;
      return true;
    }

    return false;
  }
  
  public function getProductPerPage($page = 1)
  {
    if ($this->isDatabaseError())
      return $this->error_message;

    if ($page < 1)
      $page = 1;

    $startIndex = ($page - 1) * self::ITEM_PER_PAGE;
    $query = "SELECT * FROM `product` LIMIT $startIndex," . self::ITEM_PER_PAGE;
    $result = self::$instance->databaseConnection->query($query);
    return json_encode($this->encodeDataToJSON($result));
  }

  private function encodeDataToJSON($mysqliResult)
  {
    $items = [];

    while ($item = $mysqliResult->fetch_assoc())
    {
      $item['price'] = 'Rp.' . $item['price'];
      array_push($items, $item);
    }

    return $items;
  }
}
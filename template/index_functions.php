<?php

class usrData
{

  public $conn;
  private $db;
  public function __construct()
  {
      require 'login/dbconf.php';
      $this->host = $host; // Host name
      $this->username = $username; // Mysql username
      $this->password = $password; // Mysql password
      $this->db_name = $db_name; // Database name
      $this->tbl_prefix = $tbl_prefix; // Prefix for all database tables
      $this->tbl_members = $tbl_members;
      $this->tbl_attempts = $tbl_attempts;

      try {
          // Connect to server and select database.
          $this->conn = new PDO('mysql:host=' . $host . ';dbname=' . $db_name . ';charset=utf8', $username, $password);
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (\Exception $e) {
          die('Database connection error');
      }
  }

  public function getID($query)
  {
    // query ophalen
    $result = $this->conn->query($query);


    if ($result == false) {
      return false;
    }

    $rows = array();

    // fetch rows
    while ($row = $result->fetch(PDO::FETCH_ASSOC))  {
      $rows[] = $row;
    }

    return $rows;
  }

  public function escape_string($value)
  {
      return $this->conn->quote($value);
  }

  public function opgelost($id, $table)
  {
    $query = "DELETE FROM $table WHERE id = $id";

    $result = $this->conn->query($query);

    if ($result == false) {
      echo 'Error: kan id ' . $id . ' niet verwijderen van ' . $table;
      return false;
    } else {
      return true;
    }
  }

  public function displayStatus($query)
  {
    $result = $this->conn->query($query);

    if ($result == false) {
      return false;
    }

    $rows = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC))  {
      $rows[] = $row;
    }

    return $rows;
  }

  public function updateStatus($id, $status)
  {
    $q = $this->conn->prepare("UPDATE members SET fk_stat_id = :fk_stat_id WHERE id = :id");
    $q->bindParam(':id', $id);
    $q->bindParam(':fk_stat_id', $status);
    $q->execute();
  }

}

<?php
class Admin
{
    public $conn;
    private $db;
    public function __construct()
    {
        require 'admn_inc/admin_conf.php';
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

    // Maakt een klus aan
    public function createJob($title, $mechanic, $type, $problem, $date, $time, $address, $city, $zip, $customerphone, $customername)
    {
        // prepare sql en bind params + insert
        $q = $this->conn->prepare("INSERT INTO jobs(title, fk_mech_id, fk_type_id, problem, date, time, address, fk_city_id, zip, customerphone, customername) VALUES('$title', '$mechanic', '$type', '$problem', '$date', '$time', '$address', '$city', '$zip', '$customerphone', '$customername')");
        $q->bindParam(1, $title);
        $q->bindParam(2, $mechanic);
        $q->bindParam(3, $type);
        $q->bindParam(4, $problem);
        $q->bindParam(5, $date);
        $q->bindParam(6, $time);
        $q->bindParam(7, $address);
        $q->bindParam(8, $city);
        $q->bindParam(9, $zip);
        $q->bindParam(10, $customerphone);
        $q->bindParam(11, $customername);
        $q->execute();
    }

    // update job
    public function updateJob($id, $title, $mechanic, $type, $problem, $date, $time, $address, $city, $zip, $customerphone, $customername) // $id, $title, $mechanic, $type, $problem, $date, $time, $address, $city, $zip, $customerphone, $customername
    {
          $q = $this->conn->prepare("UPDATE jobs SET title = :title, fk_mech_id = :fk_mech_id, fk_type_id = :fk_type_id, problem = :problem, date = :date, time = :time, address = :address, fk_city_id = :fk_city_id, zip = :zip, customerphone = :customerphone, customername = :customername WHERE id = :id")    ;
          $q->bindParam(':id', $id);
          $q->bindParam(':title', $title);
          $q->bindParam(':fk_mech_id', $mechanic);
          $q->bindParam(':fk_type_id', $type);
          $q->bindParam(':problem', $problem);
          $q->bindParam(':date', $date);
          $q->bindParam(':time', $time);
          $q->bindParam(':address', $address);
          $q->bindParam(':fk_city_id', $city);
          $q->bindParam(':zip', $zip);
          $q->bindParam(':customerphone', $customerphone);
          $q->bindParam(':customername', $customername);
          $q->execute();

    }

    // weergave klussen, de volgende functies werken allemaal hetzelfde
    public function displayJobs($query)
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

    // weergave specialiteit
    public function displaySpecialty($query)
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

    // weergave steden
    public function displayCities($query)
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

    // weergave monteurs
    public function displayMechanics($query)
    {
        // query
        $result = $this->conn->query($query);

        if($result == false)
        {
          return false;
        }

        $rows = array();

        // fetch rows
        while($row = $result->fetch(PDO::FETCH_ASSOC))
        {
          $rows[] = $row;
        }

        return $rows;
    }

    // weergave types
    public function displayTypes($query)
    {
        // query
        $result = $this->conn->query($query);

        if($result == false)
        {
          return false;
        }

        $rows = array();

        // fetch rows
        while($row = $result->fetch(PDO::FETCH_ASSOC))
        {
          $rows[] = $row;
        }

        return $rows;
    }

    // verwijdert een klus
    public function deleteJob($id, $table)
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

    public function execute($query)
    {
      $result = $this->conn->query($query);

      if ($result == false) {
        echo 'Error: cannot execute the command';
        return false;
      } else {
        return true;
      }
    }

  } // end class

<?php
class NewUserForm extends DbConn
{
    public function createUser($usr, $email, $pw, $frstnm, $lstnm, $phn, $spclt)
    {
        try {

            $db = new DbConn;
            $tbl_members = $db->tbl_members;
            // prepare sql and bind parameters + insert
            $stmt = $db->conn->prepare("INSERT INTO ".$tbl_members." (username, password, email, firstname, lastname, phone, FK_spec_id)
            VALUES (:username, :password, :email, :firstname, :lastname, :phone, :FK_spec_id)");
            // $stmt->bindParam(':id', $uid);
            $stmt->bindParam(':username', $usr);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $pw);
            $stmt->bindParam(':firstname', $frstnm);
            $stmt->bindParam(':lastname', $lstnm);
            $stmt->bindParam(':phone', $phn);
            $stmt->bindParam(':FK_spec_id', $spclt);
            $stmt->execute();

            $err = '';

        } catch (PDOException $e) {

            $err = "Error: " . $e->getMessage();

        }
        //Determines returned value ('true' or error code)
        if ($err == '') {

            $success = 'true';

        } else {

            $success = $err;

        };

        return $success;

    }
} // end class

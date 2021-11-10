<?php
    class crud {
        //private databes object
        private $db;

        //constructor to initialize private variable to the database connection
        function __construct($conn){
            $this->db = $conn;
        }

        //function to insert a new record into the attendee database
        public function insertAttendees($fname, $lname, $dob, $email, $phone, $specialty){
            try {
                //define sql statement to be executed
                $sql = "INSERT INTO attendee (firstname, lastname, dateofbirth, emailaddress,phonenumber,specialty_id) VALUES(:fname, :lname, :dob, :email, :phone, :specialty)";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                //bind all placeholders to actual values
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':phone',$phone);
                $stmt->bindparam(':specialty',$specialty);
                //execute statement
                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }


        //function to update a record from the attendee database
        public function editAttendee($id, $fname, $lname, $dob, $email, $phone, $specialty){
            try {
                $sql = "UPDATE `attendee` SET `firstname`=:fname, `lastname`=:lname, `dateofbirth`=:dob, `emailaddress`=:email, `phonenumber`=:phone, `specialty_id`=:specialty WHERE attendee_id = :id";
                $stmt = $this->db->prepare($sql);

                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':phone',$phone);
                $stmt->bindparam(':specialty',$specialty);
                //execute statement
                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        //function to get all record from the attendee database table
        public function getAttendees(){
            try {
                $sql = "SELECT * FROM `attendee` a INNER JOIN specialties s ON a.specialty_id = s.specialty_id";
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

        }

        //function to get a record from the attendee database table
        public function getAttendeeDetails($id){
            try {
                $sql = "SELECT * FROM `attendee` a INNER JOIN specialties s ON a.specialty_id = s.specialty_id WHERE attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

        }

        public function DeleteAttendee($id){
            try {
                $sql = "DELETE FROM `attendee` WHERE attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

        }

        public function getSpecialties(){
            $sql = "SELECT * FROM `specialties`";
            $result = $this->db->query($sql);
            return $result;
        }

        //function to get a record from the attendee database table
        public function getSpecialtyById($id){
            try {
                $sql = "SELECT * FROM `specialties` WHERE specialty_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

        }

    }
?>
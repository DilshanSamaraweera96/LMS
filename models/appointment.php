<?php
class Appointment
{
    // DB Stuff
    private $conn;
    private $table = 'appointments';

    // Properties
    public $appointment_id;
    public $patient_name;
    public $age;
    public $phone_no;
    public $appointment_date;
    public $token_no;
    public $doctor_id;
    public $expiry_date;
    public $patient_id;

    // Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Get appointments
    public function read()
    {
        // Create query
        $query = 'SELECT
        *
      FROM
        ' . $this->table . '
      ORDER BY
      appointment_date DESC';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    // Get Single appointment
    public function read_single()
    {
        // Create query
        $query = 'SELECT * FROM
                 ' . $this->table . '
                 WHERE appointment_id = ?';

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->appointment_id);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set properties
        $this->appointment_id = $row['appointment_id'];
        $this->patient_name = $row['patient_name'];
        $this->age = $row['age'];
        $this->phone_no = $row['phone_no'];
        $this->appointment_date = $row['appointment_date'];
        $this->token_no = $row['token_no'];
        $this->doctor_id = $row['doctor_id'];
        $this->expiry_date = $row['expiry_date'];
        $this->patient_id = $row['patient_id'];
    }

    // Get Single appointment
    public function read_single_by_patient()
    {
        // Create query
        $query = 'SELECT * FROM
                 ' . $this->table . '
                 WHERE (appointment_date = CURDATE() OR appointment_date > CURDATE()) AND expiry_date IS NULL AND patient_id = ?';

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->patient_id);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set properties
        $this->appointment_id = $row['appointment_id'];
        $this->patient_name = $row['patient_name'];
        $this->age = $row['age'];
        $this->phone_no = $row['phone_no'];
        $this->appointment_date = $row['appointment_date'];
        $this->token_no = $row['token_no'];
        $this->doctor_id = $row['doctor_id'];
        $this->expiry_date = $row['expiry_date'];
    }

    // Create appointment
    public function create()
    {
        // Create Query
        $query = 'INSERT INTO ' .
            $this->table . '
                  SET
                  patient_name = :patient_name,
                  age = :age,
                  phone_no = :phone_no,
                  appointment_date = :appointment_date,
                  doctor_id = :doctor_id,
                  patient_id = :patient_id';

        // Prepare Statement
        $stmt = $this->conn->prepare($query);

        $this->patient_name = htmlspecialchars(strip_tags($this->patient_name));

        // Bind data
        $stmt->bindParam(':patient_name', $this->patient_name);
        $stmt->bindParam(':age', $this->age);
        $stmt->bindParam(':phone_no', $this->phone_no);
        $stmt->bindParam(':appointment_date', $this->appointment_date);
        $stmt->bindParam(':doctor_id', $this->doctor_id);
        $stmt->bindParam(':patient_id', $this->patient_id);

        if ($stmt->execute()) {
            // get current token
            $query = 'SELECT COUNT(1) AS current_token FROM
                 ' . $this->table . '
                 WHERE appointment_date = :appointment_date AND doctor_id = :doctor_id';

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':appointment_date', $this->appointment_date);
            $stmt->bindParam(':doctor_id', $this->doctor_id);

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // issue token for appointment
            $this->token_no = $row['current_token'];

            $query = 'UPDATE ' .
                $this->table . '
                SET
                token_no = :token_no
                WHERE appointment_id = LAST_INSERT_ID()';

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':token_no', $this->token_no);
            $stmt->execute();

            return $this->token_no;
        }

        // Print error if something goes wrong
        printf("Error: $s.\n", $stmt->error);

        return $this->token_no;
    }

    // Update appointment
    public function update()
    {
        // Create Query
        $query = 'UPDATE ' .
            $this->table . '
        SET
        patient_name = :patient_name,
        age = :age,
        phone_no = :phone_no,
        appointment_date = :appointment_date,
        token_no = :token_no,
        doctor_id = :doctor_id 
        WHERE appointment_id = :appointment_id';


        // Prepare Statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->patient_name = htmlspecialchars(strip_tags($this->patient_name));
        $this->appointment_id = htmlspecialchars(strip_tags($this->appointment_id));

        // Bind data
        $stmt->bindParam(':appointment_id', $this->appointment_id);
        $stmt->bindParam(':patient_name', $this->patient_name);
        $stmt->bindParam(':age', $this->age);
        $stmt->bindParam(':phone_no', $this->phone_no);
        $stmt->bindParam(':appointment_date', $this->appointment_date);
        $stmt->bindParam(':token_no', $this->token_no);
        $stmt->bindParam(':doctor_id', $this->doctor_id);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: $s.\n", $stmt->error);

        return false;
    }

    // Delete appointment
    public function delete()
    {
        // Create query
        $query = 'DELETE FROM ' . $this->table . ' WHERE appointment_id = :appointment_id';

        // Prepare Statement
        $stmt = $this->conn->prepare($query);

        // clean data
        $this->appointment_id = htmlspecialchars(strip_tags($this->appointment_id));

        // Bind Data
        $stmt->bindParam(':appointment_id', $this->appointment_id);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: $s.\n", $stmt->error);

        return false;
    }

    public function cancel_appointment()
    {
        // Create query
        $query = 'UPDATE ' .
            $this->table . '
        SET expiry_date = current_date()
        WHERE appointment_id = :appointment_id';

        // Prepare Statement
        $stmt = $this->conn->prepare($query);

        // Bind Data
        $stmt->bindParam(':appointment_id', $this->appointment_id);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: $s.\n", $stmt->error);

        return false;
    }
}

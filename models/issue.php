<?php
class Issue
{
    // DB Stuff
    private $conn;
    private $table = 'issuebook';

    // Properties
    public $issue_id;					
    public $member_id;
    public $book_id;
    public $issuedate;
    public $returndate;
    public $collect;

    // Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Get books
    public function read()
    {
        // Create query
        $query = 'SELECT
                  u.mem-id as member_id,
                  b.book_id as book_id,
                  i.book_id,
                  i.member_id,
                  i.issuedate,
                  i.returndate,
                  i.collect
                  
                  FROM
                  ' . $this->table . ' i
                  INNER JOIN
                  user_register	u ON u.mem-id = i.member_id
                  INNER JOIN
                  addbook b ON b.book_id = i.book_id ';
                  
                  

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    // Get Single book
    public function read_single()
    {
        // Create query
        $query = 'SELECT * FROM
                 ' . $this->table . '
                 WHERE row_id = ?';

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->row_id);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set properties
        $this->doctor_id = $row['doctor_id'];
        $this->doctor_name = $row['doctor_name'];
        $this->speciality = $row['speciality'];
        $this->available_days = $row['available_days'];
        $this->expiry_date = $row['expiry_date'];
        $this->expiry_date = $row['expiry_date'];
        $this->expiry_date = $row['expiry_date'];
    }

    // Create doctor
    public function create()
    {
        // Create Query
        $query = 'INSERT INTO ' .
                  $this->table . '
                  SET
                  doctor_name = :doctor_name,
                  speciality = :speciality,
                  available_days = :available_days';

        // Prepare Statement
        $stmt = $this->conn->prepare($query);

        $this->doctor_name = htmlspecialchars(strip_tags($this->doctor_name));


        // Bind data
        $stmt->bindParam(':doctor_name', $this->doctor_name);
        $stmt->bindParam(':speciality', $this->speciality);
        $stmt->bindParam(':available_days', $this->available_days);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: $s.\n", $stmt->error);

        return false;
    }

    // Update doctor
    public function update()
    {
        // Create Query
        $query = 'UPDATE ' .
        $this->table . '
        SET
        doctor_name = :doctor_name,
        speciality = :speciality,
        available_days = :available_days,
        WHERE doctor_id = :doctor_id';


        // Prepare Statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->doctor_name = htmlspecialchars(strip_tags($this->doctor_name));
        $this->doctor_id = htmlspecialchars(strip_tags($this->doctor_id));

        // Bind data
        $stmt->bindParam(':doctor_id', $this->doctor_id);
        $stmt->bindParam(':doctor_name', $this->doctor_name);
        $stmt->bindParam(':speciality', $this->speciality);
        $stmt->bindParam(':available_days', $this->available_days);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: $s.\n", $stmt->error);

        return false;
    }

    // Delete doctor
    public function delete()
    {
        // Create query
        $query = 'DELETE FROM ' . $this->table . ' WHERE doctor_id = :doctor_id';

        // Prepare Statement
        $stmt = $this->conn->prepare($query);

        // clean data
        $this->doctor_id = htmlspecialchars(strip_tags($this->doctor_id));

        // Bind Data
        $stmt->bindParam(':doctor_id', $this->doctor_id);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: $s.\n", $stmt->error);

        return false;
    }

    public function cancel_doctor()
    {
        // Create query
        $query = 'UPDATE ' .
        $this->table . '
        SET expiry_date = current_date()
        WHERE doctor_id = :doctor_id';

        // Prepare Statement
        $stmt = $this->conn->prepare($query);

        // clean data
        $this->doctor_id = htmlspecialchars(strip_tags($this->doctor_id));

        // Bind Data
        $stmt->bindParam(':doctor_id', $this->doctor_id);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: $s.\n", $stmt->error);

        return false;
    }
}

<?php


// In this example, Customer extends the ActiveRecord class, which contains the logic to execute database queries. The Customer class defines the table property and provides methods to find a customer by ID or email, to retrieve all customers, and to save the customer. The save method updates the existing customer if the ID is set, and inserts a new customer otherwise. The executeQuery method in the ActiveRecord class takes care of executing the query and returning the result.

class Customer extends ActiveRecord {

    protected static $table = 'customers';
    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $phone_number;

    public static function find($id) {
        $query = "SELECT * FROM " . static::$table . " WHERE id = '$id'";
        $result = static::executeQuery($query);
        return new static($result[0]);
    }

    public static function findByEmail($email) {
        $query = "SELECT * FROM " . static::$table . " WHERE email = '$email'";
        $result = static::executeQuery($query);
        return new static($result[0]);
    }

    public static function all() {
        $query = "SELECT * FROM " . static::$table;
        $result = static::executeQuery($query);
        $customers = [];
        foreach ($result as $customer) {
            $customers[] = new static($customer);
        }
        return $customers;
    }

    public function save() {
        if ($this->id) {
            $query = "UPDATE " . static::$table . " SET first_name='$this->first_name', last_name='$this->last_name', email='$this->email', phone_number='$this->phone_number' WHERE id=$this->id";
        } else {
            $query = "INSERT INTO " . static::$table . " (first_name, last_name, email, phone_number) VALUES ('$this->first_name', '$this->last_name', '$this->email', '$this->phone_number')";
        }
        static::executeQuery($query);
    }
}

class ActiveRecord {
    protected static function executeQuery($query) {
        $db = new PDO("mysql:host=localhost;dbname=test_db", "root", "");
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

$customer = Customer::find(1);
$customer->first_name = "Jane";
$customer->last_name = "Doe";
$customer->email = "jane.doe@example.com";
$customer->phone_number = "555-555-5555";
$customer->save();

$customers = Customer::all();

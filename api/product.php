<?php
class Product{
 
    // database connection and table name
    private $conn;
    private $table_name = "todotable1";
 
    // object properties
    public $lists;
    public $todoDate;
    public $time;
    public $uploadedBy;
    public $status;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

// *************************************************************read products ********************************
function read(){

    // select all query
    $query = "SELECT * FROM $this->table_name";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}

//***********************************************TODAY LIST *******************************
public function todaylist()
{
	$date = date('Y-m-d');

	$query ="SELECT * FROM `todotable` WHERE uploadedBy=:email AND todoDate='$date' ORDER by time DESC";
	$stmt = $this->conn->prepare($query);

	$this->uploadedBy=htmlspecialchars(strip_tags($this->uploadedBy));
	$stmt->bindParam(":email", $this->uploadedBy);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}

// ************************************************create product ***********************************
function create(){
 
    // query to insert record
 $query = "INSERT INTO " . $this->table_name . " SET worklist=:lists,todoDate=:todoDate,uploadedBy=:uploadedBy,time=:time,status=:status";
	
	$stmt = $this->conn->prepare($query);

    // sanitize
    $this->lists=htmlspecialchars(strip_tags($this->lists));
    $this->todoDate=htmlspecialchars(strip_tags($this->todoDate));
    $this->time=htmlspecialchars(strip_tags($this->time));
    $this->uploadedBy=htmlspecialchars(strip_tags($this->uploadedBy));
    $this->status=htmlspecialchars(strip_tags($this->status));

    // bind values
    $stmt->bindParam(':lists', $this->lists);
    $stmt->bindParam(':todoDate', $this->todoDate);
    $stmt->bindParam(':uploadedBy', $this->uploadedBy);
    $stmt->bindParam(':time', $this->time);
    $stmt->bindParam(':status', $this->status);

    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
 
}

// ********************************************************************delete the product
function delete1(){
 
    // delete query
    $query = "DELETE FROM".$this->table_name." WHERE time='04:08:12'";
 
    // prepare query
   $stmt = $this->conn->prepare($query);
     // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
}


// ********************************************************************delete the product
function delete(){
 
    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE time = ?";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->time=htmlspecialchars(strip_tags($this->time));
 
    // bind id of record to delete
    $stmt->bindParam(1, $this->time);
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}

// ***************************************************used when filling up the update product form
function readOne(){
 
    // query to read single record
    $query = "SELECT
                c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            WHERE
                p.id = ?
            LIMIT
                0,1";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind id of product to be updated
    $stmt->bindParam(1, $this->id);
 
    // execute query
    $stmt->execute();
 
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // set values to object properties
    $this->name = $row['name'];
    $this->price = $row['price'];
    $this->description = $row['description'];
    $this->category_id = $row['category_id'];
    $this->category_name = $row['category_name'];
}

// ****************************************************************update the product
function update(){
 
    // update query
    $query = "UPDATE
                " . $this->table_name . "
            SET
                name = :name,
                price = :price,
                description = :description,
                category_id = :category_id
            WHERE
                id = :id";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->price=htmlspecialchars(strip_tags($this->price));
    $this->description=htmlspecialchars(strip_tags($this->description));
    $this->category_id=htmlspecialchars(strip_tags($this->category_id));
    $this->id=htmlspecialchars(strip_tags($this->id));
 
    // bind new values
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':price', $this->price);
    $stmt->bindParam(':description', $this->description);
    $stmt->bindParam(':category_id', $this->category_id);
    $stmt->bindParam(':id', $this->id);
 
    // execute the query
    if($stmt->execute()){
        return true;
    }
 
    return false;
}


//******************************************************************* used for paging products
public function count(){
    $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    return $row['total_rows'];
}

}

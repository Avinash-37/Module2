<?php
class User_auth{
 
    // database connection and table name
    private $conn;
    private $table_login = "user_lgin";
 
    // object properties
    public $id;
    public $name;
    public $email;
    public $mobile;
    public $company;
    public $password;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
public function auth(){
	  
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->password=htmlspecialchars(strip_tags($this->password));
	//echo $this->email;
	//echo $this->password;
	$query = "SELECT * FROM $this->table_login WHERE email =$$this->email AND password =$this->password";
	    // prepare query
	    $stmt = $this->conn->prepare($query);

    // bind id of record to 
   // $stmt->bindParam(":email", $this->email);
    //$stmt->bindParam(":password", $this->password);
 	$result=$stmt->execute();
    // execute query
    if($result->num_rows > 0){
        return true;
    }
 
    return false;

}
public function registration()
{

	$query="INSERT INTO ". $this->table_login ." SET id=NULL,name=:name,email=:email,mobile=:mobile,company=:company,password=:password";
/*$query="INSERT INTO `user_lgin` (`id`, `name`, `email`, `mobile`, `company`, `password`) VALUES (NULL, 'sachin', 'sachin@gmail.com', '986574856', 'human cloud', '123')";
*/
	$stmt = $this->conn->prepare($query);
	 
	    // sanitize
		//$this->id=htmlspecialchars(strip_tags($this->id));
		$this->name=htmlspecialchars(strip_tags($this->name));
		$this->email=htmlspecialchars(strip_tags($this->email));
	    	$this->mobile=htmlspecialchars(strip_tags($this->mobile));
		$this->company=htmlspecialchars(strip_tags($this->company));
	    	$this->password=htmlspecialchars(strip_tags($this->password));
		echo $this->password;		
		echo $this->id;
		echo $this->name;
		echo $this->email;
		echo $this->mobile;		
		echo $this->company;
		
	    // bind id of record to add user
	    	//$stmt->bindParam(':id', $this->id);
		$stmt->bindParam(':name', $this->name);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':mobile', $this->mobile);
		$stmt->bindParam(':company', $this->company);
	    	$stmt->bindParam(':password', $this->password);
		
			if($stmt->execute())
			{
				return true;
			}
			else{
				return false;
			}
	
}

public function userNew(){
	  
    $query = "SELECT * FROM $this->table_login WHERE email =:email AND company =:company";
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->company=htmlspecialchars(strip_tags($this->company));
	//echo $this->email;echo $this->password;
    // bind emai and company of record to check new record 
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":company", $this->company);
 	
	$result=$stmt->execute();
	
    // execute query
    if($result->num_rows > 0){
        return true;
    }
 
    return false;

}

}

?>

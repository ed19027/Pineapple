<?php
class db
{
    private $conn="";
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database="pineapple";
    private $port="3308";

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database, $this->port);
    }
    public function getRecords($string, $domain, $sort) 
    {
        $sql = "SELECT * FROM emails";
        if(isset($string)){
            $sql .= " WHERE email LIKE '%".$string."%'";   
        }
        if(isset($domain)){
            $sql .= " WHERE domain='".$domain."'";
        }
        if(isset($sort)){
			if($sort == 'email')
            	$sql .= " ORDER BY email ASC";
			else $sql .= " ORDER BY created_at DESC";
        }
        else $sql .= " ORDER BY created_at DESC";

        return $this->conn->query($sql);
    }
    
    public function getDomains() 
    {
        $sql = "SELECT DISTINCT domain FROM emails";
        
        return $this->conn->query($sql);
    }
	public function store($email) 
    {
		$timestamp = date("Y-m-d H:i:s");
        
        $pattern = '/(\S+)@(\S+)\.(\S+)/';
        $replacement = '${2}';
        $domain =  preg_replace($pattern, $replacement, $email);
		
		$sql = "INSERT INTO emails (email, domain, created_at) VALUES ('".$email."', '".$domain."', '".$timestamp."');";
		
        $this->conn->query($sql);
    }
    public function delete($id) 
    {
        $sql = "DELETE FROM emails WHERE id=".$id;
        $this->conn->query($sql);
    }
}
?>
   

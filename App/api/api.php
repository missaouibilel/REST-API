<?php
//namespace App\database;
class API{
    protected $host="localhost";
    protected $db_name="employees";
    protected $db_user="root";
    protected $db_password="";
    protected $connect;

    public function __construct()
    {
        try{
             $this->connect=new \PDO("mysql:host=$this->host;dbname=$this->db_name",$this->db_user,$this->db_password);
             
        }catch(\PDOException $e){
            echo $e->getMessage();       
         }
       
    }

    //fetch all users
    public function fetch_all()
    {
        $query="SELECT * FROM usres ORDER BY id";
        $statement = $this->connect->prepare($query);
        if($statement->execute())
        {
            while($row = $statement->fetch(PDO::FETCH_ASSOC))
            {
                 $data[] = $row;
            }
            return $data;
        }
       
    }
    

    public function insert()
    {
        if(isset($_POST['name']))
        {
            $form_data = array(
                ':name' => $_POST['name'],
                ':email' => $_POST['email'],
                ':poste' => $_POST['email']
            );
            $query = 'INSERT INTO usres (name,email,poste) VALUE (:name,:email,:poste)';
            $statement = $this->connect->prepare($query);
            if($statement->execute($form_data))
            {
                $data[] = array(
                    'success' => '1'
                );
            }else
            {
                $data[] = array(
                    'success' => '0'
                );
            }
        }else
        {
            $data[] = array(
                'success' => '0'
            );
        }
        return $data;
    }
}
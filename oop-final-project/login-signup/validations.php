<?php
include('db/db.php');
$obj = new dbconfig();
$con = $obj->db_connect();


class UserValidator extends dbconfig{
    use database;
     private $data;
     private $errors =[];
     private static $fields = ['email', 'password', 'username'];
     
     public function __construct($post_data){
      $this->data = $post_data;      

     }
//Validation forms
    public function validateForm($connection){
      
if(isset($this->data['username'])){
      $name =$connection-> real_escape_string($this->data['username']);
      $email = $connection->real_escape_string($this->data['email']);
      $password = $connection->real_escape_string($this->data['password']);
      $userName = $this->validateUsername();
      $userPassword = $this->validatePassword();
      $userEmail = $this->validateEmail();

   
      if($userName && $userPassword && $userEmail){
      $result = $this->registration($name,$email,$password, $connection);
      if($result){
      // echo 'result ayaaa--->' . $result;

      // echo 'username****' . $userName .'<br/>';
      // echo 'userpass****' . $userPassword .'<br/>';
      // echo 'useremail****' . $userEmail .'<br/>';
   
      echo "<script>window.location.href='../index.php'</script>";
      }
   
      }
    }else {
      $email = $connection->real_escape_string($this->data['email']);
      $password = $connection->real_escape_string($this->data['password']);
      //Passing in a function to check validations
      $userPassword = $this->validatePassword();
      $userEmail = $this->validateEmail();
      //Sigin querry
      if($userPassword && $userEmail){
      $result = $this->signin($email, $password, $connection);
      // echo 'userpass****' . $userPassword .'<br/>';
      // echo 'useremail****' . $userEmail .'<br/>';
      
      //Check if the user exist or not?
      if( mysqli_num_rows($result)>=1){
      echo "<script>window.location.href='eCommerce-PHP-OOP/index.php'</script>";
      }else if(mysqli_num_rows($result)==0){
      // echo 'result ayaaa--->' . mysqli_num_rows($result) . '<br/>';
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Sorry!", "Wrong credientials", "error");';
        echo '}, 500);</script>';
      }
      }
    }
return $this->errors;
}
//validate username
private function validateUsername(){ 
  $val = trim($this->data['username']);
    if(empty($val)){
       $this->addError('username', 'username cannot be empty');
  } else{
       if(!preg_match('/^[a-zA-Z]{4,9}\d*$/i', $val)){
       $this->addError('username','username must be 4-9 chars & alphanumeric');
    }else{
      // $_SESSION['username'] = $val;
   return true;
  } 
}
 
}
//validate password
private function validatePassword(){
  $val = trim($this->data['password']);
   if(empty($val)){
    $this->addError('password', 'password cannot be empty');
} else{
     if(strlen($val) <= 5){
      $this->addError('password','password must be 5 character long');    
     }else{
     return true;
    }
 }
}
//validate email
private function validateEmail(){
  $val = trim($this->data['email']);

  if(empty($val)){
  $this->addError('email', 'email cannot be empty');
} else{
   if(!filter_var($val, FILTER_VALIDATE_EMAIL)){
  $this->addError('email','email must be a valid email');
}else{
  // $_SESSION['useremail'] = $val;
     return true;
    }
  }
}
 

// Function for registration
public function registration($uemail,$uname,$pasword, $connection)

	{
	$ret=mysqli_query($connection,"insert into usertable(UserEmail,UserName,userPassword) values('$uname','$uemail','$pasword')");
	return $ret;
	}

// Function for signin
public function signin($uemail,$pasword, $connection)
	{
	$result=mysqli_query($connection,"select id from usertable where UserEmail='$uemail' and userPassword='$pasword'");
  // $row= mysqli_fetch_assoc($result);
  // $userId = $row['ID'];
  // echo $userId.'id agaiii?';
  return $result;
  }
  
// Error Function
private function addError($key, $val){
    $this->errors[$key] = $val;
  }
}



?>
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
      // $un = ['username'];
      // $data = [$this->data, ...$un];
        

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
      // echo 'result ayaaa--->' . $result;
      if($result){
      // echo 'username****' . $userName .'<br/>';
      // echo 'userpass****' . $userPassword .'<br/>';
      // echo 'useremail****' . $userEmail .'<br/>';
      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("Congratulations!", "Successfully Login", "success");';
      echo '}, 500);</script>';
      // echo "<script>window.location.href='../index.php'</script>";
      }
   
      }
    }else {
    $email = $connection->real_escape_string($this->data['email']);
      $password = $connection->real_escape_string($this->data['password']);
      $userPassword = $this->validatePassword();
      $userEmail = $this->validateEmail();
      if($userPassword && $userEmail){
      $result = $this->signin($email, $password, $connection);
      // echo 'result ayaaa--->' . mysqli_num_rows($result) . '<br/>';
      if( mysqli_num_rows($result)>=1){
      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("Congratulations!", "Successfully Login", "success");';
      echo '}, 500);</script>';
      // echo 'userpass****' . $userPassword .'<br/>';
      // echo 'useremail****' . $userEmail .'<br/>';
      echo "<script>window.location.href='eCommerce-PHP-OOP/index.php'</script>";
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
       if(!preg_match('/^[a-zAZ0-9]{6,9}$/', $val)){
       $this->addError('username','username must be 6-9 chars & alphanumeric');
    }else{
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
	return $result;
  }
  
// Error Function
private function addError($key, $val){
    $this->errors[$key] = $val;
  }
}



?>
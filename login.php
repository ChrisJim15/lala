<?php
session_start();
include_once('config.php');

if(isset($_POST['submit']))
{
  $username=mysqli_real_escape_string($db,$_POST['username']);
  $password=mysqli_real_escape_string($db,$_POST['password']);

  $result=mysqli_query($db,"SELECT * FROM user WHERE username='$username' AND password='$password'");

  $rows=mysqli_num_rows($result);
  if($rows==1)
  {
    while($res=mysqli_fetch_array($result))
    {
      if($res['user_type']=='admin')
      {
        $_SESSION['id']=$res['id'];
        $_SESSION['fname']=$res['fname'];
        $_SESSION['lname']=$res['lname'];
        $_SESSION['username']=$res['username'];
        $_SESSION['password']=$res['password'];
        echo "<script>alert('Welcome {$_SESSION['fname']}!'); window.location.href='admin_index.php';</script>";
            exit();
      
      }
      else if($res['user_type']=='user')
      {
        $_SESSION['id']=$res['id'];
        $_SESSION['fname']=$res['fname'];
        $_SESSION['lname']=$res['lname'];
        $_SESSION['username']=$res['username'];
        $_SESSION['password']=$res['password'];
         echo "<script>alert('Welcome {$_SESSION['fname']}!'); window.location.href='user1.php';</script>";
            exit();
       
      }
    }
  }
  else
  {
    echo "<script>alert('Incorrect Username or Password')</script>";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    
</head>


<body>
<form action="login.php" method="POST">
   

    <h1 style="font-weight: bold; text-align: center; font-size: 80px" href="index.php">BOOKING</h1> 
                    
                <table class="table1">
                        
                            <tr>
                                
                                <td class="tab">Username: </td>
                            <td><input class="tab" type="text" name="username" required="required"></td>
                        
                            <tr>
                             <td class="tab">Password: </td>
                            <td><input class="tab" type="password" name="password" required="required"></td>
                        </tr>
                        <tr>
                            <td ><input class="lala" type="submit" name="submit" value="Login"></td><td>
                            <button class="lala"><a style="color: #000000;" href="register.php" >Sign-up</a></button></td>
                    
                        </tr>
                        
                    </table>
                  
</form>
</body>
</html>

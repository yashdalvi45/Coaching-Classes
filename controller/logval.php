<?php    
    include "config/conn.php";
    if(isset($_POST['submit']))
    	{
            if ($con)
            {
        		$EMAIL=$_POST['email'];
                $EMAIL = filter_var($EMAIL, FILTER_SANITIZE_EMAIL);
                $EMAIL  = mysqli_real_escape_string($con,$EMAIL);
        		$PSWD=$_POST['pswd'];
        		$Email="select * from classreg where Email='$EMAIL'";
        		$Query=mysqli_query($con,$Email);
                $SESS = "Select * from session where Email='$EMAIL'";
                $RES = mysqli_query($con, $SESS);
        		 if(empty($EMAIL)) 
        			{
        				$email_error='Enter Email';
        			}
        		elseif(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i",$_POST["email"]))
    				{
    				$email_error="Invalid Email Address";
    				}
                elseif(empty($PSWD))
                    {
                        $pswd_error="Enter password";
                    }		
        		elseif(mysqli_num_rows($Query)>0)
                    {
                        $Fetch=mysqli_fetch_array($Query);
                        $Pass=$Fetch['Pswd'];
                        if(password_verify($PSWD, $Pass))
                        {  
                            if (mysqli_num_rows($RES)>0) 
                            {   
                                session_start();
                                $_SESSION["Email"]=$EMAIL;
                                $ID=session_id();
                                $_SESSION['ID']=$ID;
                                $sql="UPDATE session SET SessionID='$ID' WHERE EMAIL='$EMAIL'";
                                mysqli_query($con, $sql); 
                                header("location:homepg.php");
                            } 
                            else
                            {
                                session_start();
                                $_SESSION["Email"]=$EMAIL;
                                $ID=session_id();
                                $_SESSION['ID']=$ID;
                                $sql  = "INSERT INTO session (Email,SessionID) VALUES('$EMAIL','$ID')";
                                mysqli_query($con, $sql);
                                header("location:homepg.php");
                            }
                        }   
                        else
                        {
                           $pswd_error="Incorrect Password";
                        }
                    }   
                else
                    {   
                        $email_error="Wrong Email Address";
                    }    
            }
    
    else
    {
        echo "<script type='text/javascript'>
                   $(document).ready(function(){
                   $('#Modal1').modal('show');
                   });
                   setTimeout(function() 
                   {
                  $('#Modal1').modal('hide');
                  window.location.replace('http://localhost/himclasses/index.php')
                  }, 6000);
                   </script>";
    }
}
    mysqli_close($con)  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
      rel="stylesheet"
    />
    <!-- MDB -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css"
      rel="stylesheet"
    />

</head>
<body >
    <div class="container mt-4">
        <div class="row col-md">
              <div class="col-3">
                <div class=" text-center">
                      <a href="login.php">
                         <button class="btn bg-primary text-white  mb-3" style="width:200px" >Login</button>
                      </a>
                </div>
                <div class=" text-center">
                      <a href="register.php">
                         <button class="btn bg-success text-white mb-3" style="width:200px" >Register</button>
                      </a>
                </div>
                <div class=" text-center">
                      <a href="logout.php">
                         <button class="btn bg-danger text-white mb-3" style="width:200px" >Logout</button>
                      </a>
                </div>

              </div>
              <div class="col-5">
                <div class="card">
                    <div class="card-body">
                     <h5>   Register</h5>
                    <form method = "POST">
                    <div class="mb-3">
                              <label for="Name">Name</label>
                               <input type="eamil" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                              <label for="Name">Email</label>
                               <input type="eamil" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                            <label for="">Password</label>
                             <input type="password" name="password" class="form-control">
                          </div>
                          <div class="mb-3">
                            <label for="">Confirm Password</label>
                             <input type="password" name="confirmPassword" class="form-control">
                          </div>
                          <button type="submit" name="registerBtn" class="btn btn-dark text-white float-end">Register</button>
                        </form>
                    </div>
                </div>

              </div>
        </div>
    </div>
<!--   
           require_once("db_connection.php");
             if(isset($_POST['addBtn'])){
                $taskName = $_POST['taskName'];

                // if($taskName == "" || $taskName == null){
                //     echo "<small style= 'color: red' >Message is required!</small>";
                // } else{
                    // $sql = $_POST['taskName'];
                    $sql = " INSERT INTO work(name) VALUES ('$taskName')";
                    if(mysqli_query($connection,$sql)){
                        // echo "<small style= 'color:green; font-weight:bold' >Insert Success!</small>";
                        header("location:read.php");
                    }else{
                        echo "Query fail...".mysqli_error();
                    }

                }
                -->
             


    <?php

       
  
        
        function checkStrongPassword($password){
         $upperStatus = false;
         $lowerStatus= false;
         $numberStatus = false;
         $specialStatus = false;
         if (preg_match('/[A-Z]/', $password)){
          $upperStatus = true;
         }
         if (preg_match('/[a-z]/', $password)){
          $lowerStatus = true;
         }
         if (preg_match('/[0-9]/', $password)){
          $numberStatus = true;
         }
         if (preg_match('/[!@#]/', $password)){
          $specialStatus = true;
         }
         if ($upperStatus && $lowerStatus && $numberStatus && $specialStatus){
          return true;
         } else{
         return false;
         }

        }

    require_once("db_connection.php");
        checkStrongPassword("Password200@");
        require_once("db_connection.php");
    if(isset($_POST['registerBtn'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashPassword = password_hash($password, PASSWORD_BCRYPT);
        $confirmPassword = $_POST['confirmPassword'];
      if ($name != " " && $email != " " && $password != "" && $confirmPassword != ""){
        if(strlen($password)>= 6 && strlen($confirmPassword)>= 6){
            if($password == $confirmPassword){
             $status = checkStrongPassword($password);
            if ($status){
            $sql ="INSERT INTO `users`( `name`, `email`, `password`) VALUES ('$name','$email','$hashPassword' )";
           if(mysqli_query($connection,$sql)){
               echo "<small style= 'color:green; font-weight:bold' >Insert Success!</small>";
            
           }else{
             echo "Query fail...";
           }

              echo "Register Success!";
            } else {
              echo "Your password is not Strong Password!(eg. contain  A-Z, a-z, @#!)";
            }
               

            } else{
                echo "password not the same. Try Again!";
            }


           }else{
            echo "password  must have 6 characters";
           }

      } else{
        echo "Need to fill the blanket!";
      }



    }
 
    ?>
</body>
</html>
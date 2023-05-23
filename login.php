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
    <div class="container mt-4 col-md-12">
        <div class="row  col-md col-sm">
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
                <div class="card col-md">
                    <div class="card-body">
                    <form  method = "POST">
                            <div class="mb-3">
                              <label for="">Email</label>
                               <input type="eamil" class="form-control" name = "email">
                            </div>
                            <div class="mb-3">
                            <label for="">Password</label>
                             <input type="password" class="form-control" name = "password">
                          </div>
                          <button type="submit" class="btn btn-dark text-white float-end" name= "login">LOGIN</button>
                        </form>
                    </div>




                </div>

              </div>
        </div>
    </div>

   <?php 
     require_once("db_connection.php");
     $email = $_POST['email'];
     $password = $_POST['password'];
     $hashPassword = password_hash($password, PASSWORD_BCRYPT);
     $result = mysql_query("
     SELECT * from users WHERE email = '$email' and password = '$hashPassword' 
     ");
     $row = mysql_fetch_array($result);
     if($row[$email] == $email and $row[$password] == $hashPassword ){
        echo "Login Success";
     }else{
        echo "Failed to Login";
     };

   ?>
    
</body>
</html>
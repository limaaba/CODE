<?php
session_start();
try {
    require_once "dbconfig.php";
    if (isset($_POST['login'])) {

        if(empty($_POST['userneme']) || empty($_POST['password'])){
           
            $message= "All fields are required";
    }else{
        $sql = "SELECT * FROM tbladmin WHERE 'username'=:username AND 'password'=:password";

        $userrow = $dbh->prepare($sql);
        $userrow->execute(
            array(
                'username' => $_POST['username'],
                'password' => $_POST['password']
            )
            );
            $coun =$userrow->rowcount();
            if ($coun >0) {
                foreach($userrow as $result);
                $_SESSION['userid'] = $result['id'];
                header('location: dashboard.php');
            }else{
                $message = "Username or Password Wrong";
             }
           }
         }
        } catch (\Throwable $error) {
            $message->$error->getMessage();
        }
?>
<html>
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>
  <body style="background-color: #eee;">
      <div class="container" style="width: 30%;">
          <h3>Admin Login</h3>
          <form action="dashboard.php" method="post">
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username" required>

            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required>

            </div>
            <div class="form-group">
               <button type="submit" name="login" class="btn btn-primary">Login</button>
            </div>
          </form>
          <?php
          if (isset($message)) {
                echo'<div class="alert alert-danger">'.$message.'</div>';
          }
          ?>
       </div>




  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
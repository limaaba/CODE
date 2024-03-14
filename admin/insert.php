<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('dbconfig.php');

if (isset($_POST['insert'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $emailid = $_POST['emailid'];
    $contactno = $_POST['contactno'];
    $address = $_POST['address'];

    $sql = "INSERT INTO `tblusers` (`FirstName`, `LastName`, `ContactNumber`, `Address`, `EmailId`) VALUES (:fn, :ln, :cno, :adrss, :eml)";

    $query = $dbh->prepare($sql);

    $query->bindParam(":fn", $fname, PDO::PARAM_STR);
    $query->bindParam(":ln", $lname, PDO::PARAM_STR);
    $query->bindParam(":eml", $emailid, PDO::PARAM_STR);
    $query->bindParam(":cno", $contactno, PDO::PARAM_STR);
    $query->bindParam(":adrss", $address, PDO::PARAM_STR);

    $query->execute();

    $lastInserted = $dbh->lastInsertId();

    if ($lastInserted) {
        echo "<script>alert('Record inserted successfully');</script>";
        echo "<script>window.location.href='insert.php'</script>";
    } else {
        echo "<script>alert('Something went wrong with the insertion of the record');</script>";
        echo "<script>window.location.href='insert.php'</script>";
    }
}
?>




<html lang="en">
  <head>
    <title>PDO Operation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>
  <body>



    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>PHP CRUD Operation using PDO Extension</h3>
            </div>
        </div>



        <form name="insertrecord" action="" method="POST">


            <div class="row">
                <div class="col-md-4">
                    <b>First Name</b>
                    <input name="firstname" class="form-control" type="text" required>
                </div>


                <div class="col-md-4">
                    <b>Last Name</b>
                    <input name="lastname" class="form-control" type="text" required>
                 </div>
                 </div>
            
                 <div class="row">
                <div class="col-md-4">
                    <b>Email Address</b>
                    <input name="emailid" class="form-control" type="email" required>
                 </div>


                <div class="col-md-4">
                    <b>Contact Number</b>
                    <input name="contactno" class="form-control" type="text" required>
                 </div>
                 </div>



                 <div class="row">
                <div class="col-md-8">
                    <b>Address</b>
                    <textarea name="address" class="form-control" required></textarea>
                 </div>
                 </div>


            
                 <div class="row" style="margin-top: 1%;">
                   <div class="col-md-8">
                      <input value="submit" class="btn btn-success" name="insert" type="submit">
                      <a href="index.php" class="btn btn-danger">BACK</a>
                   </div>
                </div>

        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

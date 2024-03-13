<?php
    require_once "dbconfig.php";

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
        <div class="col-mb-12">
            <h3>PHP CRUD Operation using PDO Extension</h3>
            <a href="insert.php" class="btn btn-primary mb-4">Add New Record</a>


            <div class="table-responsive">
                <table id="mytable" class="table table-bordered table-striped">
                <thead class="table table-dark">
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th> Email</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                   <th> Posting Date</th>
                </thead>
                <tbody>
                      <?php
                          $sql = "SELECT * FROM tblusers";
                          $query = $dbh->prepare($sql);
                          $query->execute();

                          $result =$query->fetchAll(PDO::FETCH_OBJ);

                          $cnt=1;

                          if ($query->rowCount()>0) {
                            foreach($result as $result)

                          {
                      ?>

                       <tr>
                        <td><?php echo htmlentities($cnt);?></td>
                        <td><?php echo htmlentities($result->FirstName);?></td>
                        <td><?php echo htmlentities($result->LastName);?></td>
                        <td><?php echo htmlentities($result->EmailId);?></td>
                        <td><?php echo htmlentities($result->ContactNumber);?></td>
                        <td><?php echo htmlentities($result->Address);?></td>
                        <td><?php echo htmlentities($result->PostingDate);?></td>
                       </tr>

                      <?php

                      $cnt++;
                         }}
                      ?>
                </tbody>
                </table>
            </div>
        </div>
     </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

<?php
     require_once "dbconfig.php";

    if (isset($_REQUEST['del'])) {
        $uid = intval($_GET['del']);
        $sql = "DELETE FROM `tblusers` WHERE `id`=:id";
        $query = $dbh->prepare($sql);
    
        $query->bindParam(':id', $uid, PDO::PARAM_INT);
        $query->execute();
    
        echo "<script>alert('Record deleted successfully');</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
?>

<html lang="en">
<head>
    <title>PDO Operation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href=" https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.3.2/css/fixedHeader.bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap.min.css">

    
   
    
    


</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Record Management</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="insert.php">ADD NEW<span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Welcome</a></li>
        <li class="dropdown">
          <a href="logout.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">LOGOUT<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="logout.php">LOGOUT</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
        <div class="row">
            <div class="col-md-14">
                
                <div class="table-responsive">
                    <table class="table table-bordered table-stripped nowrap" id="example">
                        <thead>
                            <th>ID</th>
                            <th>Photo</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                             <th>Address</th>
                            <th>Posting Date</th>
                            <th>Edit</th>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * FROM tblusers";
                                $query = $dbh->prepare($sql);
                                $query->execute();
                                $result = $query->fetchAll(PDO::FETCH_OBJ);

                                $cnt = 1;

                                if ($query->rowCount() > 0) {
                                    foreach ($result as $result) {
                            ?>
                                <tr>
                                    <td><?php echo htmlentities($cnt); ?></td>
                                    <td><img src="<?php echo htmlentities(!empty($result->Photo))? ' '.htmlentities($result->Photo):'upload/mages.png'; ?>"class="img-circle" width="50" height="50"></td>
                                    <td><?php echo htmlentities($result->FirstName); ?></td>
                                    <td><?php echo htmlentities($result->LastName); ?></td>
                                    <td><?php echo htmlentities($result->EmailId); ?></td>
                                    <td><?php echo htmlentities($result->ContactNumber); ?></td>
                                    <td><?php echo htmlentities($result->Address); ?></td>
                                    <td><?php echo htmlentities($result->PostingDate); ?></td>
                                    <td>
                                        <a href="profile.php?id=<?php echo htmlentities($result->id); ?>" class="btn btn-primary btn-sm"><i class="fas fa-camera"></i></a>
                                        <a href="update.php?id=<?php echo htmlentities($result->id); ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="index.php?del=<?php echo htmlentities($result->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Do you really want to delete this record')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php
                                    $cnt++;
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
          <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
          <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
          <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap.min.js"></script>
          <script src="https://cdn.datatables.net/fixedheader/3.3.2/js/dataTables.fixedHeader.min.js"></script>
          <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
          <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap.min.js"></script>

          <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
          <script>
                $(document).ready(function() {
                var table = $('#example').DataTable()});
          </script>
</body>
</html>

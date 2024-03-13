<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
     <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>PHP CRUD Operation using PDO Extension</h3>
                <a href="insert.php" class="btn btn-primary mb-4">Add New Record</a>

                <div class="table-responsive">
                    <table id="mytable" class="table table-bordered table-striped">
                        <thead class="table table-dark">
                            <th>#</th>
                            <th>Profile Picture</th>
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
                                    foreach ($result as $row) {
                            ?>
                                <tr>
                                    <td><?php echo htmlentities($cnt); ?></td>
                                    <td><img src="<?php echo htmlentities($row->Photo); ?>" alt="" class="img-circle" width="50" height="50"></td>
                                    <td><?php echo htmlentities($row->FirstName); ?></td>
                                    <td><?php echo htmlentities($row->LastName); ?></td>
                                    <td><?php echo htmlentities($row->EmailId); ?></td>
                                    <td><?php echo htmlentities($row->ContactNumber); ?></td>
                                    <td><?php echo htmlentities($row->Address); ?></td>
                                    <td><?php echo htmlentities($row->PostingDate); ?></td>
                                    <td>
                                        <a href="profile.php?id=<?php echo htmlentities($row->id); ?>" class="btn btn-primary btn-sm"><i class="fas fa-camera"></i></a>
                                        <a href="update.php?id=<?php echo htmlentities($row->id); ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="index.php?del=<?php echo htmlentities($row->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Do you really want to delete this record')"><i class="fas fa-trash"></i></a>
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

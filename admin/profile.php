<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "dbconfig.php";

if (isset($_POST['upload'])) {
    $userid = intval($_GET['id']);
     
    $file_name=$_FILES['file']['name'];
    $file_temp=$_FILES['file']['tmp_name'];
    $file_size=$_FILES['file']['size'];
    $file_type=$_FILES['file']['type'];

    $location="/upload/".$file_name;

    if ($file_size < 524880) {
       if (move_uploaded_file($file_temp,$location)) {
        try {
            $bdh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql ="UPDATE tblusers SET `Photo`='$location' WHERE `id`='$userid'";
            $dbh->exec($sql);

        }catch(PDOException $e) {
            echo $e->getMessage();
        }
        $dbh = null;
        header('location:index.php');
        }
        }else {
        echo "<script>alert('file size is too large to upload');</script>";
        }
    }
?>

<html lang="en">

<head>
    <title>PDO Operation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
     $userid = intval($_GET['id']);
     $sql = "SELECT * FROM tblusers WHERE `id`=$userid";
     $query=$dbh->prepare($sql);
     $query->execute();
     $result = $query->fetch();
    ?>

    <div class="container">
        <div class="row">
            <div class="col-mb-12">
                <h3>PROFILE UPLOAD <span class="fa fa-image"></span></h3>
                <form action="" enctype="multipart/form-data" method="POST">
                    <div class="form-group">
                        <label for="">UPLOAD HERE</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>
                    <button type="submit" name="upload" class="btn btn-danger">Upload</button>
                </form>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
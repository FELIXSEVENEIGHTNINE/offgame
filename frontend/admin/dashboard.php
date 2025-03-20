<?php
    include_once('../api/api.php');
    //echo session_status();
    $id = $_GET['id'];

    if ($id == NULL) {
        header("Location: index.php");
    }

    $info = Admin("GET", $id);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="assets/css/index.css">
        <link rel="stylesheet" href="assets/css/main.css">
        <script src="assets/js/index.js"></script>
    </head>
    <body>
        <div class="container">
            <a href="../">Home</a> &gt <a href="">Admin</a>
        </div>
        <div class="container">
            <h2> Hello <?php echo $info['admin_username']?></h2>
            <br><br>
            <h3>Functions</h3><hr>
            <a href="editprofile.php?id=<?php echo $id?>"><button class="btn btn-primary">Edit Admin Profile</button></a>
            <a href="addblog.php"><button class="btn btn-primary">Add Blog</button></a>



        </div>



    </body>
</html>
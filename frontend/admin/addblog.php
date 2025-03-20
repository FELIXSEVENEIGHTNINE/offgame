<?php
    include_once('../api/api.php');
    //echo session_status();

    if(isset($_POST['submit'])) {
        $title = $_POST['title'];
        $date = $_POST['date'];
        $content = $_POST['content'];

        $blogarray = array($title, $date, $content);
        $blog = Blog("PUT", $blogarray);
        if($blog == 1) echo "Yes";
    }
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
            <<a href="../">Home</a> &gt <a href="../admin/dashboard.php?id=<?php echo $id ?>">Admin</a> &gt <a href="">Add Blog</a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2> Add Blog</h2><hr>
                    <form method="POST" >
                        <div>
                            <label for="title" class="form-label">Blog Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>
                        <div>
                            <label for="date" class="form-label"> Blog Date</label>
                            <input type="text" name="date" id="date" class="form-control" required>
                        </div>
                        <div>
                            <label for="content" class="form-label">Blog Content</label>
                            <textarea id="content" name="content" class="form-control" rows="5" required></textarea>
                        </div>
                        <input type="submit" name="submit">
                    </form>
                </div>
            </div>
        </div>



    </body>
</html>
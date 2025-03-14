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
            <form method="POST">
                Enter your admin ID:
                <input name="num" type="text">
                Enter your password:
                <input name="password" type="password">
                
                <button type='submit' name='adminSubmit'>Submit</button>

                <?php
                    // check if admin id is valid first
                    if(isset($_POST['adminSubmit'])) {
                        $number = $_POST['num'];
                        $password = $_POST['password'];

                        include("../api/api.php");
                        if(AdminAuth($number, $password)) {
                            $id = AdminId("GET", $number);
                            header("Location: dashboard.php?id=$id");
                        }
                    }
                ?>
            </form>
        </div>



    </body>
</html>
<!doctype html>
<html>


<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!------------------------------- Sweet Alert ---------------------------------->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- ---------------------------------------------------------------------------->
    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="../css/header.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;600&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> <!-- jquery CDN  -->
    <link rel="stylesheet" href="../css/acesso.css">

    <title>Carbox</title>
</head>

<body>


    <style>
        body {
            background-image: url('../img/05.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            -webkit-background-size: cover;
            -moz-background-size: cover;


        }
    </style>

    <div class="container">

        <form class="form-signin" method="POST">
            <div class="text-center" id="logo">
                <h2 class="form-signin-heading">Recuperar Senha</h2>
                <hr>
            </div>
            <input type="text" class="form-control" name="email" placeholder="Digite o e-mail cadastrado" required="" autofocus="" />
            <br>

            <div class="text-right">
                <input type="submit" name="redefinirsenha" class="btn btn-success btn-lg btn-block" value="Enviar">
            </div>

        </form>

    </div>
    <?php include_once "../layout/footer.php"; ?>
</body>



</html>

<?php


require_once "../dao/RestritoDAO.php";
require_once "../class/ClassRestrito.php";

if (isset($_POST['redefinirsenha'])) {


    $email = $_POST['email'];
    $cliente = new RestritoDAO();
    $cliente->redefinirRestrito($email);
}

?>
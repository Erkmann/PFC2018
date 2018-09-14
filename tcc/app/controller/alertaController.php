<?php

    function alertaEmail(){
        header('location: ../view/alertaE.php');
    }

    function alertaLogin(){
        header('location: ../view/alerta.php');
    }



    if ($_GET['rota'] == "email"){
        alertaEmail();
    }
    elseif ($_GET['rota'] == "login"){
        alertaLogin();
    }
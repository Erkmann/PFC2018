<?php echo "
<script>   
    window.alert('Email nao verificado! Um email de verificação foi enviado para seu endereço de email. Por favor, confirme seu cadastro!');
   
    window.location.replace('../controller/UsuarioController.php?rota=resendVal&id=".$user->getIdUsuario()."&email=".$user->getEmail()."');
</script>

";?>

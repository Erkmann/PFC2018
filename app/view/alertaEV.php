<script>
    var email = document.getElementById('email').value;
    var id = document.getElementById('id').value;
    //window.alert('Email nao verificado! Um email de verificação foi enviado para seu endereço de email. Por favor, confirme seu cadastro!');
    window.alert(email + id);
    //window.location.replace('../controller/UsuarioController.php?rota=resendVal&id=' + id + '&email=' + email);
</script>

<html>
<div><p ></p></div>


<input value="<?= $user->getEmail() ?>"  id="email" style="display: none;">
<input value="<?=$user->getIdUsuario() ?>"  id="id" style="display: none;">
</html>

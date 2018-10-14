<?php
//Server settings
$mail->SMTPDebug = 2;
$mail->isSMTP();
$mail->Host = 'smtp.sendgrid.net';
$mail->SMTPAuth = true;
$mail->Username = 'Erkmann';
$mail->Password = 'mateuserkmann08';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
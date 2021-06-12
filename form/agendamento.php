<?php
require("../PHPMailer/src/PHPMailer.php");
require("../PHPMailer/src/SMTP.php");

if (!empty($_POST)) {

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->CharSet = 'UTF-8';
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "xxxxxxxxx";
    $mail->Port = 000; // or 587
    $mail->IsHTML(true);
    $mail->Username = "xxxxxxxxx";
    $mail->Password = "xxxxxxxxx";

    $mail->SetFrom("00000000");
    $mail->Subject = "[Site] xxxxxxxxxx";
    $mail->Body = " Olá, 
                    Segue contato realizado em xxxxxxxxx <b>xxxxxxxx</b>.<br>
                    Por favor entre em contato assim que possível.<br>
                    Obrigado.<br>";

    $mail->Body .= "<hr>
                    Nome: <b>{$_POST["name"]}</b> <br>
                    Telefone: <b>{$_POST["number"]}</b>  <br>
                    E-mail: <b>{$_POST["email"]}</b>  <br>";


    $mail->AddAddress("xxxxxxxxx");
    if (!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}
?>
<html lang="pt">
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body style="background-color: #151518 ">


<div class="modal fade" id="modal-mail" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #24213D">
            <div class="modal-body text-center">
                <h3 style="color: white">Obrigado, em breve entraremos em contato.</h3>
            </div>
            <div class="modal-footer" style="border-top: 0; text-align: center">
                <a href="xxxxxxxxxxx" class="btn btn-success" style="border: none; background-color: #776BFF">Confirmar</a>
            </div>
        </div>
    </div>
</div>

<script>
    $(function(){
        $('#modal-mail').modal('show');
    });
</script>

</body>
</html>
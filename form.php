<?php

//Medida de seguridad/Precaución
function eliminar_malware($str)
{
    return preg_match("/[\r\n]/", $str);
} 

//La info fue enviada? (Se hizo click?)
if (isset($_POST['contact-submit']))
{
    //Eliminación del script en caso de que se violen medidas de seguridad
    if(eliminar_malware($name) || eliminar_malware($email))
    {   
        die();
    }

    //Chequear que estén todos los campos no-vacíos
    if (!$name || !$email || !$msg)
    {
?>
        <script>
        alert("Por favor completar todos los campos.");
        </script>
<?php
        exit();
    }

    //Si está toda la info, entonces se guarda en variables sin espacios en blanco
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $msg = $_POST['msg'];

    //A quién se envía el form (email falso)
    $destinatario = "holaa@gmail.com";

    //Agregar subject al email
    $subject = "$name te ha enviado una consulta";

    //Mensaje 
    $mensaje = "Nombre: $name \r\n";
    $mensaje .= "Email: $email \r\n";
    $mensaje .= "Consulta: \r\n $msg";
    $mensaje = wordwrap($mensaje, 75); //Emprolija mensaje en 75 caracteres por línea

    //Poner header del mail en una variable
    $headers = "MIME-Version: 1.0 \r\n";
    $headers .= "content-type: text/plain; charset = iso-8859-1 \r\n";
    $headers .= "De: $name <$email> \r\n";
    $headers .= "X-Priority:1 \r\n"; //Prioridad alta (1), Spam (0)
    $headers .= "X-MSMail-Priority: High \r\n";

    //Enviar el email a la casilla
    mail($destinatario, $subject, $mensaje, $headers);

?>

    <!-- Gracias por contactarse con nosotros! -->
    <script>
    alert("¡Gracias por contactarse con nosotros! En breve estaremos respondiendo.");
    </script>

<?php
    
}

?>
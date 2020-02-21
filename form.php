<?php

  define("TITLE", "Refill | Barra Móvil");
  include('includes/head.php');

  $name = $email = $msg = "";

  //Medida de seguridad/Precaución n°1: que el nombre contenga números y letras nada más
  function securityName($str)
  {
      return preg_match("/^[a-zA-Z]*$/", $str);
  } 

  //función que limpia/emprolija
  function limpiado($data)
  {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
  }

  // Medida de seguridad n°2: Function to validate against any email injection attempts
  function IsInjected($str)
  {
    $injections = array('(\n+)',
                '(\r+)',
                '(\t+)',
                '(%0A+)',
                '(%0D+)',
                '(%08+)',
                '(%09+)'
                );
    $inject = join('|', $injections);
    $inject = "/$inject/i";
    if(preg_match($inject,$str))
      {
      return true;
    }
    else
      {
      return false;
    }
  }

  //Chequear que estén todos los campos no-vacíos
  // (ELSE) Si está toda la info, entonces se guarda en la variable sin espacios en blanco

  if (empty($_POST['name'])) 
    {
      define("EMPTY", "NOMBRE");
      include('includes/alerts/error-empty.php');
    } 
    else{
      $name = limpiado($_POST['name']);
    }
    
  if (empty($_POST['email']))
    {
      define("EMPTY", "CORREO ELECTRÓNICO");
      include('includes/alerts/error-empty.php');
    } else{
      $email = trim($_POST['email']);
    }
    
  if (empty($_POST['msg']))
    {
      define("EMPTY", "CONSULTA");
      include('includes/alerts/error-empty.php');
    } else{
      $msg = $_POST["msg"];
    }

  //La info fue enviada? (Se hizo click?)
  if (isset($_POST['contact-submit']))
  {
      //Eliminación del script en caso de que se violen medidas de seguridad
      if(securityName($name) || IsInjected($email))
      {   
        include('includes/alerts/error-invalid.php');
        die;
      }

          //A quién se envía el form 
          $to = "holis@gmail.com";

          //Agregar subject al email
          $subject = $name . " te ha enviado una consulta. REFILL-BARRA MÓVIL.";

          //Mensaje/Email 
          $mensaje = "Nombre: " . $name ."\r\n";
          $mensaje .= "Email: " . $email . "\r\n";
          $mensaje .= "Consulta: \r\n " . $msg;
          $mensaje = wordwrap($mensaje, 75); //Emprolija mensaje en 75 caracteres por línea

          //Poner header del mail en una variable
          $headers = "From: aylu@avmec.com \n";
          $headers .= "Reply-To: " . $name ."<". $email .">\n";
          $headers .= "MIME-Version: 1.0\n";
          $headers .= "content-type: text/plain\n";
          $headers .= "X-Priority:1\n"; //Prioridad alta (1), Spam (0)
          $headers .= "X-MSMail-Priority: High \n";

          //Enviar el email a la casilla
          mail($to, $subject, $mensaje, $headers);

          if(mail($to, $subject, $mensaje, $headers))
          {        
            // SUCCESS. Gracias por contactarse con nosotros! 
            include('includes/alerts/success.php');
          }
  }

  include('includes/footer.php');

?>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';



/**
 * This example shows how to handle a simple contact form safely.
 */

//Import PHPMailer class into the global namespace


$msg = '';
//Don't run this unless we're handling a form submission
if (array_key_exists('email', $_POST)) {
    date_default_timezone_set('Etc/UTC');

   

    //Create a new PHPMailer instance
    $phpmailer = new PHPMailer();
    //Send using SMTP to localhost (faster and safer than using mail()) – requires a local mail server
    //See other examples for how to use a remote server such as gmail
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.office365.com';
    $phpmailer->SMTPAuth = true;
    $phpmailer->AuthType = 'LOGIN';
    $phpmailer->Port = 587;
    $phpmailer->Username = 'phpprimary22@outlook.com';
    $phpmailer->Password = 'Boca159951!';
    $phpmailer->SMTPSecure = 'tls';

    //Use a fixed address in your own domain as the from address
    //**DO NOT** use the submitter's address here as it will be forgery
    //and will cause your messages to fail SPF checks
    $phpmailer->setFrom('phpprimary22@outlook.com', 'Contacto por pagina web');
    //Choose who the message should be sent to
    //You don't have to use a <select> like in this example, you can simply use a fixed address
    //the important thing is *not* to trust an email address submitted from the form directly,
    //as an attacker can substitute their own and try to use your form to send spam
    $addresses = [
        'Asesoramiento Personalizado' => 'nacho.gonzalez30@gmail.com',
        'Veterinaria' => 'nacho.gonzalez30@gmail.com',
        'Red ensayos Delyar' => 'nacho.gonzalez30@gmail.com',
        'Semilllas' => 'nacho.gonzalez30@gmail.com',
        'Agricultura Digital' => 'nacho.gonzalez30@gmail.com',
        'Análisis de Suelo' => 'nacho.gonzalez30@gmail.com',
        'Recuperación de Envases de Fitosanitarios' => 'nacho.gonzalez30@gmail.com',
        'Recursos Humanos' => 'nacho.gonzalez30@gmail.com',
    
    ];
    //Validate address selection before trying to use it
    if (array_key_exists('dept', $_POST) && array_key_exists($_POST['dept'], $addresses)) {
        $phpmailer->addAddress($addresses[$_POST['dept']]);
    } else {
        //Fall back to a fixed address if dept selection is invalid or missing
        $phpmailer->addAddress('nacho.gonzalez30@gmail.com');
    }
    //Put the submitter's address in a reply-to header
    //This will fail if the address provided is invalid,
    //in which case we should ignore the whole request
    if ($phpmailer->addReplyTo($_POST['email'], $_POST['name'])) {
        $phpmailer->Subject = 'PHPMailer contact form';
        //Keep it simple - don't use HTML
        $phpmailer->isHTML(false);
        //Build a simple message body
        $phpmailer->Body = <<<EOT
        Email: {$_POST['email']}
        Nombre: {$_POST['name']}
        Apellido: {$_POST['last_name']}
        Telefono: {$_POST['phone']}
        Mensaje: {$_POST['message']}
        EOT;
        //Send the message, check for errors
        if (!$phpmailer->send()) {
            //The reason for failing to send will be in $phpmailer->ErrorInfo
            //but it's unsafe to display errors directly to users - process the error, log it on your server.
            echo 'Mailer error: ' . $phpmailer->ErrorInfo;
            $msg = 'Hubo un error, contactese a traves de Whatsapp o por mail.';
        } else {
            $msg = 'Mensaje enviado!';
        }
    } else {
        $msg = 'Email invalido, chequee el formato de su mail.';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/styleContacto.css" />
    <link rel="stylesheet" href="../css/glide.core.css">
    <link rel="stylesheet" href="../css/glide.theme.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="logo">
          <Img src="../img/download.jpg" alt=""></Img>
        </div>
        <ul class="links">
          <a href="index.html">
              <li><button type="button" id="INICIO">INICIO</button></li>
          </a>
          <a href="silicona.html">
              <li><button type="button" id="EMPRESA">SILICONA</button></li>
          </a>
          <li>
            <a href="productos.html"><button type="button" id="COMPROMISO">PRODUCTOS</button></a>
          </li>
          <li id="boton">
            <a href="servicios.html" >
              <button type="button" id="presupuesto">
                SERVICIOS
              </button>
            </a>
          </li>
          <li id="boton">
            <a href="contacto.html" >
              <button type="button" id="CONTACTO">
                CONTACTO
              </button>
            </a>
          </li>
        </ul>
        <div class="burger">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
      </nav>
<main>
  <section class="mainImg">
    <section class="izq">
      <div class="title">
        <h1>Contacto</h1>
        <div class="line"></div>
      </div>
    </section>
      <section class="der">
        <div class="banner">
        </div>
      </section>
      
    </div>
      <button class="container">
          <div class="chevron"></div>
          <div class="chevron"></div>
          <div class="chevron"></div>
      </button>
  </section>
<section>
  <section class="gridMain">
      <section class="uno">
        <section class="contacto1">
          <div>
            <h5>Administración y ventas</h5>
            <span>Arregui 2495, C1417DJE,</span>
            <span>Buenos Aires, Argentina</span>
            <span>ventas@siliconargentinasrl.com.ar</span>
            
          </div>
          <div class="planta">
            <h5>Planta</h5>
            <span>Gral. J. G. de Artigas 2633, C1417DJE</span>
            <span>Buenos Aires, Argentina</span>
            <span>(54 11) 4582-4994 I 4582-7575</span>
            
          </div>
            <div>
              <h5>Planta, administración y ventas San Justo</h5>
              <span>Argentinqa 3950, San Justo</span>
              <span>Buenos Aires, Argentina</span>
              <span>(54 11) 4441-3517 I 4441-3544</span>
            </div>
          </section>
      </section>
      
<section class="form dos">
    
        <form action="../php/email2.php" method="post" name="contactform">

        <input maxlength="50" name="name" id="first" size="30" type="text" required placeholder="NOMBRE"  /></p>
           
        <p><label for="last"></label><br>
        <input maxlength="50" name="last_name"  id="last" size="30" type="text" required  placeholder="APELLIDO" /></p>
          
        <p><label for="emailadr"></label><br>
            <input maxlength="80" name="email" id="emailadr" size="30" type="email"required  placeholder="EMAIL" /></p>
          
        <p><label for="phone"></label><br>
        <input maxlength="30" name="telephone" id="phone" size="30" type="text" required  placeholder="TELÉFONO" /></p>

        
        
           
            </fieldset>
        </p>

        
        
        
          
          
        
          
        
        <p><label for="msg"></label><br>
        <textarea cols="25"  id="msg" name="message" rows="6" required placeholder="MENSAJE" ></textarea></p>
         
        
        <p class="flex"><input type="submit" value="ENVIAR" /></p>
        <h1><?php echo "Hello World" ?></h1>
         
        </form>
          
        </body>
        </html>
</section>
</section>
<section></section>

</section>

</main>
<footer>
  <section class="menu">
     <ul>
      <a href="index.html">
        <li>INICIO</li>
      </a>
      <a href="silicona.html">
        <li>SILICONA</li>
      </a>
      <a href="productos.html">
        <li>PRODUCTOS</li>
      </a>
      <a href="servicios.html">
        <li>SERVICIOS</li>
      </a>
      <a href="contacto.html">
        <li>CONTACTO</li>
      </a>
     </ul>
  </section>
  <section class="contacto1">
      <div>
        <h5>Administración y ventas</h5>
        <span>Arregui 2495, C1417DJE,</span>
        <span>Buenos Aires, Argentina</span>
        <span>ventas@siliconargentinasrl.com.ar</span>
        
      </div>
      <div class="planta">
        <h5>Planta</h5>
        <span>Gral. J. G. de Artigas 2633, C1417DJE</span>
        <span>Buenos Aires, Argentina</span>
        <span>(54 11) 4582-4994 I 4582-7575</span>
        
      </div>
    </section>
      <section class="contacto2">
        <div>
          <h5>Planta, administración y ventas San Justo</h5>
          <span>Argentinqa 3950, San Justo</span>
          <span>Buenos Aires, Argentina</span>
          <span>(54 11) 4441-3517 I 4441-3544</span>
        </div>
        <section class="logo">
          <img id="logoblanco" src="../img/download.jpg" alt="">
      </section>
        
 
</footer>

      <script type="text/javascript" src="../js/appCon.js"></script>
      <script src="../node_modules/@glidejs/glide/dist/glide.js"></script>
    <script>
       const config ={
            type: 'carousel',
            perView: 5,
            breakpoints:{
                800: {
                    perView:1
                },
                1200: {
                    perView:2
                }
                }
            }
        new Glide('.glide',config).mount()
    </script>
</body>
</html>
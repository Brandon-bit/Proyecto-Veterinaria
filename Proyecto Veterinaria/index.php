<?php 

include 'includes/templates/header.php';

$errores = [];

$nombre = '';
$correo = '';
$telefono = '';
$mensaje = '';

// Comprobar si el formulario ha sido enviado
if(isset($_POST['submit'])){
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $mensaje = $_POST['mensaje'];

    if(!empty($nombre)){
        $nombre = trim($nombre);
    }else{
        $errores[] = 'Por favor ingrese su nombre';
    }

    if(!empty($correo)){
        $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);

        if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
            $errores[] = 'Por favor ingrese un correo valido';
        }
        
    }else{
        $errores[] = 'Por favor ingrese su correo';
    }

    if(!empty($telefono)){
        $telefono = trim($telefono);
    }else{
        $errores[] = 'Por favor ingrese su telefono';
    }

    if(!empty($mensaje)){
        $mensaje = htmlspecialchars($mensaje);
        $mensaje = trim($mensaje);
        $mensaje = stripslashes($mensaje);
    }else{
        $errores[] = 'Por favor ingrese un mensaje';
    }

    if(!$errores){
        $enviar_a = 'brandonsalinas792@gmail.com';
        $asunto = 'Correo enviado desde mi pagina';
        $mensaje_preparado = "De: $nombre \n";
        $mensaje_preparado .= "Correo: $correo \n";
        $mensaje_preparado .= "Mensaje: " . $mensaje;

        mail($enviar_a, $asunto, $mensaje_preparado);
    }

}


?>

    <div class="banner">
        <div class="banner-opacidad">  
            <div class="contenido-banner contenedor">
                <h1>Veterinaria</h1>
                <p>Un lugar seguro para tu mascota</p>
            </div>
        </div>
    </div>

    <section class="nosotros contenedor" id="seccion-nosotros">
        <h2>¿Quienes Somos?</h2>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum exercitationem magnam at maxime velit temporibus voluptatum blanditiis facilis quo soluta ipsum praesentium labore quos, cumque, nisi aut consectetur consequatur sapiente?
            Natus, fugit officiis esse, pariatur laborum earum, nostrum dolores voluptatem sunt reiciendis repudiandae. Saepe impedit minima architecto quis dolores officiis dolor ullam itaque ratione beatae ex, fugit tempora, possimus laboriosam.
            Ullam quibusdam eos perspiciatis quasi, maxime ad nam est nemo nisi quo possimus veniam quidem nobis minima fugit ab repellat tenetur, consequuntur natus voluptas sequi rem? Sunt totam fugit optio.
        </p>
    </section>

    
    <div class="galeria">
        <h2>Galeria</h2>
        <div class="galeria-imagenes">
            <img src="build/img/img5.jpg" alt="imagen-galeria">
            <img src="build/img/img2.jpg" alt="imagen-galeria">
            <img src="build/img/img3.jpg" alt="imagen-galeria">
            <img src="build/img/img4.jpg" alt="imagen-galeria">
        </div>
    </div>
    

  
    <div class="contactanos contenedor" id="seccion-contacto">
        <h2>Contactanos</h2>

        <div class="contacto-contenido">
            <form class="formulario" method="POST">
                <fieldset class="mb-0"> 
                    <legend>Informacion de contacto</legend>
    
                    <input type="text" placeholder="Nombre:" id="nombre" name="nombre" value="<?php echo $nombre?>"><br>
    
                    <input type="email" placeholder="Correo:" id="correo" name="correo" value="<?php echo $correo?>"><br>
    
                    <input type="tel" placeholder="Telefono:" id="telefono" name="telefono" value="<?php echo $telefono?>"><br>
    
                    <textarea id="mensaje" placeholder="Mensaje:" cols="30" rows="10" name="mensaje" class="mb-0" ><?php echo $mensaje?></textarea>
                </fieldset>
                
                <?php foreach($errores as $error) { ?>

                    <div class="alert alert-danger m-2"><?php echo $error?></div>

                <?php } ?>

                <input type="submit" value="Enviar" class="boton mt-2" name="submit">
            </form>
    
            <div class="mapa">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3594.3486227293174!2d-100.21771198461212!3d25.72598231635587!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8662ebd4816f1c29%3A0x3a565f52089822be!2sPlaza%20Citadel!5e0!3m2!1ses!2smx!4v1655524209103!5m2!1ses!2smx" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>            </div>
            </div>
        </div>
    </div>
    


<?php 


include 'includes/templates/footer.php';

?>
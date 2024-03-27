<?php //Es el archivo que va a cargar todas las clases de los controladores, hace la comunicacion 
  
    //cargamos librerias
    require_once 'config/Configurar.php';

    //Creacion del autoload que es una funcion especial de php para que detecte los archivos de Clases con esto se reduce la cantidad 
    //de codigo cuando las clases sean muchas y no tener la necesidad de cargarlas una por una 

    //require_once 'librerias/Base.php';            //todo este codigo es sustituido por autoload
    //require_once 'librerias/Controlador.php';
    //require_once 'librerias/Core.php';

    //Autoload php //El nombre del archivo debe coincidir exactamente con el nomre de la clase, por eso las mayusculas en librerias
    spl_autoload_register(function($nombreClase){
        require_once 'librerias/' .$nombreClase. '.php'; 
    });


?>
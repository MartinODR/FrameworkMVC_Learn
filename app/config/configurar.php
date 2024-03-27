<?php // aqui van las credenciales de conexion a la BD, Host, User, nombre BD, Pass etc 
    //se encara de configurar la ruta de la aplicacion, el titulo del sitio dinamicamente 
    //cuando se comience a trabajar dentro de controladores, las vistas y crear diferentes paginas, secciones se crearan muchos archivos 
    //cosas como titulo del sitio ruta de la aplicacion y cosas que seran constantes, la idea es mantener desde una constante en PHP
    //y simplemente podamos instanciarla donde queramos cambiar el sitio simplemente se cambia la constante 

     //Configuracion de acceso a la Base de datos con PDO 

    define('DB_HOST', 'localhost'); //TEST; CREDENCIALES DEBEN SER CAMBIADAS  PARA FRAMEWORK. DEPENDEN DE CADA DB INDIVIDUAL
    define('DB_USUARIO', 'root');
    define('DB_PASSWORD', '');
    define('DB_NOMBRE', 'blog1');





//-----------------------------------------------------------------------------------------------------------------
    //Ruta de la aplicacion   //la clase configurar se debe instanciar desde iniciador 
   // echo __FILE__;            //TEST: de momento permite mostrar la ruta exacta del archivo donde estoy trabajando

  //  echo dirname(dirname(__FILE__));   //TEST: me permite devolverme a la categoria padre (carpeta contenedora), doble, retrocede otra a la carpeta raiz app

    define('RUTA_APP', dirname(dirname(__FILE__)));   //creacion de la constante RUTA_APP que va a la carpeta raiz del directorio 

    //Ruta url Ejemplo: http://localhost/MartinWeb/FrameworkMVC/
   // define('RUTA_URL', '_URL_');             //cuando tengamos que cambiar a otro servidor o dominio simplemente se cambia aqui
   ////TEST; DEBE SER DEFINIDA RUTA INDIVIDUAL DE PROYECTO PARA FRAMEWORK
   define('RUTA_URL', 'http://localhost/MartinWeb/FrameworkMVC_estudio'); //si ya se pasa el slash (/) aqui ya no se debe pasar en el otro lado, mejor no dejarlo para evitar confusiones

    define('NOMBRESITIO', '_NOMBRE_SITIO');        //La idea es reemplazar _NOMBRE_SITIO por el nombre del proyecto que e vaya a crear

?>
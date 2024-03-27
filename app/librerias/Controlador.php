<?php  //este es el controlador principal al cual van ligados los controladores de la carpeta controlador estos heredan de aqui
    //Clase controlador principal 
    //Se encarga de poder cargar los modelos y las vistas 
    class Controlador{

        //cargar modelo
        public function modelo($modelo){
            //carga
            require_once '../app/modelos/' . $modelo . '.php';
            //instanciar el modelo
            return new $modelo();
        }

        //cargar vista
        public function vista($vista, $datos = []){
            //chequear si el archivo vista existe
            if(file_exists('../app/vistas/' . $vista . '.php')){
                require_once '../app/vistas/' . $vista . '.php';
            }else{
                //si el archivo de la vista no existe
                die('La vista no existe');    //mensaje de error ,The die() function is an alias of the exit() function.
            }
           
        }
    }





?>
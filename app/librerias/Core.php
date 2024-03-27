<?php //Configuraciones , programacion que se va a traer desde la URL , Controlador , metodos y parametros 

    //Mapear la URL ingresada en el navegador 
    //1-Controlador
    //2-Metodo
    //3-Parametro
    //EJ URL: /articulos/actualizar/4      (Controlador: articulos, Metodo: actualizar, Parametro: 4): Mapeado

    class Core{
        protected $controladorActual = 'paginas';   //1)controlador que se carga por defecto cuando no hay ninguna URL
        protected $metodoActual = 'index';          //mientras no haya ningun metodo cargado este ser el metodo por defecto 'index'   
        protected $parametros = [];                 //mientras no se cargue ningun parametro, sera un arreglo vacio 

        //constructor
        public function __Construct(){              //3)cargar la clase Core/llama a la funcion de abajo y obtiene el valor de url
             // print_r($this->getUrl());             //Test Array con el metodo get Url// key: 0)controlador, 1)metodoActual, 2)parametro
              $url = $this->getUrl();

            if(isset($url[0])){                                         //Isset agregado por error de requerir array vacio $url
              //buscar en controladores si el controlador existe
                if(file_exists('../app/controladores/' .ucwords($url[0]). '.php')){
                 //si existe se setea como controlador por defecto 
                 $this->controladorActual = ucwords($url[0]);

                 //unset indice
                 unset($url[0]);
                }
            }
             //requerir controlador 
             require_once '../app/controladores/' . $this->controladorActual . '.php';
             $this->controladorActual = new $this->controladorActual;

            //Chequear la segunda parte de la url que seria el metodo
            if(isset($url[1])){
                if(method_exists($this->controladorActual, $url[1])){
                    //Chequeamos metodo
                    $this->metodoActual = $url[1];
                    //unset indice
                 unset($url[1]);
                }
            }
            //   echo $this->metodoActual;                     //Test metodo
            
            //Obtener los parametros 
            $this->parametros = $url ? array_values($url) : [];   //condicional ternario 

            //llamar callback con parametros array //Returns the return value of the callback
            call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);   //https://www.php.net/manual/en/function.call-user-func-array.php
        }

        public function getUrl(){                   //2)viene del public .htaccess // RewriteRule todo lo que se pase ahi va a la variable url
            //  echo $_GET['url'];                  //todo lo que se ingrese por arriba en la url lo va a traer i lo va a imprimir en pantalla   //echo $_Get[''url]; imprime lo que se escriba en la barra de URL navegador //imprime URL
                  
            if(isset($_GET['url'])){                //si esta seteada la url entoncs escribimos el siguiente codigo          
                $url = rtrim($_GET['url'], '/');                   //rtrim() cortar los espacios de la url a la derecha que puedan tener '/'
                $url = filter_var($url, FILTER_SANITIZE_URL);    
                $url = explode('/', $url);                       //esta funcion pide un delimitador y rompe el string en un array
                return $url;                                    // /articulo/actualizar/4 -> Array ( [0] => articulo [1] => actualizar [2] => 4 )
            }

        }       
                                          
    }                                                 


?>
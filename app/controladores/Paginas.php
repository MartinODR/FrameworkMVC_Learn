<?php //Este es el controlador principal para las url (no muy claro)
//se pasan parametros hacia las vistas

  class Paginas extends Controlador{                //utilizando la herencia(extender Paginas a la clase Controlador) 
    public function __construct(){
     
     //TEST,ESTE ES EL ACCESO A  Articulo.php A MODO DE TEST DEBE SER BORRADO para Framework
      $this->articuloModelo = $this->modelo('Articulo');
      //  echo "Controlador paginas cargado";
    
    
    }
    
    
    public function index(){
      
      $articulos = $this->articuloModelo->obtenerArticulos();   //TEST; DEBE SER BORRADO PARA FRAMEWORK

      //$this->vista('paginas/inicio');         //Test,carga la vista informacion.php que la direccion esta dada en controlador     
      $datos = [                            
        'titulo' => 'Bienvenidos a MVC Framework',             //Array que se envia a inicio.php
       
        'articulos' => $articulos  //TEST DEBE SER BORRADO PARA FRAMEWORK
      
      ];
      $this->vista('paginas/inicio', $datos);                //Array $datos se envian al controlador 
    }
    
    //TEST, ESTOS METODOS articulo() y actualizar SON A MODO DE TEST; SOLO QUEDA EL METODO INDEX
    public function articulo(){
      //$this->vista('paginas/articulo');     //Test, carga vista articulo.php creado y despues borrado
    }

    public function actualizar($num_registro){
      echo $num_registro;
    }

  }



?>
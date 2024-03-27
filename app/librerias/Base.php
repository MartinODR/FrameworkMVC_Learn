<?php  //este archivo va a crear la conexion a la BD usando los datos de conexion del archivo configurar, utilizando PDO a MySQL
       // y sentencias preparadas por mayor seguridad 

       //clase para conectarse a la base de datos y ejecutar consultas PDO// dbh=database handler//stmt=statement(ejecutar conslta)
       //esta clase sera utilizada por el modelos/Articulo.ühü
       class Base{
              private $host = DB_HOST;
              private $usuario = DB_USUARIO;
              private $password = DB_PASSWORD;
              private $nombre_base = DB_NOMBRE;


              private $dbh;
              private $stmt;                                   //statement
              private $error;

              public function __construct(){
                     //configurar conexion 
                     $dsn= 'mysql:host=' . $this->host . ';dbname=' . $this->nombre_base;

                     $opciones = array(
                            PDO::ATTR_PERSISTENT => true, 
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                     );

                     //Crear una instancia de PDO
                     try{
                            $this->dbh = new PDO($dsn, $this->usuario, $this->password, $opciones);
                            $this->dbh->exec('set names utf8');                                        //captar caracteres esp espaniol
                            //echo "Conexion Exitosa";                                                 //Test 
                     }catch (PDOException $e){
                            $this->error = $e->getMessage();
                            echo $this->error;                                                         //Test en modelos Articulo.php
                     }
              }
                     //preparamos la consulta
              public function query($sql){
                     $this->stmt =$this->dbh->prepare($sql);
              }
                     //vinculamos la consulta con bind
              public function bind($parametro, $valor, $tipo = null){                             //relacionado a bindParam() de php
                     if(is_null($tipo)){                                                          //asignacion de tipo a variable               
                            switch (true) {
                                   case is_int($valor):
                                          $tipo = PDO::PARAM_INT;
                                   break;
                                   
                                   case is_bool($valor):
                                          $tipo = PDO::PARAM_BOOL;
                                   break;
                                   
                                   case is_null($valor):
                                          $tipo = PDO::PARAM_NULL;
                                   break;

                                   default:
                                          $tipo = PDO::PARAM_STR;
                                   break;
                            }
                     }
                     $this->stmt->bindValue($parametro, $valor, $tipo);
              }
                     //ejecuta la consulta
              public function execute(){
                     return $this->stmt->execute();
              }
                     //obtener los registros 
              public function registros(){
                     $this->execute();
                     return $this->stmt->fetchAll(PDO::FETCH_OBJ);
              }
                     //obtener un solo registro 
              public function registro(){
                     $this->execute;
                     return $this->stmt->fetch(PDO::FETCH_OBJ);
              }
                     //obtener cantidad de filas con el metodo rowCount
              public function rowCount(){                                       //funcion creada con el mismo nombre    
                     return $this->stmt->rowCount();                           //funcion de php
              }
       }



?>
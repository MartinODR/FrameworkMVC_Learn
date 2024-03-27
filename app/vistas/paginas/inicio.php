<!-- //en esta misma carpeta se alojaran todas las paginas del framework
"tuculo"-->

<?php  require RUTA_APP . '/vistas/inc/header.php'; ?>  <!--llamado a header-->

<p><?php echo $datos['titulo']; ?> </p>
<!--<p><?php //echo RUTA_APP; ?> </p>-->  <!--TEST: Probar funcionamiento de la constante creada en configurar.php-->
<!-- $datos viene del controlador Paginas ,buscar este tipo de foreach extranio -->

<ul>  <!--//TEST; DEBE SER BORRADO PARA FRAMEWORK toda la etiqueta <ul>-->
    <?php foreach($datos['articulos'] as $articulo): ?>
        <li>
            <?php echo $articulo->titulo;  ?>
        </li>
    <?php endforeach; ?>
</ul>


<?php  require RUTA_APP . '/vistas/inc/footer.php'; ?>
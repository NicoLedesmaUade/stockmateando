<?php
require_once "../class/Producto.php";
require_once "../class/Conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $imagen = $_POST['imagen'];

                $producto = new Producto();
                $producto->setTitulo($titulo);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setImagen($imagen);
                $producto->guardar();
            } 
header("location: ../index.php?sec=inicio");
exit();

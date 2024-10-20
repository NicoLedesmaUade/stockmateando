<?php
require_once "../class/Producto.php";
require_once "../class/Conexion.php";


$id = $_GET["id"];

$producto = (new Producto())->obtener_por_id($id);

$producto->borrar();

header("location: ../index.php?sec=inicio");
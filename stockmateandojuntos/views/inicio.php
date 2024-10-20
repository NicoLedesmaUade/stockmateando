<?php
require "class/Conexion.php";
require "class/Producto.php";
$paginado = isset($_GET["paginado"]) ? $_GET["paginado"] : 1;
$productos = (new Producto())->obtener_con_paginado($paginado);
?>

<div class="container">

<div class="text-center mt-4">
    <h3>Bienvenidos a Mateando Juntos, donde cada mate cuenta una historia única y personalizada. Nos dedicamos apasionadamente a la creación de mates que van más allá de lo convencional, transformando cada encuentro en momentos memorables.</h3>
</div>
<?php require_once "utils/modal.php" ?>
<div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
    <?php foreach ($productos as $producto) { ?>
        <div class="col">
            <div class="card text-center mb-3 bgcard">
            <img src="img/<?php echo $producto->getImagen() ?>" class="card-img-top" alt="Imagen del mensaje">
                <div class="card-body">
                    <h5 class="card-title"><?= $producto->getTitulo(); ?></h5>
                    <p class="card-text"><strong>ID:</strong> <?= $producto->getId(); ?></p>
                    <p class="card-text"><strong>descripcion:</strong> <?= $producto->getDescripcion(); ?></p>
                    <p class="card-text"><strong>precio:</strong> <span>$</span><?= $producto->getPrecio(); ?></p>
                    <p class="card-text"><strong>stock:</strong> <?= $producto->getStock(); ?> <span>unidades</span></p>
                    <a class="btn btn-danger" href="acciones/delete_producto.php?id=<?= $producto->getId() ?>">Borrar</a>
                </div>
            </div>
        </div>

    <?php } ?>
</div>
<nav aria-label="...">
    <ul class="pagination pagination-sm justify-content-center">
        <?php for ($i = 1; $i <= 5; $i++) { ?>
            <li class="page-item">
                <a class="page-link" href="./index.php?sec=inicio&paginado=<?= $i ?>" tabindex="-1"><?= $i ?></a>
            </li>
        <?php } ?>
    </ul>
</nav>
</div>

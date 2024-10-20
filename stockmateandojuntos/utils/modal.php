<div class="container mt-4">
    <button type="button" class="btnmarron" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Ingresa un nuevo producto
    </button>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content background">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ingresa un nuevo producto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="productoForm" method="POST" action="./acciones/agregar_producto.php">
                    <div class="form-group">
                        <label for="titulo">Titulo:</label>
                        <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Ingrese su usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion:</label>
                        <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Ingrese su descripcion" required>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock:</label>
                        <input type="number" name="stock" class="form-control" id="stock" placeholder="Ingrese su stock" required>
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen:</label>
                        <select class="form-control" id="imagen" name="imagen" required>
                            <?php
                            $dir = 'img/'; // Carpeta donde están las imágenes
                            $images = scandir($dir);
                            foreach ($images as $image) {
                                if ($image !== '.' && $image !== '..') {
                                    echo "<option value='$image'>$image</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btnmarron">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php

class Producto
{
    private $id;
    private $titulo;
    private $descripcion;
    private $precio;
    private $stock;
    private $imagen;


    public function getId()
    {
        return $this->id;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function getPrecio()
    {
        return $this->precio;
    }
    public function getStock()
    {
        return $this->stock;
    }
    public function getImagen()
    {
        return $this->imagen;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }
    public function setStock($stock)
    {
        $this->stock = $stock;
    }
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function obtener()
    {
        try {
            $conexion = (new Conexion())->getConexion();
            $query = "SELECT * FROM producto";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
            $PDOStatement->execute();
            return $PDOStatement->fetchAll();
        } catch (PDOException $e) {
            header("Location: ../error.php");
            exit();
        }
    }

    public function obtener_con_paginado($pagina = 1, $porPagina = 6)
    {
        try {
            $conexion = (new Conexion())->getConexion();
            $offset = ($pagina - 1) * $porPagina;
            $query = "SELECT * FROM producto LIMIT $porPagina OFFSET $offset
        ";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
            $PDOStatement->execute();
            return $PDOStatement->fetchAll();
        } catch (PDOException $e) {
            header("Location: ../error.php");
            exit();
        }
    }
    public function obtener_por_id($id)
    {
        try {
            $conexion = (new Conexion())->getConexion();
            $query = "SELECT * FROM producto WHERE id = $id";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
            $PDOStatement->execute();
            return $PDOStatement->fetch(); //trae un dato a la vez
        } catch (PDOException $e) {
            header("Location: ../error.php");
            exit();
        }
    }
    public function guardar()
    {
        try {
            $conexion = (new Conexion())->getConexion();
            $query = "INSERT INTO producto (titulo, descripcion, precio, stock,imagen) VALUES (:titulo, :descripcion, :precio, :stock,:imagen)";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute([
                ':titulo' => $this->titulo,
                ':descripcion' => $this->descripcion,
                ':precio' => $this->precio,
                ':stock' => $this->stock,
                ':imagen' => $this->imagen
            ]);
        } catch (PDOException $e) {
            header("Location: ../error.php");
            exit();
        }
    }

    public function borrar()
    {
        try {
            $conexion = (new Conexion())->getConexion();
            $query = "DELETE FROM producto WHERE id = :id";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute([
                "id" => $this->id
            ]);
        } catch (PDOException $e) {
            header("Location: ../error.php");
            exit();
        }
    }
}

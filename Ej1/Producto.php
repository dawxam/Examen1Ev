<?php
class Producto 
{
    private $nombre = "";
    private $categoria = "";
    private $precio = 0;
    private $stock = 0;
    private $estado = "";

    public function __construct($nombre, $categoria, $precio, $stock) 
    {
        $this->nombre = $nombre;
        $this->categoria = $categoria;
        $this->precio = $precio;
        $this->stock = $stock;
        if ($stock == 0) {
            $this->estado = "Agotado";
        } elseif ($stock <= 3) {
            $this->estado = "Stock Bajo";
        } else {
            $this->estado = "Disponible";
        }
    }

    public function __toString()
    {
        return "<td>{$this->nombre}</td><td>{$this->categoria}</td><td>{$this->precio}</td><td>{$this->stock}</td><td>{$this->estado}</td>";
    }

    public static function getProdById($id, $datosDeEntrada) 
    {
        foreach ($datosDeEntrada as $producto) {
            if ($producto["id"] == $id) {
                return new self(
                    $producto["nombre"], 
                    $producto["categoria"], 
                    $producto["precio"], 
                    $producto["stock"]
                );
            }
        }
        return null;
    }
}
?>
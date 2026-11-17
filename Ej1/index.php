<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
    <?php
        require_once("Producto.php");

        $datosDeEntrada = [ 
            ["id" => 1, "nombre" => "Portátil Gaming", "precio" => 1199.99, "stock" => 10, "categoria" => "Electrónica"], 
            ["id" => 2, "nombre" => "Ratón Inalámbrico", "precio" => 45.50, "stock" => 3, "categoria" => "Electrónica"], 
            ["id" => 3, "nombre" => "Teclado Mecánico", "precio" => 89.90, "stock" => 0, "categoria" => "Electrónica"], 
            ["id" => 4, "nombre" => "Silla de Oficina", "precio" => 150.00, "stock" => 7, "categoria" => "Muebles"], 
            ["id" => 5, "nombre" => "Cafetera Express", "precio" => 79.95, "stock" => 12, "categoria" => "Electrodomésticos"] 
        ];

        $totalPrecioStock = 0;
        $categorias = [];

        foreach ($datosDeEntrada as $productoData) {
            $totalPrecioStock += $productoData["precio"] * $productoData["stock"];
            if (!in_array($productoData["categoria"], $categorias)) {
                $categorias[] = $productoData["categoria"];
            }
        }
    ?>
    <h1>Panel de Inventario</h1>

    <div>
        <h2>Total Stock</h2>
        <p><?php echo number_format($totalPrecioStock, 2, ',', '.'); ?>€</p>
    </div>

    <div>
        <h2>Categorías</h2>
        <p><?php echo implode(", ", $categorias); ?></p>
    </div>

    <div>
        <h2>Búsqueda por ID (Ej: ID 2)</h2>
        <?php 
            $buscado = Producto::getProdById(2, $datosDeEntrada);
            if ($buscado) {
                echo "<p>Encontrado: " . $buscado->__toString() . "</p>";
            } else {
                echo "<p>Producto no encontrado.</p>";
            }
        ?>
    </div>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>        
            <?php
                foreach ($datosDeEntrada as $productoData) {
                    $producto = new Producto(
                        $productoData["nombre"], 
                        $productoData["categoria"], 
                        $productoData["precio"], 
                        $productoData["stock"]
                    );
                    echo "<tr><td>{$productoData['id']}</td>{$producto}</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>
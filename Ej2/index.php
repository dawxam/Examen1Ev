<?php
    include 'header.php';

    $usuario = $_SESSION['loginusu'];

    $contenido = file_get_contents('superheroes.json');
    $datos = json_decode($contenido, true);
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
</head>
<body>
    <?php if ($usuario === 'dc'): ?>
        <h1>Superhéroes de DC</h1>
        <div>
            <?php foreach ($datos as $superhero): ?>
                <?php if ($superhero["publisher"] === "DC Comics") {?>
                    <img src="<?php echo $superhero["picture"]; ?>" style="width: 200px; height: 300px;">
                    <p><?php echo $superhero["superhero"]; ?></p>
                    <p><?php echo $superhero["publisher"]; ?></p>
                    <p><?php echo $superhero["alter_ego"]; ?></p>
                    <p><?php echo $superhero["first_appearance"]; ?></p>
                    <p><?php echo $superhero["characters"]; ?></p>
                <?php } ?>
            <?php endforeach; ?>
        </div>

    <?php elseif ($usuario === 'marvel'): ?>
        <h1>Superhéroes de Marvel</h1>
        <div>
            <?php foreach ($datos as $superhero): ?>
                <?php if ($superhero["publisher"] === "Marvel Comics") {?>
                    <img src="<?php echo $superhero["picture"]; ?>" style="width: 200px; height: 300px;">
                    <p><?php echo $superhero["superhero"]; ?></p>
                    <p><?php echo $superhero["publisher"]; ?></p>
                    <p><?php echo $superhero["alter_ego"]; ?></p>
                    <p><?php echo $superhero["first_appearance"]; ?></p>
                    <p><?php echo $superhero["characters"]; ?></p>
                <?php } ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</body>
</html>
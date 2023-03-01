

<html>

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<?php


function filtrarporid(){
    $sqli = new mysqli("localhost", "root", "", "pruebaapidb");
  
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) && !empty($_POST['id'])) {
        $id = mysqli_real_escape_string($sqli, $_POST['id']);
        
        if(is_numeric($id)){
            $id = intval($id);
            $query = "SELECT * FROM `ciudades` WHERE id = $id";
            $result = $sqli->query($query);

            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>ID</th><th>Nombre</th><th>Abreviatura</th><th>Capital</th></tr>";
                while ($fila = $result->fetch_assoc()) {
                    echo "<tr><td>".$fila['id']."</td><td>".$fila['Nombre']."</td><td>".$fila['abreviatura']."</td><td>".$fila['Capital']."</td></tr>";
                }
                echo  "</table>";
            } else {
                ?>
                <span class="label label-warning">No se encontraron resultados</span>
                <?php
            }

            $sqli->close();
        } else {
            echo "ID inválido";
        }
    } else {
       
     
    }
}


?>

<?php



function agregardatos(){
    $sqli = new mysqli("localhost", "root", "", "pruebaapidb");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = mysqli_real_escape_string($sqli, $_POST['Nombre']);
        $abreviatura = mysqli_real_escape_string($sqli, $_POST['abreviatura']);
        $Capital = mysqli_real_escape_string($sqli, $_POST['Capital']);

        // Validar que los campos no estén vacíos
        if (!empty($nombre) && !empty($abreviatura) && !empty($Capital)) {
            $my_query = "INSERT INTO ciudades (Nombre, abreviatura, Capital) VALUES ('$nombre', '$abreviatura', '$Capital')";

            $sqli->query($my_query);

            if ($sqli->affected_rows > 0) {
                

                ?>
                <span class="label label-success">Datos insertados correctamente</span>
                <?php
            } else {
                ?>
                <span class="label label-danger">Rellene los datos porfavor</span>
                <?php
            }
        } else {
           ?>
           <span class="label label-danger">Rellene los datos porfavor</span>
           <?php
        }

        $sqli->close();
    }
}

?>
<?php


function filtrarpornombre(){
      

    $sqli = new mysqli("localhost", "root", "", "pruebaapidb");
  
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nombre'])) {
        $nombre = mysqli_real_escape_string( $sqli, $_POST['nombre']);
        $query = "SELECT * FROM `ciudades` WHERE Nombre='$nombre';";
        $result = $sqli->query($query);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Nombre</th><th>Abreviatura</th><th>Capital</th></tr>";
            while ($fila = $result->fetch_assoc()) {
                echo "<tr><td>".$fila['id']."</td><td>".$fila['Nombre']."</td><td>".$fila['abreviatura']."</td><td>".$fila['Capital']."</td></tr>";
            }
            echo  "</table>";
        } else {
            ?>
           <span class="label label-warning">No se encontraron resultados</span>
           <?php
        }

        $sqli->close();
    }
}

?>
</html>


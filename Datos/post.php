<?php
include 'filtrarId.php';
?>

<html>
<head>
<title>Insertar datos</title>

<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


</head>
<body>
<script> 
if (window.history.replaceState) { 

  window.history.replaceState(null, null, window.location.href);
}   
</script>
<label class="ine">Buscar por nombre:</label>
<br>
<form class="form1" id="form1" action="post.php" method="post">
  <input class="in1" type="text" name="nombre" >
  <input  class="btn btn-outline-primary" form="form1" type="submit" value="Buscar">
 <div class="tbl1"><?php filtrarpornombre(); ?></div>
</form>
<br>
<label>Insertar datos:<br></label>
<br>
<form class="form2" id="form2" action="post.php" method="post">
  <label>Nombre:</label> <input class="inn" type="text" name="Nombre"><br>
  <label>Abreviatura:</label><input class="ina" type="text" name="abreviatura"><br>
  <label>Capital:</label><input class="inc" type="text" name="Capital"><br>
  <br>
  <input id = "btn" class="btn btn-outline-primary"  form="form2" type="submit" name="submit" value="Enviar">
  <div class="insertar">
  <?php 
  if (isset($_POST['submit'])) {
  // Verificar si se ha enviado el segundo formulario
  if ($_POST['submit'] == 'Enviar') {
    agregardatos();
  }}
   ?>
  </div>
</form>
<br>
<label>Buscar por id:<br></label>
<br>
<form class="form3" id="form3" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <input type="number" name="id" >
  <input class="btn btn-outline-primary"   form="form3" type="submit" name="submit" value="ID">

  <div class="tbl2"> <?php 
if (isset($_POST['submit'])) {
    // Verificar si se ha enviado el segundo formulario
  
    if ($_POST['submit'] == 'ID') {
      filtrarporid();
    }
  }
  ?>
  </div>
</form>

</body>
</html>
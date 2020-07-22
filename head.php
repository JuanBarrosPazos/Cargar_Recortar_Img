<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>Cargar y recortar imágenes usando PHP y jQuery</title>

<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="assets/sticky-footer-navbar.css" rel="stylesheet">

<link rel="stylesheet" href="css/jquery.Jcrop.min.css" type="text/css" />
<script src="js/jquery.min.js"></script>
<script src="js/jquery.Jcrop.js"></script>
<script src="js/jquery.Jcrop.min.js"></script>

<link rel="stylesheet" href="css/juan.css" type="text/css" />

</head>

<body>

<!-- Begin page content -->

<div class="container">
  <div class="row">
    <div class="col-12 col-md-12"> 
      <!-- Contenido -->
<?php
$imagePath = "imagenes/imginicial.jpg";
/* */
if (!empty($uploadedImagePath)) {
    global $imagePath;
    global $uploadedImagePath;
    $imagePath = $uploadedImagePath;
}

global $text;
echo  $text;

?>

<!--   -------------------   -->
<!--   -------------------   -->

  <div class="alert alert-primary" role="alert">
      <form id="uploadForm" action="" method="post" enctype="multipart/form-data" class="form-inline">
          <div class="form-group mb-2">
              <input class="form-control-file" name="userImage" id="userImage" type="file">
          </div>
          <div class="form-group mx-sm-3 mb-2">
          <input type="submit" name="cargar" class="btn btn-primary" value="Cargar Imagen"> 
          </div>
      </form>
</div>

<!--   -------------------   -->
<!--   -------------------   -->

<div <?php global $juan; echo $juan;?> id="juan">
  <form class="form-inline ">
    <div class="form-group mb-2">
        <ul class="list-group">
          <li class="list-group-item">
      <div>
          <img src="<?php echo $imagePath; ?>" id="RecortarImagen" class="img" />
          <br />
      </div>
          </li>
        </ul>
    </div>
    <div class="form-group mb-2" style="padding:20px;" >
      <input class="btn btn-primary" type='button' id="recortar" value='Recortar Imagen'>
    </div>
  </form>
</div> <!-- Fin div Juan -->

<!--   -------------------   -->
<!--   -------------------   -->

<div class="form-inline" <?php global $juan; echo $juan;?> >
  <div class="form-group mb-2" <?php global $juan; echo $juan;?> > 
    <!--      -->     
    <?php 
        global $juanul;
        echo $juanul;
    ?>

    <!-- 
      <ul class="list-group" >
        <li class="list-group-item" >
          <div>
            <img src="#" id="imgrecortada_img" style="display: none;">
          </div>
        </li>
      </ul>
      -->
      
   </div>
</div> 

<!--   -------------------   -->
<!--   -------------------   -->

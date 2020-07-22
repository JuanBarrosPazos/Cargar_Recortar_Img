<?php
if (! empty($_POST["cargar"])) {
    if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
        $targetPath = "imagenes/" . $_FILES['userImage']['name'];
        if (move_uploaded_file($_FILES['userImage']['tmp_name'], $targetPath)) {
            $uploadedImagePath = $targetPath;
        }
    }
}
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>Cargar y recortar imágenes usando PHP y jQuery - BaulPHP</title>

<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="assets/sticky-footer-navbar.css" rel="stylesheet">

<link rel="stylesheet" href="css/jquery.Jcrop.min.css" type="text/css" />
<script src="js/jquery.min.js"></script>
<script src="js/jquery.Jcrop.min.js"></script>
</head>

<body>
<header> 
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"> <a class="navbar-brand" href="#">BaulPHP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active"> <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a> </li>
      </ul>
      <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Busqueda</button>
      </form>
    </div>
  </nav>
</header>

<!-- Begin page content -->

<div class="container">
  <h3 class="mt-5">Cargar y recortar imágenes usando PHP y jQuery</h3>
  <hr>
  <div class="row">
    <div class="col-12 col-md-12"> 
      <!-- Contenido -->
<?php
$imagePath = "imagenes/ImgOriginal.jpg";
if (! empty($uploadedImagePath)) {
    $imagePath = $uploadedImagePath;
}
?>
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


<form class="form-inline">
  <div class="form-group mb-2">
  <ul class="list-group">
    <li class="list-group-item">
    <div><img src="<?php echo $imagePath; ?>" id="RecortarImagen" class="img" /><br /></div>
    </li>
  </ul>
  </div>
<div class="form-group mb-2" style="padding:20px;"><input class="btn btn-primary" type='button' id="recortar" value='Recortar Imagen'></div>
</form>





    
<div class="form-inline">
  <div class="form-group mb-2">        
   
  <ul class="list-group">
    <li class="list-group-item">
    <div><img src="#" id="imgrecortada_img" style="display: none;"></div>
    </li>
  </ul>
   </div>
</div> 

<script type="text/javascript">
  $(document).ready(function(){
        var size;
        $('#RecortarImagen').Jcrop({
          aspectRatio: 1,
          onSelect: function(c){
           size = {x:c.x,y:c.y,w:c.w,h:c.h};
           $("#recortar").css("visibility", "visible");     
           $("#descargar").css("visibility", "visible");     
          }
        });
     
        $("#recortar").click(function(){
            var img = $("#RecortarImagen").attr('src');
            $("#imgrecortada_img").show();
            $("#descargar").show();
            $("#imgrecortada_img").attr('src','ImagenRecortada.php?x='+size.x+'&y='+size.y+'&w='+size.w+'&h='+size.h+'&img='+img);
        });
  });
</script>


      <!-- Fin Contenido --> 
    </div>
  </div>
  <!-- Fin row --> 

  
</div>
<!-- Fin container -->
<footer class="footer">
  <div class="container"> <span class="text-muted">
    <p>Códigos <a href="https://www.baulphp.com/" target="_blank">BaulPHP</a></p>
    </span> </div>
</footer>

<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

<script src="dist/js/bootstrap.min.js"></script>
</body>
</html>
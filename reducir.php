<?php
session_start();
?>

<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" >
<meta name="description" content="">
<meta name="author" content="">
<title>Cargar y recortar imágenes usando PHP y jQuery</title>

<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="assets/sticky-footer-navbar.css" rel="stylesheet">

<link rel="stylesheet" href="css/jquery.Jcrop.min.css" type="text/css" />

<link rel="stylesheet" href="css/juan.css" type="text/css" />

</head>

<body>

<!-- Begin page content -->

<div class="container">
  <div class="row">
    <div class="col-12 col-md-12"> 
      <!-- Contenido -->

<!-- -------------- -->
<!-- -------------- -->

<?php

if (isset($_POST['recortaw'])){

    //echo "* Extension: ".$_POST['extension']."<br>";
    //echo "* Ancho: ".$_POST['ancho']."<br>";
    //echo "* Ancho: ".$_POST['alto']."<br>";
    global $ext;
    $ext = $_POST['extension'];
    global $ancho;
    $ancho = $_POST['ancho'];
    global $alto;
    $alto = $_POST['alto'];

    global $anchomax;
    $anchomax = 900;

    //echo "* Ancho: ".$ancho." * Alto: ".$alto."<br>";
    // ancho == 100%
    // diferencia == x
    global $anchodif;
    $anchodif = ($ancho - $anchomax);
    global $porcent;
    $porcent = round((($anchodif * 100)/$ancho),2);
    //echo " % ".$porcent;
    global $anchonew;
    $anchonew = ($ancho - $anchodif);
    //echo " New Width: ".$anchonew;
    global $altonew;
    $altonew = ($alto - (($alto * $porcent)/100));
    $altonew = round($altonew,0);
    //echo " New Heigth: ".$altonew;

    if(($ext == 'jpg')||($ext == 'jpeg')||($ext == '')){
        $img= imagecreatefromjpeg("temp/img.".$ext);}
        elseif($ext == 'png'){ $img= imagecreatefrompng("temp/img.".$ext); }
            $dst = ImageCreateTrueColor($anchonew, $altonew);
            imagecopyresampled($dst, $img, 0, 0, 0, 0, $anchonew, $altonew, $ancho, $alto);
        if(($ext == 'jpg')||($ext == 'jpeg')||($ext == '')){
                global $imgname;
                $imgname = "img.jpg";
                imagejpeg($dst,'imagenes/'.$imgname);
              }
        elseif($ext == 'png'){ 
                  global $imgname;
                  $imgname = "img.".$ext;
                  imagepng($dst,'imagenes/'.$imgname);
    }else{ }
    global $imgname;
    print("<div class='alert alert-primary' role='alert'  >
                <form id='reducida' action='index.php'  method='post' class='form-inline'>
            <div class='form-group mx-sm-3 mb-2' >
            <h5>
                Reduccion: ".$porcent." %<br>
                New Width: ".$anchonew."<br>
                New Heigth: ".$altonew."<br>
                Extension: ".$ext."<br>
            </h5>
                <img src='imagenes/".$imgname."' class=\"jimg\">
        <input type='hidden' name='reducida' value=1 >
        <input type='submit' name='confirmar' class='btn btn-primary' value='CONTINUAR CON LA EDICION'>
            </div>
                </form>
            </div>");

}elseif (isset($_POST['recortah'])){

    global $ext;
    $ext = $_POST['extension'];
    global $ancho;
    $ancho = $_POST['ancho'];
    global $alto;
    $alto = $_POST['alto'];

    global $altomax;
    $altomax = 900;

    global $altodif;
    $altodif = ($alto - $altomax);
    global $porcent;
    $porcent = round((($altodif * 100)/$alto),2);
    global $altonew;
    $altonew = ($alto - $altodif);

    global $anchonew;
    $anchonew = ($ancho - (($ancho * $porcent)/100));
    $anchonew = round($anchonew,0);

    if(($ext == 'jpg')||($ext == 'jpeg')||($ext == '')){
            $img= imagecreatefromjpeg("temp/img.".$ext);}
        elseif($ext == 'png'){ $img= imagecreatefrompng("temp/img.".$ext); }
            $dst = ImageCreateTrueColor($anchonew, $altonew);
            imagecopyresampled($dst, $img, 0, 0, 0, 0, $anchonew, $altonew, $ancho, $alto);
        if(($ext == 'jpg')||($ext == 'jpeg')||($ext == '')){
                global $imgname;
                $imgname = "img.jpg";
                imagejpeg($dst,'imagenes/'.$imgname);
              }
        elseif($ext == 'png'){ 
                  global $imgname;
                  $imgname = "img.".$ext;
                  imagepng($dst,'imagenes/'.$imgname);
    }else{ }
        global $imgname;
        print("<div class='alert alert-primary' role='alert'  >
                    <form id='reducida' action='index.php'  method='post' class='form-inline'>
                <div class='form-group mx-sm-3 mb-2' >
                <h5>
                    Reduccion: ".$porcent." %<br>
                    New Width: ".$anchonew."<br>
                    New Heigth: ".$altonew."<br>
                    Extension: ".$ext."<br>
                </h5>
                    <img src='imagenes/".$imgname."' class=\"jimgh\">
            <input type='hidden' name='reducida' value=1 >
            <input type='submit' name='confirmar' class='btn btn-primary' value='CONTINUAR CON LA EDICION'>
                </div>
                    </form>
                </div>");

}else{ print("<div class='alert alert-primary' role='alert'>
                <form id='reducida' action='index.php'  method='post' class='form-inline'>
            <div class='form-group mx-sm-3 mb-2' >
        <input type='hidden' name='reducida' value=1 >
        <input type='submit' name='confirmar' class='btn btn-primary' value='VOLVER NO HAY PARAMETROS'>
            </div>
                </form>
            </div>");
    }

?>

<!-- -------------- -->
<!-- -------------- -->

      <!-- Fin Contenido --> 
      </div>
  </div>
  <!-- Fin row --> 

  
</div>
<!-- Fin container -->

    </body>
</html>
<?php
session_start();

global $juanul;
$juanul = '<ul class="list-group" >
            <li class="list-group-item" >
              <div>
                <img src="#" id="imgrecortada_img" style="display: none;">
              </div>
            </li>
          </ul>';

// 0 INI EMPTY POST CARGAR
if (!empty($_POST["cargar"])) {

      // PARAMETROS INICIALES VALIDACION
      // LIMITE 1000 KBytes (1Megabyte) * 1000 BYTES 
        global $limitimg;
        $limitimg = 1000 * 1000;
      // SIZE DEL ARCHIVO EN KB
        global $tamanho;
        $tamanho = $_FILES['userImage']['size'];
      // SIZE DEL ARCHIVO EN MB
        $myimg = $_FILES["userImage"]["name"];
        global $myimg;
        $myimg = str_replace(" ","_",$myimg);
  
        global $extension;
        $extension = substr($_FILES["userImage"]["name"],-4);
        $extension = strtolower($extension);
  
        $ext_img = array('.jpg','.png','jpeg');
        $ext_imgok = in_array($extension, $ext_img);

      // CAMPO SIN VALOR
      if($tamanho == 0){
        global $text;
        $text = "<div class='alert alert-primary' role='alert'>
                        <h5>SELECCIONE UN ARCHIVO</h5>
                </div>";

        global $juan;
        $juan = "class=\"joculta\"";
        global $juanul;
        $juanul = "";

        global $targetPath;
        $targetPath = "imagenes/imginicial.jpg.zzz";
        global $uploadedImagePath;
        $uploadedImagePath = $targetPath;

      }
      // NO SE ADMITE LA EXTENSION
      elseif(!$ext_imgok){
              global $text;
              $text = "<div class='alert alert-primary' role='alert'>
                              <h5>TIPO DE ARCHIVO NO PERMITIDO</h5>
                      </div>";
  
              global $juan;
              $juan = "class=\"joculta\"";
              global $juanul;
              $juanul = "";
  
              global $targetPath;
              $targetPath = "imagenes/imginicial.jpg.zzz";
              global $uploadedImagePath;
              $uploadedImagePath = $targetPath;
          } // FIN VALIDA EXTENSION
  
      // SI ES IMGEN LIMITE DE SIZE
      elseif(($ext_imgok)&&($tamanho > $limitimg)){
          global $text;
          $text = "<div class='alert alert-primary' role='alert'>
                          <h5>SIZE ARCHIVO MAYOR DE 2MB</h5>
                  </div>";
  
          global $juan;
          $juan = "class=\"joculta\"";
          global $juanul;
          $juanul = "";
  
          global $targetPath;
          $targetPath = "imagenes/imginicial.jpg.zzz";
          global $uploadedImagePath;
          $uploadedImagePath = $targetPath;
  }// FIN LIMITE SIZE
  
    // 1 INI IS UPLOADED FILE
  elseif (is_uploaded_file($_FILES['userImage']['tmp_name'])) {

      global $ext;
      $ext = substr($_FILES['userImage']['name'],-4,4);
      $_SESSION['imgext'] = str_replace(".","",$ext);
      //echo $_SESSION['imgext'];

      //$targetPath = "imagenes/".$_FILES['userImage']['name'];
      //global $targetPath;
      $targetPath = "imagenes/img.".$_SESSION['imgext'];

      //global $juan;
      $juan = "class=\"jver\"";
    

      // 2 INI IS UPLOADED FILE TARGEPATH
      if (move_uploaded_file($_FILES['userImage']['tmp_name'], $targetPath)) {

        global $targetPath;
        @copy($targetPath, "temp/img.".$_SESSION['imgext']);

        //global $uploadedImagePath;
        //$uploadedImagePath = $targetPath;

        global $ancho;
        global $alto;
        list($ancho, $alto, $tipo, $atributos) = getimagesize("temp/img.".$_SESSION['imgext']);

        global $anchomax;
        $anchomax = 900;
        global $altomax;
        $altomax = 900;
    
    if($ancho > $anchomax){ 

      global $text;
      $text = "<div class='alert alert-primary' role='alert'>
            <form id='confirma' action='reducir.php'  method='post' class='form-inline'>
                <div class='form-group mx-sm-3 mb-2'>
            <h5>
                Heigth: ".$alto."<br>
                Width: ".$ancho."<br>
                Nombre: ".$_FILES['userImage']['name']."<br>
            </h5>
                <img src='temp/img.".$_SESSION['imgext']."' class=\"jimg\">
  <input type='hidden' name='extension' value=".@$_SESSION['imgext'].">
  <input type='hidden' name='ancho' value=".@$ancho.">
  <input type='hidden' name='alto' value=".@$alto.">
  <input type='hidden' name='recortaw' value=1 >
  <input type='submit' name='confirmar' class='btn btn-primary' value='IMAGEN MUY ANCHA REDUCE IMAGEN'> 
                </div>
            </form>
        </div>";

        global $juan;
        $juan = "class=\"joculta\"";
        global $juanul;
        $juanul = "";

      /**/
      global $targetPath;
      $targetPath = "imagenes/imginicial.jpg.zzz";
      global $uploadedImagePath;
      $uploadedImagePath = $targetPath;

  }elseif($alto > $altomax){ 

    global $text;
    $text = "<div class='alert alert-primary' role='alert'>
          <form id='confirma' action='reducir.php'  method='post' class='form-inline'>
              <div class='form-group mx-sm-3 mb-2'>
          <h5>
              Heigth: ".$alto."<br>
              Width: ".$ancho."<br>
              Nombre: ".$_FILES['userImage']['name']."<br>
          </h5>
              <img src='temp/img.".$_SESSION['imgext']."' class=\"jimgh\">
<input type='hidden' name='extension' value=".@$_SESSION['imgext'].">
<input type='hidden' name='ancho' value=".@$ancho.">
<input type='hidden' name='alto' value=".@$alto.">
<input type='hidden' name='recortah' value=1 >
<input type='submit' name='confirmar' class='btn btn-primary' value='IMAGEN MUY ALTA REDUCE IMAGEN'> 
              </div>
          </form>
      </div>";

      global $juan;
      $juan = "class=\"joculta\"";
      global $juanul;
      $juanul = "";

    /**/
    global $targetPath;
    $targetPath = "imagenes/imginicial.jpg.zzz";
    global $uploadedImagePath;
    $uploadedImagePath = $targetPath;

}else{ global $text;
       $text = "";
       global $juan;
       $juan = "class=\"jver\"";
       global $juanul;
       $juanul = '<ul class="list-group" >
                    <li class="list-group-item" >
                      <div>
                        <img src="#" id="imgrecortada_img" style="display: none;">
                      </div>
                    </li>
                  </ul>';
  
      global $targetPath;
      $targetPath = "imagenes/img.".$_SESSION['imgext'];
      global $uploadedImagePath;
      $uploadedImagePath = $targetPath;

        }

      } // 2 FIN IS UPLOADED FILE TARGEPATH

    } // 1 FIN IS UPLOADED FILE
} // 0 FIN EMPTY POST CARGAR

// SE HA REALIZADO LA REDUCCION
elseif(isset($_POST['reducida'])){
      global $targetPath;
      $targetPath = "imagenes/img.".$_SESSION['imgext'];
      global $uploadedImagePath;
      $uploadedImagePath = $targetPath;
      global $juan;
      $juan = "class=\"jver\"";
      global $juanul;
      $juanul = '<ul class="list-group" >
                  <li class="list-group-item" >
                    <div>
                      <img src="#" id="imgrecortada_img" style="display: none;">
                    </div>
                  </li>
                </ul>';

}

elseif((!isset($_POST['cargar']))||(!isset($_POST['recortar']))||(!isset($_POST['reducida']))){
  global $text;
  $text = "";
  global $juan;
  $juan = "class=\"joculta\"";
  global $juanul;
  $juanul = "";
}
elseif((isset($_POST['cargar']))||(isset($_POST['recortar']))){   
        global $text;
        $text = "";
        global $juan;
        $juan = "class=\"jver\"";
        global $juanul;
        $juanul = '<ul class="list-group" >
                    <li class="list-group-item" >
                      <div>
                        <img src="#" id="imgrecortada_img" style="display: none;">
                      </div>
                    </li>
                  </ul>';
                  }

require 'head.php';

?>

<!-- MEJOR NO TOCAR NADA -->
<script type="text/javascript">
  $(document).ready(function(){
        var size;
        $('#RecortarImagen').Jcrop({
          // DEFINE EL ASPECTO DEL RECORTE
          // 1 CUADRO PROPORCIONAL SIN DEFINIR LIBRE
          //aspectRatio: 1,
          onSelect: function(c){
           size = {x:c.x,y:c.y,w:c.w,h:c.h};
           // hidden oculta boton recortar
           $("#recortar").css("visibility", "visible");     
           //$("#descargar").css("visibility", "visible");     
          }
        });
     
        $("#recortar").click(function(){
            var img = $("#RecortarImagen").attr('src');
            // hide oculta imagen recortada
            $("#imgrecortada_img").show();
            //$("#descargar").show();
            // modifica el atributo src en la imagen recortada
            $("#imgrecortada_img").attr('src','ImagenRecortada.php?x='+size.x+'&y='+size.y+'&w='+size.w+'&h='+size.h+'&img='+img);
        });
  });
</script>
<!-- MEJOR NO TOCAR NADA -->


      <!-- Fin Contenido --> 
    </div>
  </div>
  <!-- Fin row --> 

  
</div>
<!-- Fin container -->

<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

<script src="dist/js/bootstrap.min.js"></script>
</body>
</html>
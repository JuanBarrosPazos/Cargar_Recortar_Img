<?php

if (! empty($_POST["cargar"])) {
    if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {

      global $ext;
      $ext = substr($_FILES['userImage']['name'],-4,4);
      $_SESSION['imgext'] = str_replace(".","",$ext);

      //$targetPath = "imagenes/".$_FILES['userImage']['name'];
      $targetPath = "imagenes/img.".$_SESSION['imgext'];

      if (move_uploaded_file($_FILES['userImage']['tmp_name'], $targetPath)) {

            global $uploadedImagePath;
            $uploadedImagePath = $targetPath;

        }

    } // FIN IS UPLOADED FILE
} // FIN EMPTY POST CARGAR

require 'head.php';

?>


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

<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

<script src="dist/js/bootstrap.min.js"></script>
</body>
</html>
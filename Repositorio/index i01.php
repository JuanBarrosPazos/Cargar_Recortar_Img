<?php

if (! empty($_POST["cargar"])) {
    if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {

        $targetPath = "imagenes/".$_FILES['userImage']['name'];

        if (move_uploaded_file($_FILES['userImage']['tmp_name'], $targetPath)) {
            $uploadedImagePath = $targetPath;
        }
    }
}

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
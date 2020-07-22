<?php
session_start();


if(($_SESSION['imgext'] == 'jpg')||($_SESSION['imgext'] == 'jpeg')||($_SESSION['imgext'] == '')){
                            $img_r = imagecreatefromjpeg($_GET['img']);}
elseif($_SESSION['imgext'] == 'png'){ $img_r = imagecreatefrompng($_GET['img']); }
              
  $dst_r = ImageCreateTrueColor( $_GET['w'], $_GET['h'] );
 
  imagecopyresampled($dst_r, $img_r, 0, 0, $_GET['x'], $_GET['y'], $_GET['w'], $_GET['h'], $_GET['w'],$_GET['h']);
  
 if(($_SESSION['imgext'] == 'jpg')||($_SESSION['imgext'] == 'jpeg')||($_SESSION['imgext'] == '')){
                                      global $imgname;
                                      $imgname = "img.jpg";
                                      header('Content-type: image/jpeg');
                                      imagejpeg($dst_r);
                                      imagejpeg($dst_r,'imagenes/r_'.$imgname);
                                    }
  elseif($_SESSION['imgext'] == 'png'){ header('Content-type: image/png');
                                        global $imgname;
                                        $imgname = "img.".$_SESSION['imgext'];
                                        imagepng($dst_r);
                                        imagepng($dst_r,'imagenes/r_'.$imgname);
                                      }
  else{ }                                    


  //header('Content-type: image/jpeg');
  //imagejpeg($dst_r);

  exit;
?>
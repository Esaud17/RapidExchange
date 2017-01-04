<?php
  require_once '../config/app/php/define.php';
  require_once '../config/app/'.sct_dirs;

  use  sub_ct\sct_dir;

  if(isset($_REQUEST['url'])&&$_REQUEST['url']=='dirs')
  {  $scanner = new sct_dir();
      switch($_REQUEST['act'])
      {
        case 'list':
          $data = file_get_contents('../config/assets/js/expeciones.json');
          $data = json_decode($data,true);
          $directorios = $scanner->scandirectoris($data);
          echo json_encode($directorios);
        break;
        case 'download':
          $fichero = $_REQUEST['file'];
          $directorios = $scanner->downloadfile($fichero);
          echo json_encode($directorios);
        break;
      }
  }
?>

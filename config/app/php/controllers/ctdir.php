<?php
    namespace sub_ct;

    class sct_dir
    {
        public function scandirectoris($data)
        {
          $exepciones = $data['expeciones'];
          $directorios = array();
          $directorio = opendir(realpath("."));
          while ($archivo = readdir($directorio))
          {
              if (is_file($archivo))
              {
                     if(!in_array($archivo,$exepciones))
                     {
                       $directorios['data'][]= array('dir'=>$archivo);
                     }
              }
          }
          if(isset($directorios['data']))
          {$directorios['success']='OK';}
          else
          {$directorios['success']='ERROR';}
          return $directorios;
        }

        public function downloadfile($fichero){
            if (file_exists($fichero)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="'.basename($fichero).'"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: '.filesize($fichero));
                readfile($fichero);
                exit;
            }

        }
    }
?>

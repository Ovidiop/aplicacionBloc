<?php
        function lista_archivos($carpeta)
        {
            $direccionamiento = explode("/", $carpeta);
            if (is_dir($carpeta)) {
                if ($dir = opendir($carpeta)) {
                    
                    while (($archivo = readdir($dir)) !== false) {
                        if ($archivo != '.' && $archivo != '..') {
                            $nuevaRuta = $carpeta . $archivo . '/';
                            echo '<tr><td>';
                            if (is_dir($nuevaRuta)) {
                                echo '<b>' . $nuevaRuta . '</b>';
                                lista_archivos($nuevaRuta);
                            } else {
                                echo $archivo;
                            }
                            echo '</td><td><center><a role="button" href="descargar_archivo.php?directorio='.$direccionamiento[2].'&file='. $archivo .'">Descargar</a></center></td></tr>';
                        }
                    }
                    closedir($dir);
                }
            } else {
                echo 'No Existe la carpeta';
            }
        }
            lista_archivos("../directorios/$directorio/");
            
        ?>
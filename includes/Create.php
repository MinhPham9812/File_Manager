<?php
    class Create{
        public static function createFile($parentDir, $fileName, $data=''){
            $path = _DATA_DIR . $parentDir;
            $filePath = $path . '/' . $fileName;
            file_put_contents($filePath, $data);
        }
    }
?>
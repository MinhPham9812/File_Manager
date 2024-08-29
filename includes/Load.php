<?php
     class Load{
        //$parentPath is used to store the path of the current parent directory you are working
        private $parentPath = null;
        public function scanDir($parentDir = ''){
            if(empty($parentDir)){
                $path = _DATA_DIR; //const _DATA_DIR = 'data/';
            } else {
                $path = _DATA_DIR . '/' . $parentDir;
            }

            $this->parentPath = $path; // 'data/'

            // scandir() is function scan folder and return  all list file and folder
            $dataScan = scandir($path);

            if(isset($dataScan[0])){
                unset($dataScan[0]);
            }
            if(isset($dataScan[1])){
                unset($dataScan[1]);
            }
            return $dataScan;
        }

        // check type file or folder
        public function isType($path){
            // is_dir() is function check if path is folder or not
            if(is_dir($path)){
                return 'folder';
            }

            return 'file';
        }

        // create correct path. example: $fileName = folder1, $path = data/folder1
        public function getPath($fileName){
            $path = $this->parentPath;
            $path = $path . '/' . $fileName;
            return $path;
        }

        public function getTypeIcon($fileName){
            $path = $this->getPath($fileName);
            return ($this->isType($path)=='folder') ? '<i class="fa fa-folder-o" aria-hidden="true"></i>' 
            : '<i class="fa fa-file" aria-hidden="true"></i>';
        }

        public function getSize($fileName){
            $path = $this->getPath($fileName);
            if($this->isType($path) == 'file'){
                
                // filesize() is function get size of file
                $size = filesize($path);
                return round($size/1024,2) . ' KB';
            }
            return 'folder';
        }

        public function getTimeModify($fileName, $format = 'Y-m-d H:i:s'){
            $path = $this->getPath($fileName);
            if($this->isType($path) == 'file'){
                return date($format, filectime($path));
            }
            return 'folder';
        }

        public function getPermission($fileName){
            $path = $this->getPath($fileName);
            
            $result =  fileperms($path);
            
            $result = substr(sprintf('%o', $result), -4);
            return $result;
        }

        public function getOwner($fileName){
            $path = $this->getPath($fileName);
            // fileowner() is function get owner of file
            $ownerID = fileowner($path);
            //posix_getpwuid() is function get infomation of owner
            $ownerInfo = posix_getpwuid($ownerID);
            // get name owner
            $ownerName = $ownerInfo['name'];
            return $ownerName;
        }
    }
<?php


class LocateFile
{

    private $FILE_LIST = array();
    private $DIR_LIST = array();


    private function recursionList()
    {

        $tmp_dir = $this->DIR_LIST;
        $this->DIR_LIST = array();

        for ($i = 0, $l = count($tmp_dir); $i< $l; $i++) {


            $dir = $tmp_dir[$i];

            if (is_dir($dir)) {

                if ($dh = opendir($dir)) {
                    while (($file = readdir($dh)) !== false) {

                        $name = $dir."/".$file;
                        if (is_file($name)) {

                          $this->FILE_LIST[] = $name; 

                        } elseif (is_dir($name)) {
                            if ($file !== "." && $file !== "..") {
                                $this->DIR_LIST[] = $name; 
                            }
                        }

                    }
                    closedir($dh);
                }

            }

        }

    }


    function getFileList($dir)
    {

        if (is_dir($dir)) {
            $this->DIR_LIST[] = $dir;
            while (!empty($this->DIR_LIST)) {
                $this->recursionList();
            }

        } else {
            exit("No dir");
        }


        return $this->FILE_LIST;
    }
}

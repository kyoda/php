<?php

$tag = new TAG;
$tag->aiueo();

$a = $tag->getTag();
var_dump($a);

class TAG
{

  private $LINE = 1;
  private $TAG = array();
  private $TAG_NUM = 0;
  private $OFFSET = 0;
  private $LINE_SIZE = array();


  function getTag()
  {
    return $this->TAG;
  }

  function aiueo()
  {


    $f = fopen("index.html", "rb");
    if ($f) {

      $LINE_SIZE[0] = 0;
      while (($b = fgets($f, 4096)) !== false) {

        $this->LINE_SIZE[$this->LINE] = strlen($b);

        $tag_start = 0;
        $tag_end = 0;
        $tag_name = null;

        if ($this->OFFSET < $this->LINE_SIZE[$this->LINE]) { 
          $i = strpos($b, "<", $this->OFFSET);
          if ($i !== false) {

            $j = strpos($b,">",$i);
            $slash = substr($b, $i + 1, 1);
            if ($slash === "/") {
              $tag = array();
              $tmp = split(" ",substr($b, $i + 1, $j - $i + 1));
              $tag_name = $tmp[0];
              $tag = array_reverse($this->TAG);
              $c = 0;
              $l = count($this->TAG);
              foreach ($tag as $val) {
                if ($val['name'] === $tag_name) {
                  if ($i > 0) {
                    $t = $l - $c - 1;
                    $this->TAG[$t]['line_end'] = $this->LINE;
                    $this->TAG[$t]['offset_end'] = $i - 1;
                    break;
                  } else {
                    $this->TAG[$t]['line_end'] = $this->LINE - 1;
                    $this->TAG[$t]['offset_end'] = $this->LINE_SIZE[$LINE - 1] - 1;
                    break;
                  }

                }
                $c++;
              }
              $this->OFFSET = $j + 1;

            } else {
              if ($j !== false) {

                $tmp = split(" ",substr($b, $i, $j - $i + 1));
                $tag_name = $tmp[0];
                $tag_start = $j + 1;
                $this->TAG[$this->TAG_NUM] = array('name' => $tag_name, 'line_start' => $this->LINE, 'offset_start' => $tag_start, 'line_end' => null, 'offset_end' => null);
                $this->TAG_NUM++;
                $this->OFFSET = $j + 1;
              }
            }

          } else {
            $this->OFFSET = 0;
            $this->LINE++;
          }

        } else { 
          $this->OFFSET = 0;
          $this->LINE++;
        }

      } //while fgets


      fclose($f);
    } // if($f)

  } //aiueo 



} //class




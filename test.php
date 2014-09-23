<?php

$tag = new TAG;
$tag->fileScan();

$a = $tag->contentSet();
var_dump($a);

class TAG
{

  private $LINE = 1;
  private $TAG = array();
  private $TAG_NUM = 0;
  private $OFFSET = 0;
  private $LINE_SIZE = array();
  private $BUFFER = array();
  private $FILE = "index.html";


  function getTag()
  {
    return $this->TAG;
  }

  function getLineSize()
  {
    return $this->LINE_SIZE;
  }

  function contentSet()
  {
    for ($i = 0, $l = count($this->TAG); $i < $l; $i++) {
      $this->TAG[$i]['content'] = $this->getContent($this->TAG[$i]['line_start'], $this->TAG[$i]['offset_start'], $this->TAG[$i]['line_end'], $this->TAG[$i]['offset_end']);
    }

    return $this->TAG;
  }


  function getContent($line_start, $offset_start, $line_end, $offset_end)
  {
    $content = null;
    if ($line_start === $line_end) {
      $content = substr($this->BUFFER[$line_start], $offset_start, $offset_end - $offset_start + 1);
    } else {

      foreach (range($line_start, $line_end) as $n) {
        if ($n === $line_start) {
          $content .= substr($this->BUFFER[$n], $offset_start, strlen($this->BUFFER[$line_start]) - $offset_start);
        } elseif ($n === $line_end) {
          $content .= substr($this->BUFFER[$n], 0, $offset_end);
        } else {
          $content .= $this->BUFFER[$n];
        }
      }
    }

    return $content;
  }

  function fileScan()
  {


    $f = fopen($this->FILE, "rb");
    if ($f) {

      $LINE_SIZE[0] = 0;
      while (($b = fgets($f, 4096)) !== false) {

        $this->BUFFER[$this->LINE] = $b;
        $this->LINE_SIZE[$this->LINE] = strlen($b);

        $tag_start = 0;
        $tag_end = 0;
        $line_start = $this->LINE;
        $tag_name = null;
        $nextline_flag = false;

        while (!$nextline_flag) {

          if ($this->OFFSET < $this->LINE_SIZE[$this->LINE]) { 
            $i = strpos($b, "<", $this->OFFSET);
            if ($i !== false) {

              $j = strpos($b,">",$i);
              $slash = substr($b, $i + 1, 1);
              if ($slash === "/") {
                $tag = array();
                $tag_name = trim(substr($b, $i + 2, $j - $i - 2));
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
                      $t = $l - $c - 1;
                      $this->TAG[$t]['line_end'] = $this->LINE - 1;
                      $this->TAG[$t]['offset_end'] = $this->LINE_SIZE[$this->LINE - 1] - 1;
                      break;
                    }

                  }
                  
                  $c++;
                }
                $this->OFFSET = $j + 1;

              } else {
                if ($j !== false) {

                  $tmp = split(" ",substr($b, $i + 1, $j - $i - 1));
                  $tag_name = $tmp[0];
                  $lf = substr($b, $j + 1, 1);
                  if ($lf === "\n") {
                    $tag_start = 0;
                    $line_start = $this->LINE + 1;
                  } else {
                    $tag_start = $j + 1;
                    $line_start = $this->LINE;
                  }

                  $this->TAG[$this->TAG_NUM] = array('name' => $tag_name, 'line_start' => $line_start, 'offset_start' => $tag_start, 'line_end' => null, 'offset_end' => null);
                  $this->TAG_NUM++;
                  $this->OFFSET = $j + 1;
                }
              }

            } else { // strpos <
              $this->OFFSET = 0;
              $this->LINE++;
              $nextline_flag = true;
            }

          } else { 
            $this->OFFSET = 0;
            $this->LINE++;
            $nextline_flag = true;
          }

        } // while nextline_flag

      } //while fgets


      fclose($f);
    } // if($f)

  } //aiueo 



} //class




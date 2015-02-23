<?php

if (! function_exists('parse_text')) {
  function parse_text($text, $arr)
  {
    $parsed_text = preg_replace_callback('/{(.*?)}/', function($m) use ($arr) {
      if ( isset($arr[$m[1]]) ) {
        return $arr[$m[1]];
      }
    }, $text);

    return $parsed_text;
  }
}
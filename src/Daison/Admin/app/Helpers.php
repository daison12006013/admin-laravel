<?php

if (! function_exists('link_resource')) {
  function link_resource($url, $arr)
  {
    $link = preg_replace_callback('/{(.*?)}/', function($match) use ($arr) {
      if ( isset($arr[$match[1]]) ) {
        return $arr[$match[1]];
      }
    }, $url);

    return $link;
  }
}
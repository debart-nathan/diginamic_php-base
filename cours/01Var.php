<?php

function test ($fn) {
    echo "in test\n";
    return $fn();
  }
  
  function callback () {
    echo "in callback\n";
  }
  

  echo test(function () { callback(); });
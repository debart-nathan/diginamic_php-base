<?php

function genLipsum($num = 1, $type = 'paras', $lorem = false) {
    $url = "http://www.lipsum.com/feed/xml?amount=$num&what=$type&start=".($lorem?'yes':'no');
    return simplexml_load_file($url)->lipsum;
}
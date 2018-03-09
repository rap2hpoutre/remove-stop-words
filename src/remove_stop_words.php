<?php
namespace Rap2hpoutre\RemoveStopWords;


function remove_stop_words($words, $lang = 'en') {
    $stop_words = require(__DIR__ . '/locale/' . $lang . '.php');
    foreach ($stop_words as &$word) {
        $word = '/\b' . preg_quote($word, '/') . '\b/iu';
    }
    return preg_replace($stop_words, '', $words); 
}
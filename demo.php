<?php

use paslandau\GermanStemmer\GermanStemmer;

require_once __DIR__ . '/demo-bootstrap.php';

$word = "vergnüglich";
echo "$word => " . GermanStemmer::stem($word);
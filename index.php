<?php
require_once __DIR__ . '/vendor/autoload.php';

$imagine = new \Imagine\Gd\Imagine();
$imagine->open('cat.jpg')
    ->thumbnail(new \Imagine\Image\Box(500, 500))
    ->save("resize_cat.jpg");
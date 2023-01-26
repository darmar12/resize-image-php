<?php
require_once __DIR__ . '/vendor/autoload.php';

// $imagine->open('cat.jpg')
//     ->thumbnail(new \Imagine\Image\Box(500, 500))
//     ->save("resize_cat.jpg");

class resizeImage {
    public $imagine;
    public function __construct() {
        $this->imagine = new \Imagine\Gd\Imagine();
    }

    public function resizeAll($dir) {
        $arrExts = ["jpg", "jpeg", "png", "webp"];
        $files = scandir($dir);
        foreach($files as $key => $value) {
            $path = realpath($dir . '/' . $value);
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            if(in_array($ext, $arrExts)) {
                $this->imagine->open($path)
                              ->thumbnail(new \Imagine\Image\Box(500, 500))
                              ->save($path);
            }
        }
    }
}

$resizer = new resizeImage();
$resizer->resizeAll('./images');
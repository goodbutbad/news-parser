<?php
namespace App\News;

class News {
    public $date;
    public $title;
    public $url;
    public $image;

    public function __construct($date, $title, $url, $image) {
        $this->date = $date;
        $this->title = $title;
        $this->url = $url;
        $this->image = $image;
    }
}

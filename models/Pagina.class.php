<?php
class Pagina {
    public $title = "";
    public $content = "";
    public $css = "";
    public $embeddedStyle = "";
    public $scriptElements = "";

    public function addCSS( $href ){
        $this->css .= "<link href='$href' rel='stylesheet' />";
    }
}

<?php

namespace HtmlController;

 class Page{
    public $header = "<html><head></head><body>";
    public $footer = "</body></html>";
  
    public function buildPage($body){
      
      echo $this->header . $body . $this->footer;
    }
  }



?>
<?php  

namespace HtmlController;

class Index extends Page{
    public $content = '<form method=\"post\" action=\"index.php\"><input type="textarea" name="new_tweet"/><input type="Submit"/></form>';

    function __construct(){
      echo $this->buildPage($this->content);
    }
}



?>
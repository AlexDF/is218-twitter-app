<?php  

namespace HtmlController;

class Index extends Page{

    

    public $content = '<form method="post" action="index.php?pagetype=Index&post_tweet=TRUE"><textarea name="new_tweet" rows=7 cols=28></textarea><input type="Submit"/></form>';

    function __construct(){
      $twitter = new \TwitterController\Twitter;
      if( isset($_GET['post_tweet']) ){
        //$twitter = new \TwitterController\Twitter;
        $twitter->postTweet($_POST['new_tweet']);
      }

      $this->content .= $twitter->getTweets(10);

      echo $this->buildPage($this->content);
    }
}



?>
<?php  

namespace HtmlController;

class Index extends Page{

    public $content;


    function displayTweets(){
      $tweets = $this->twitter->getTweets(10);
      $output = '<table cellpadding="5"><tr><th>User</th><th>Tweet</th><th>Time Created</th></tr>';
      foreach( $tweets as $tweet ){
        $output .= '<tr><td>' . $tweet['user']['name'] . '</td><td>' .  $tweet['text'] . '</td><td>' . $tweet['created_at'] . '</td></tr>'; 
      }
      
      $output .= '</table>';
      return $output;
      
    }


    function __construct(){

      $this->twitter = new \TwitterController\Twitter;
      if( isset($_GET['post_tweet']) ){
        $this->twitter->postTweet($_POST['new_tweet']);
      }

      $this->content = '<form method="post" action="index.php?pagetype=Index&post_tweet=TRUE">' .
        '<textarea name="new_tweet" rows=7 cols=28 placeholder="Post a new tweet here.">' .
        '</textarea><br><br><input type="Submit"/></form><br><br>';

      $this->content .= $this->displayTweets();

      $this->buildPage($this->content);
    }
}



?>
<?php

namespace TwitterController;

interface TwitterInterface{
  public function getTweets($count, $user);
  public function postTweet();
}

class Twitter implements TwitterInterface{
  
  private $settings = array(
    'oauth_access_token' => "2849321127-VTfYJfhIobqLa1CUKSMDaQwv9tRs9bRB0uWGLdq",
    'oauth_access_token_secret' => "fMmAUgvf0w3RbFDMYrgaBHTucR9Otom5IsDk3nW5W5vCW",
    'consumer_key' => "cR6YV752XhP8lgvcfEwcQUO4y",
    'consumer_secret' => "4ZEV91gYD9wxUbprqeUX9lQcaea1IxDu74EAKUBFhRz1nJ1z7L"
  );

  public function getTweets($count, $user=NULL){
    $user_timeline_url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
    $get_field = '?count=' . $count;

    if($user == NULL){
      $get_field .= '&screen_name=' . $user;
    }
 
    $tweets = json_decode($this->connection->setGetfield($get_field)
                 ->buildOauth($user_timeline_url, "GET")
                 ->performRequest(), $assoc = TRUE);

    return $tweets;
  }

  public function postTweet(){


  }


  function __construct(){
    $this->connection = new TwitterAPIExchange($this->settings);
  }

}


?>
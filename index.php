<?php
  ini_set('display_startup_errors',1);
  ini_set('display_errors',1);
  error_reporting(-1);

  function my_autoloader($class){
    $filepath = 'class/' . str_replace("\\", "/", $class) . '.class.php';
    include $filepath;
  }

  spl_autoload_register('my_autoloader');

  require_once('lib/TwitterAPIExchange.php');
  include 'class/Twitter.class.php';

  $twitter = new Twitter;
  $tweets = $twitter->getTweets(10);
  print_r($tweets);
  
  /*
  $settings = array(
    'oauth_access_token' => "2849321127-VTfYJfhIobqLa1CUKSMDaQwv9tRs9bRB0uWGLdq",
    'oauth_access_token_secret' => "fMmAUgvf0w3RbFDMYrgaBHTucR9Otom5IsDk3nW5W5vCW",
    'consumer_key' => "cR6YV752XhP8lgvcfEwcQUO4y",
    'consumer_secret' => "4ZEV91gYD9wxUbprqeUX9lQcaea1IxDu74EAKUBFhRz1nJ1z7L"
  );

  $user_timeline_url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
  $request_method = "GET";

  $get_field = '?count=10';

  $twitter = new TwitterAPIExchange($settings);
  $string = json_decode($twitter->setGetfield($get_field)
               ->buildOauth($user_timeline_url, $request_method)
               ->performRequest(), $assoc = TRUE);
  print_r($string);



  $post_tweet_url = "https://api.twitter.com/1.1/statuses/update.json";
  $request_method = "POST";
  $tweet = "TwitterAPI Exchange is very easy to use!";
  $post_fields = array(
    'status' => $tweet
  );
  
  $twitter = new TwitterAPIExchange($settings);
  $twitter->buildOauth($post_tweet_url, $request_method)
          ->setPostfields($post_fields)
          ->performRequest();
*/



?>
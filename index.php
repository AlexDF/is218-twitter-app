<?php
  ini_set('display_startup_errors',1);
  ini_set('display_errors',1);
  error_reporting(-1);

  function my_autoloader($class){
    $filepath = 'class/' . str_replace("\\", "/", $class) . '.class.php';
    include $filepath;
  }

  spl_autoload_register('my_autoloader');

  HtmlController\Html::render($_GET['pagetype']);
  
  
  

/*
  $twitter = new TwitterController\Twitter;
  $tweets = $twitter->getTweets(10);
  print_r($tweets);
  
  
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
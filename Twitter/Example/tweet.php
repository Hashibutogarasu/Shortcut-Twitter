<?php

require "../../vendor/abraham/twitteroauth/autoload.php"; #twitteroauth/autoload.phpへの相対パス
use Abraham\TwitterOAuth\TwitterOAuth;

const CK = "****************";  #API Key
const CS = "****************";  #API Key Secret
const AT = "****************";  #Access Token
const ATS = "****************"; #Access Token Secret

const Key = "Password"; #Password

$get_key = "";
if (isset($_GET['key'])){
    $get_key = htmlspecialchars($_GET["key"]);
}

$tweet_text = "";
if (isset($_GET['tweet_text'])){
    $tweet_text = htmlspecialchars($_GET["tweet_text"]);
}

if($get_key == Key && $tweet_text != ""){
    $connect = new TwitterOAuth(CK, CS, AT, ATS);
    
    // ツイートを投稿
    $result = $connect->post(
        'statuses/update',
        array(
            'status' => $tweet_text
        )
    );

    echo("Connected.");
}
else{
    echo("Not connected.");
}

#リクエストの一例：http://192.168.0.100/Twitter/Example/tweet.php/?Key=Password&tweet_text=テスト

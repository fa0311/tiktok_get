<?php
    require "tiktok_get/main.php";
    $url = $_GET["url"]; //ここにurl
    $tiktok = new tiktok_get($url);
    var_dump([
        "avatar" => $tiktok->avatar(),
        "username" => $tiktok->username(),
        "nickname" => $tiktok->nickname(),
        "birthday" => $tiktok->birthday(),
        "tag" => $tiktok->tag(),
        "text" => $tiktok->text(),
        "like" => $tiktok->like(),
        "comment" => $tiktok->comment(),
        "video" => $tiktok->video(),
        "music_name" => $tiktok->music_name(),
        "music_link" => $tiktok->music_link(),
        "all" => $tiktok->all()
    ]);

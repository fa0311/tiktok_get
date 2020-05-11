<?php
class tiktok_get
{
    function __construct($url)
    {
        $this->url = $url;
        $this->delimiter = "~";
        $this->get_html();
    }
    function get_html()
    {
        touch('tmp_cookie.tmp');
        $headers = array(
            "HTTP/1.0",
            "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,;q=0.8",
            "Accept-Encoding:gzip ,deflate",
            "Accept-Language:ja,en-us;q=0.7,en;q=0.3",
            "Connection:keep-alive",
            "User-Agent:Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:26.0) Gecko/20100101 Firefox/26.0"
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_ENCODING, "gzip");
        curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp_cookie.tmp");
        curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp_cookie.tmp");

        $this->html = curl_exec($ch);
        curl_close($ch);
        unlink("tmp_cookie.tmp");
    }
    function pattern_match($pattern, $num = 1)
    {
        preg_match($this->delimiter . $pattern . $this->delimiter, $this->html, $video_url);
        return $video_url[$num];
    }
    function pattern_match_all($pattern, $num = 1)
    {
        preg_match_all($this->delimiter . $pattern . $this->delimiter, $this->html, $video_url);
        return $video_url[$num];
    }
    function all()
    {
        return [
            "avatar" => $this->avatar(),
            "username" => $this->username(),
            "nickname" => $this->nickname(),
            "birthday" => $this->birthday(),
            "tag" => $this->tag(),
            "text" => $this->text(),
            "like" => $this->like(),
            "comment" => $this->comment(),
            "video" => $this->video(),
            "music_name" => $this->music_name(),
            "music_link" => $this->music_link()
        ];
    }
    function avatar()
    {
        return $this->pattern_match('<div class="jsx-3957300394 jsx-203739285 jsx-2517402465 avatar"><img src="(.+?)" style="background-image:;border-radius:" class="jsx-3957300394 jsx-203739285 jsx-2517402465 avatar-wrapper round"/>');
    }
    function username()
    {
        return $this->pattern_match('<h2 class="jsx-1978767526 user-username">(.+?)</h2>');
    }
    function nickname()
    {
        return $this->pattern_match('<h2 class="jsx-1978767526 user-nickname">(.+?)<span class="jsx-1978767526"> · </span>(.+?)</h2>');
    }
    function birthday()
    {
        return $this->pattern_match('<h2 class="jsx-1978767526 user-nickname">(.+?)<span class="jsx-1978767526"> · </span>(.+?)</h2>', 2);
    }
    function tag()
    {
        return $this->pattern_match_all('<a href="/tag/.+?"><strong>#(.+?)<!-- --> </strong></a>');
    }
    function text()
    {
        return $this->pattern_match('<h1 class="jsx-1305565323 video-meta-title"><strong>(.+?)</strong>');
    }
    function like()
    {
        return $this->pattern_match('<strong class="jsx-319872377 like-text">(.+?)</strong>');
    }
    function comment()
    {
        return $this->pattern_match('<strong class="jsx-319872377 comment-text">(.+?)</strong>');
    }
    function video()
    {
        return $this->pattern_match('<video playsinline="" loop="" src="(.+?)\?(.+?)" preload="metadata" class="jsx-3382097194 horizontal video-player"></video>');
    }
    function music_name()
    {
        return $this->pattern_match('<h2 class="jsx-2923443248 music-info"><a href="(.+?)" class="jsx-2923443248">(.+?)</a></h2>');
    }
    function music_link()
    {
        return "https://www.tiktok.com" . $this->pattern_match('<h2 class="jsx-2923443248 music-info"><a href="(.+?)" class="jsx-2923443248">(.+?)</a></h2>', 2);
    }
}

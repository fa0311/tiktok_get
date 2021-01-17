# tiktok_get
tiktokをスクレイピングする<br>

まず
```php
$tiktok = new tiktok_get('https://www.tiktok.com/#####/video/########');
```
でインスタンスを作ります<br>
<br>
`$tiktok->get_html()`でhtmlを取得し直します<br>
`$tiktok->delimiter`に正規表現のデリミタが代入されています デフォルトは~です<br>
<br>
`$tiktok->all()`で全て返します<br>
`$tiktok->avatar()`でプロフィール画像のurlを返します<br>
`$tiktok->username()`でユーザーネームを返します<br>
`$tiktok->nickname()`でニックネームを返します<br>
`$tiktok->birthday()`で誕生日を返します<br>
`$tiktok->tag()`でタグを返します(返り値は配列です)<br>
`$tiktok->text()`で本文を返します<br>
`$tiktok->like()`でいいね数を返します<br>
`$tiktok->comment()`でコメント数を返します<br>
`$tiktok->video()`で動画のurlを返します<br>
`$tiktok->music_name()`で音楽の名前の返します<br>
`$tiktok->music_link()`で音楽のリンクを返します<br>

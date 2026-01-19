> [!NOTE]
> 注意：これは過去の学習記録です。
> 本リポジトリは、私が学習初期（小学生〜中学生）に作成した成果物を、成長の記録として保存・公開しているアーカイブです。
> 当時の環境や理解の範囲で書かれており、現在の私の設計方針・開発プロセス・品質基準を示すものではありません。
> このリポジトリは「当時の状態そのもの」を残すことに意味があるため、修正・改修・削除は行いません。
> 本リポジトリ単体のコードベースから定量的・網羅的な評価を行うことは推奨しません。
> 必要な場合は、GitHubプロフィールの pinned リポジトリ、直近のコミット履歴、OSS貢献など、複数リポジトリを横断して総合的に参照してください。

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

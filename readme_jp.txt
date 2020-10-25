
linkモジュール

サイトのリンク方法とサイトの最新情報(RSSとJS)の使用方法を公開する為のモジュールです。

最新情報表示(RSSとJS)は、以下のモジュールに対応しています。
（該当モジュールがインストールしてあれば自動で認識してくれるはずです。）
 * news			(RSS & JS)
 * newbb		(RSS & JS)
 * mylinks		(RSS & JS)
 * mydownloads	(RSS & JS)
 * ipboard		(RSS & JS)
 * weblog		(RSS)

XP Syndication をベースに以下の変更・追加をしてあります。
 * weblogの追加
 * バナー画像表示の追加
 * index.php表示ルーチンの簡略化
 * 日本語ファイルの作成

** インストール方法
link/cache/　　　　　　　　　　 パーミッション777
link/cache/内の全ファイル　 パーミッション666

バナー画像のURLの設定は、index.php内の、
(/* - config - */)部分を直接編集してください。
（手抜きモードでごめんなさい）  
# みんなのランニングコース

自分のお気に入りのランニングコースを登録したり、走ってみたいランニングコースを探せるwebアプリです。

## アプリのキャプチャ

<img src="https://user-images.githubusercontent.com/88647501/188262835-819b8e41-db74-4280-99e1-4b9fcc489cdc.PNG" alt="image">

## アプリの機能

- ランニングコースの共有
- ランニングコースの場所をクラスターマップで表示
- ユーザー登録、ログイン、ログアウト
- ランニングコースの新規登録
- ランニングコースの編集
- 画像のアップロード
- レビューの投稿

## 使用している技術、ツール
- バックエンド
    - PHP 8.0.20
    - Laravel 8.83.23
- フロントエンド
    - HTML
    - CSS
    - javascript
    - Bootstrap
- インフラ
    - mysql 8.0.28
    - AWS(EC2,RDS,Route53,ELB,S3,ACM)
- その他
    - git(gitHub)
    - Mapbox(地図)
    - Unsplash(写真)
    - ICOOON MONO(アイコン画像)
    - Lucidchart(ER図)
    - Visual Studio Code

## AWS構成図
作成にはVisual Studio Codeの拡張機能(Draw.io Integration)を利用しました。

<img src="https://user-images.githubusercontent.com/88647501/188262931-6100a351-c219-44d4-9cee-9511c449a602.PNG" alt="aws">

## ER図
作成にはLucidchartを利用しました。

<img src="https://user-images.githubusercontent.com/88647501/188262890-b8646951-55d5-41cf-8310-9840e9f5976c.PNG" alt="er">

## 今後の課題
デプロイさせることを優先したため課題ばかりですが、今後取り組みたいことは以下のことです。
- ユーザーのメールアドレス変更
- パスワード再設定
- ランニングコースの検索機能
- 地図上でルートから距離を計測する機能(Mapboxの機能を利用)
- ルートの保存、表示
- バリデーションの追加、修正
- エラーハンドリング

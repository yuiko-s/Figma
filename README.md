# アプリケーション名：Furima

##環境構築
【前提条件】

Docker Desktop がインストール済み
WSL2 (Ubuntu) が有効化済み
Git がインストール済み

【セットアップ】
・リポジトリ
https://github.com/yuiko-s/Figma.git
cd furima/src

・docker compose up -d --build
・docker exec -it laravel_app bash
・composer install
　npm install && npm run dev
・cp .env.example .env
    APP_NAME=Furima
    APP_ENV=local
    APP_KEY=        
    APP_DEBUG=true
    APP_URL=http://localhost

    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=laravel_db
    DB_USERNAME=laravel_user
    DB_PASSWORD=laravel_pass
　php artisan key:generate
・php artisan migrate
・php artisan db:seed

##使用技術

言語: PHP 8.x

フレームワーク: Laravel 8.83.29

データベース: MySQL 8.0.26

Webサーバー: Nginx

コンテナ: Docker / Docker Compose

フロントエンド: Blade (Laravel), CSS (BEM記法), JavaScript

パッケージ管理: Composer / npm

認証: Laravel Auth 

開発環境
OS: Windows11 + WSL2 (Ubuntu 24.04.2 LTS)

IDE: Visual Studio Code (Remote - WSL)

バージョン管理: Git / GitHub

phpMyadmin：　　http://localhost:8080/

##ER図
https://github.com/yuiko-s/Furima/commit/7d4b732f5c821c6941f21068ee014f97cc70f787

##URL
http://localhost/
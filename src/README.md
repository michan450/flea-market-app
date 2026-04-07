# frima-market-app

# 環境構築
dockerビルド
.git clone git@github.com:michan450/flea-market-app.git
.docker-compose up -d --build

laravel環境構築
.docker-compose exec php bash
.composer instsll
.cp .env.example.env,環境変数を適宣変更
.php artisan migrate
.php artisan db:seed

開発環境

## 使用技術（実行環境）
・php 8.1-fpm
・laravel 10.50.2
・mysql 8.0.26
・nginx 1.21.1

## ER図
src配下に記載
![alt text](END.png)
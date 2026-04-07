# フリマアプリ

## 環境構築

### Dockerビルド

```bash
git clone git@github.com:michan450/flea-market-app.git
cd flea-market-app
docker-compose up -d --build
```

### Laravel環境構築

```bash
docker-compose exec php bash
composer install
cp .env.example .env
```

※ .envのDB設定などを適宜変更してください

```bash
php artisan key:generate
php artisan migrate
php artisan db:seed
```

---

## 使用技術（実行環境）

* PHP 8.1-fpm
* Laravel 10.50.2
* MySQL 8.0.26
* Nginx 1.21.1

---

## ER図

src配下に記載

![ER図](END.png)

## 実装機能
- ユーザー登録 / ログイン
- 商品一覧表示
- 商品詳細表示
- いいね機能
- コメント機能
- 購入機能
- プロフィール編集
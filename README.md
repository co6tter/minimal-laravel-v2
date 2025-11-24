# minimal-laravel-v2

## Overview

Laravel 12をベースとしたミニマルなブログアプリケーション。投稿（Post）とコメント（Comment）のCRUD操作を実装しており、Laravel学習やプロトタイピングに最適な構成となっています。

## Tech Stack

- **Backend**: Laravel 12.0 (PHP 8.2+)
- **Database**: SQLite
- **Frontend**: Vite 6.2 + Tailwind CSS 4.0
- **Development Tools**:
  - Laravel Sail (Docker環境)
  - Laravel Pint (コードスタイル)
  - PHPUnit (テスト)

## Setup

### 必要な環境
- PHP 8.2以上
- Composer
- Node.js & npm

### インストール手順

```bash
# 依存関係のインストール
composer install
npm install

# 環境設定ファイルのコピー
cp .env.example .env

# アプリケーションキーの生成
php artisan key:generate

# データベースの作成とマイグレーション
touch database/database.sqlite
php artisan migrate

# フロントエンドのビルド
npm run build
```

## Usage

### 開発サーバーの起動

#### 方法1: 個別に起動
```bash
# バックエンドサーバー
php artisan serve

# フロントエンド（別ターミナル）
npm run dev
```

#### 方法2: 全サービスを一括起動
```bash
composer dev
```
このコマンドで以下が同時に起動します：
- Webサーバー（http://localhost:8000）
- キューワーカー
- ログモニタリング（Laravel Pail）
- Vite開発サーバー

### テストの実行

```bash
composer test
```

### Docker環境（Laravel Sail）

```bash
# Sail環境の起動
./vendor/bin/sail up -d

# Sailを使用したコマンド実行
./vendor/bin/sail artisan migrate
./vendor/bin/sail composer install
```

## Directory Structure

```
.
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── PostController.php      # 投稿の管理
│   │       └── CommentController.php   # コメントの管理
│   ├── Models/
│   │   ├── User.php
│   │   ├── Post.php                    # 投稿モデル
│   │   └── Comment.php                 # コメントモデル
│   └── Providers/
├── database/
│   ├── migrations/                      # データベースマイグレーション
│   └── factories/                       # テストデータ生成用ファクトリ
├── resources/
│   └── views/                           # Bladeテンプレート
├── routes/
│   ├── web.php                          # Webルート定義
│   └── console.php                      # Artisanコマンド定義
├── tests/                               # テストファイル
├── composer.json                        # PHP依存関係
├── package.json                         # Node.js依存関係
├── vite.config.js                       # Vite設定
└── docker-compose.yml                   # Docker環境設定
```

## License

This repository is for personal/private use only.

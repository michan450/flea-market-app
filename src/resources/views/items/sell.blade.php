<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sell.css') }}">
    <title>flea-market-app</title>
</head>
<body>
    <header class="header">
    <div class="header__inner">
      <a class="header__logo" href="/">
        COACHTECH
      </a>
        <div class="search-wrapper">
          <form action="{{ route('products.index') }}" method="GET">
            <input 
            type="text"
            name="keyword"
            placeholder="何かお探しですか？"
            class="search-input"
            value="{{ request('keyword') }}"
            >
          </form>
        </div>
         <nav class="header__nav">
          
            @auth
            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
              <button type="submit" class="logout-btn">ログアウト</button>
            </form>
            
            
              
            <a href="{{ route('mypage') }}" class="header-link">マイページ</a>

            <a href="{{ route('items.sell') }}" class="btn-outlined">
                出品
            </a>
            @endauth
         </nav>
    </div>

  </header>
  <main>
    <div class="container">
      <h1 class="title">商品の出品</h1>

      <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
         @csrf

      <div class="image-upload">
        <label for="imageInput" class="image-box">
         <span class="image-label">商品画像</span>
         <span class="image-btn">画像を選択</span>
         <input type="file" id="imageInput" name="image" hidden>
        </label>
      </div>

      <h2 class="section-title">商品の詳細</h2>


      <div class="form-group">
        <label class="form-label">カテゴリー</label>

        <div class="category-buttons">
           @foreach([
           'ファッション','家電','インテリア','レディース','メンズ','コスメ','本','ゲーム',
           'スポーツ','キッチン','ハンドメイド','アクセサリー','おもちゃ','ベビー・キッズ'
           ] as $category)
    
              <label class="category-btn">
               <input type="checkbox" name="categories[]" value="{{ $category }}">
                 <span>{{ $category }}</span>
              </label>

           @endforeach
        </div>
      </div>
      <div class="form-group">
         <label class="form-label">商品の状態</label>

            <select name="condition" class="form-select">
              <option value="">選択してください</option>
              <option value="新品">新品</option>
              <option value="目立った傷や汚れなし">目立った傷や汚れなし</option>
              <option value="やや傷や汚れあり">やや傷や汚れあり</option>
              <option value="傷や汚れあり">傷や汚れあり</option>
            </select>
      </div>
      <h2 class="section-title">商品名と説明</h2>

      <div class="form-group">
         <label class="form-label">商品名</label>
            <input type="text" name="name" class="form-input">
      </div>

      <div class="form-group">
         <label class="form-label">ブランド名</label>
            <input type="text" name="brand" class="form-input">
      </div>

      <div class="form-group">
         <label class="form-label">商品の説明</label>
            <textarea name="description" class="form-textarea"></textarea>
      </div>

      <div class="form-group">
         <label class="form-label">販売価格</label>
         <div class="price-input-wrapper">
            <span class="yen-mark">￥</span>
            <input type="number" name="price" class="form-input">
         </div>
      </div>
        
         <button type="submit" class="sell-btn">出品する</button>
        </form>
    </div>
    
</main>
</body>
</html>
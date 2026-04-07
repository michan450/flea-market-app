<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
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
  <div class="home">
    <div class="mylist">
       <a href="{{ route('items.index') }}">
         <h2 class="moji_1">おすすめ</h2>
       </a>

       <a href="{{ route('items.index', ['tab' => 'mylist']) }}">
         <h2 class="moji_2">マイリスト</h2>
       </a>
    </div>
    
    <div class="items-container">
     @foreach ($items as $item)
        <div class="item-card">
          <a href="{{ route('products.show', $item->id) }}">
              <img src="{{ $item->image }}" alt="{{ $item->name }}">
          </a>
          @if($item->purchase)
             <span class="sold">Sold</span>
          @endif
              <h3 class="item-name">{{ $item->name }}</h3>
              <p class="description">{{ $item->description }}</p>
              <p class="price">{{ number_format($item->price) }}円</p>
            
        </div>
      @endforeach
    </div>

    
  </main>
</body>
</html>
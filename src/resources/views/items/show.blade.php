<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
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
            @endauth
              
            <a href="{{ route('profile.edit') }}" class="header-link">マイページ</a>
         </nav>
    </div>
</header>
<main>
    <div class="product-detail">
  <div class="product-detail__inner">

    
    <div class="product-detail__image">
      <img src="{{ $item->image }}" alt="{{ $item->name }}">
      @if (!empty($item->is_sold))
        <span class="sold-label">Sold</span>
      @endif
    </div>

    
    <div class="product-detail__info">
      <h1 class="product-title">{{ $item->name }}</h1>
         <p class="product-brand">
           {{ $item->brand }}
         </p>
         <p class="brand_name">
         <strong>ブランド名</strong>
         {{ $item->brand_name }}
         </p>
         <p class="product-price">￥{{ number_format($item->price) }} （税込）</p>

        <div class="product-meta">
           <div class="meta-items">
            
             <div class="meta-item">

                @auth
                  @php
                     $liked = auth()->user()
                     ->likes
                     ->contains('item_id', $item->id);
                   @endphp

               <form action="{{ route('items.like', $item->id) }}" method="POST">
                   @csrf
                <button type="submit" class="like-btn">
                  @if(auth()->check() && $item->likes->where('user_id', auth()->id())->count())
                  ❤️
                  @else
                  🤍
                  @endif
               </button>

             <span>{{ $item->likes->count() }}</span>
              </form>
              @endauth
             </div>

             <div class="meta-item">
               <span class="icon">💬</span>
               <span>{{ $item->comments_count }}</span>
             </div>
           </div>

           <a href="{{ route('purchase.show', $item->id) }}" class="buy-btn">
                 購入手続きへ
           </a>
        </div>

      <div class="product-description">
        <h3>商品説明</h3>
          <p>{{ $item->description }}</p>
      </div>

      <div class="product-information">
        <h3>商品情報</h3>
         <p class="info-row">
          <span class="info-label">カテゴリー：</span>
          <span class="info-content">
            @foreach($item->categories as $category)
              <span class="category-tag">{{ $category->name }}</span>
            @endforeach
          </span>
         </p>

         <p class="info-row">
            <span class="info-label">商品の状態：</span>
            <span class="info-content">
              @if($item->status == 1)
              良好
              @elseif($item->status == 2)
              目立った傷や汚れなし
              @elseif($item->status == 3)
              やや傷や汚れあり
              @else
              状態が悪い
              @endif
            </span>
         </p>
       </div>
          <div class="comments">
            <h3>コメント ({{ $item->comments_count }})</h3>

            @foreach($item->comments as $comment)

              <div class="comment-user">
                  <img src="{{ asset('storage/' . $comment->user->profile_image) }}" class="user-icon">
                  <span class="user-name">{{ $comment->user->name }}</span>
              </div>

            <div class="comment-text">
              {{ $comment->comment }}
            </div>

            @endforeach

          </div>

        <div class="comment-form">

          <h3>商品へのコメント</h3>

            <form action="{{ route('comments.store', $item->id) }}" method="POST">
             @csrf

             <textarea name="comment" class="comment-box" ></textarea>

             <button type="submit" class="comment-btn">コメントを送信</button>

            </form>

        </div>

</div>
  </div>
</div>
</main>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
    <title>COACHTECH</title>
</head>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const select = document.getElementById('payment-select');
    const display = document.getElementById('payment-display');

    if (select && display) {
      select.addEventListener('change', function() {
        display.textContent = this.value;
      });
    }
  });
</script>
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
              
            <a href="{{ route('mypage.profile') }}" class="header-link">マイページ</a>
         </nav>
      </div>
  </header>
  <main>
    <div class="purchase-container">
      <div class="purchase-left">

        <div class="purchase-section">
        

          <div class="item-info">
            <img src="{{ $item->image }}" class="item-image">
      
              <div class="item-text">
                <h3 class="item_name">{{ $item->name }}</h3>
                <h3 class="item_price">￥{{ number_format($item->price) }}</h3>
              </div>
          </div>
        </div>

  
        <div class="purchase-section center-section">
          <div class="center-section-inner">
            <h3>支払い方法</h3>

           
            <select id="payment-select" name="payment">
              <option value="クレジットカード">クレジットカード</option>
              <option value="コンビニ払い">コンビニ払い</option>
            </select>
          </div>
        </div>

  
        <div class="purchase-section center-section">
          <div class="center-section-inner">
               <h3>配送先</h3>
              <div class="address-inner">
                <p>〒{{ $user->profile->postal_code }}</p>
                <p>{{ $user->profile->address }}</p>
              </div>

                <a href="{{ route('purchase.address.edit', $item) }}" class="address-edit">
                   変更する
                </a>
          </div>
      
        
        
      </div>
    </div>
      <div class="purchase-right">
        <div class="order-box">
          <p>商品代金：￥{{ number_format($item->price) }}</p>
          <p>
            支払い方法：<span id="payment-display">クレジットカード</span>
          </p>
        </div>
        <form action="{{ route('purchase.store', $item->id) }}" method="POST">
           @csrf
           <button type="submit" class="purchase-btn">購入する</button>
        </form>

      </div>
    </div>
     
    </div>
  </main>
</body>
</html>
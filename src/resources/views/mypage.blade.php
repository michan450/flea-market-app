<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
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
    <div class="mypage-container">
      <div class="profile-header">

        <div class="profile-left">
          @if($user->profile && $user->profile->profile_image)
            <img src="{{ $user->profile->profile_image ?? '/images/default.png' }}" class="profile-image">
          @else
            <div class="profile-placeholder"></div>
          @endif
          <p class="user-name">{{ $user->name }}</p>
        </div>

   
        <div class="profile-right">
          <a href="{{ route('profile.edit') }}" class="edit-btn">
          プロフィール編集
          </a>
        </div>

      </div>

       <div class="tab-menu">
         <span class="tab active" onclick="showTab('sell', this)">出品した商品</span>
         <span class="tab" onclick="showTab('buy', this)">購入した商品</span>
       </div>

          <div id="sell" class="tab-content active">

               <div class="item-container">
                 @forelse($items as $item)
                   <div class="item-card">
                     <img src="{{ $item->image }}">
                     <p>{{ $item->name }}</p>
                   </div>
                   @empty
                   <p>出品商品はありません</p>
                   @endforelse
               </div>
          </div>

          <div id="buy" class="tab-content">

              <div class="item-container">
                 @forelse($purchases as $purchase)
                  <div class="item-card">
                     <img src="{{ $purchase->item->image }}">
                     <p>{{ $purchase->item->name }}</p>
                  </div>
                  @empty
                  <p>購入商品はありません</p>
                  @endforelse
              </div>
          </div>

       </div>
    </div>

<script>
function showTab(tabName) {
  document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));
  document.querySelectorAll('.tab').forEach(el => el.classList.remove('active'));

  document.getElementById(tabName).classList.add('active');
  event.target.classList.add('active');
}
</script>
  </main>
</body>
</html>
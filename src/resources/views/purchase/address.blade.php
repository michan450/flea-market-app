<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/address.css') }}">
    <title>flea-market-app</title>
</head>
<body>
    <header class="header">
    <div class="header__inner">
      <a class="header__logo" href="/">
        COACHTECH
      </a>
        <div class="search-wrapper">
            <input type="text" placeholder="何かお探しですか？" class="search-input">
        </div>
        <nav class="header__nav">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                  @csrf
            </form>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="header-link">ログアウト</a>
            <a href="{{ route('mypage.profile') }}" class="header-link">マイページ</a>
        {{--<a href="{{ route('products.create') }}" class="header-link btn-outlined">出品</a>--}}
        </nav>
    </div>
  </header>

 <main>
    <div class="profile">

     <div class="title">
       <h1>住所の変更</h1>
     </div>
      <form action="{{ route('purchase.address.update', $item) }}" method="POST">
        @csrf
      

        <label class="label">郵便番号</label>
        <input type="text" class="text" name="postal_code" value="{{ old('postal_code') }}">
        @error('postal_code')
        <p class="error">{{ $message }}</p>
        @enderror

        <label class="label">住所</label>
        <input type="text" class="text" name="address" value="{{ old('address') }}">
        @error('address')
        <p class="error">{{ $message }}</p>
        @enderror

        <label class="label">建物名</label>
        <input type="text" class="text" name="building" value="{{ old('building') }}">
        @error('building')
        <p class="error">{{ $message }}</p>
        @enderror
    
        <button type="submit" class="create-btn">更新する</button>
      </form>
    </div>
  </main>
</body>
</html>
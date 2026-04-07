<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
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
            <a href="{{ route('profile.edit') }}" class="header-link">マイページ</a>
        {{--<a href="{{ route('products.create') }}" class="header-link btn-outlined">出品</a>--}}
        </nav>
    </div>
  </header>

 <main>
    <div class="profile">

     <div class="title">
       <h1>プロフィール設定</h1>
     </div>
         <form action="{{ isset($profile) ? route('profile.update') : route('profile.store') }}"
                method="POST"
                enctype="multipart/form-data">
            @csrf

            @if(isset($profile))
                @method('PUT')
            @endif
      
        <label class="label" for="profile_image">プロフィール画像</label>
        <input type="file" id="profile_image" name="profile_image" accept="image/*" onchange="previewImage(event)">
        @error('profile_image')
        <p class="error">{{ $message }}</p>
        @enderror

        <div class="image-preview">
            <img id="preview" src="" alt="画像プレビュー" style="display:none; max-width:150px; border-radius:50%; margin-bottom:10px;">
        </div>

        <label class="label">ユーザー名</label>
        <input type="text" class="text" name="name" value="{{ old('name', $user->name ?? '') }}">
        @error('name')
        <p class="error">{{ $message }}</p>
        @enderror

        <label class="label">郵便番号</label>
        <input type="text" class="text" name="postal_code" value="{{ old('postal_code', $profile->postal_code ?? '') }}">
        @error('postal_code')
        <p class="error">{{ $message }}</p>
        @enderror

        <label class="label">住所</label>
        <input type="text" class="text" name="address" value="{{ old('address', $profile->address ?? '') }}">
        @error('address')
        <p class="error">{{ $message }}</p>
        @enderror

        <label class="label">建物名</label>
        <input type="text" class="text" name="building" value="{{ old('building',  $profile->building ?? '') }}">
        @error('building')
        <p class="error">{{ $message }}</p>
        @enderror

        <div class="image-preview">

           <img src="{{ isset($profile) && $profile->profile_image? asset('storage/' . $profile->profile_image): '/images/default.png' }}"style="max-width:150px; border-radius:50%; margin-bottom:10px;">

           <img id="preview"src=""style="display:none; max-width:150px; border-radius:50%; margin-bottom:10px;">
        </div>
    
        <button type="submit" class="create-btn">
             {{ isset($profile) ? '更新する' : '登録する' }}
        </button>
      </form>
    </div>
  </main>
</body>
</html>
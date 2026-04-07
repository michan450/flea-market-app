<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <title>flea-market-app</title>
</head>
<body>
    <header class="header">
    <div class="header__inner">
      <a class="header__logo" href="/">
        COACHTECH
      </a>
    </div>
  </header>

 <main>
  <div class="register">

    <div class="title">
      <h1>会員登録</h1>
    </div>
  <form action="{{ route('register.store') }}" method="POST">
     @csrf 

    <label class="label">ユーザー名</label>
    <input type="text" class="text" name="name" value="{{ old('name') }}">
    @error('name')
    <p class="error">{{ $message }}</p>
    @enderror

    <label class="label">メールアドレス</label>
    <input type="text" class="text" name="email" value="{{ old('email') }}">
    @error('email')
    <p class="error">{{ $message }}</p>
    @enderror

    <label class="label">パスワード</label>
    <input type="password" class="text" name="password">
    @error('password')
    <p class="error">{{ $message }}</p>
    @enderror

    <label class="label">確認用パスワード</label>
    <input type="password" class="text" name="password_confirmation">

    <button type="submit" class="register-btn">登録する</button>
    <p class="login-link">
      <a href="{{ route('login') }}">ログインはこちら</a>
    </p>
  </form>

  </div>
</main>
    
</body>
</html>
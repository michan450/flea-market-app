<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
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
  <div class="login">

    <div class="title">
      <h1>ログイン</h1>
    </div>
   <form action="{{ route('login') }}" method="POST">
     @csrf 
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

      <button type="submit" class="login-btn">ログインする</button>
          <p class="register-link">
              <a href="{{ route('register') }}">会員登録はこちら</a>
          </p>
     </form>
</main>
</body>
</html>
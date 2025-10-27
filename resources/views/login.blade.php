<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    @vite(['resources/css/app.css'])
</head>
<body class='lr-body'>
       
        <div class="login-box">
        @if (session()->has('success'))
            <div class='container container--narrow'>
          <div class='alert alert-success  text-center'>
            {{ session('success') }}
          </div>
        </div>
        @elseif(session()->has('failed'))
        <div class='container container--narrow'>
          <div class='alert alert-danger  text-center'>
            {{ session('failed') }}
          </div>
        </div>
            
        @endif
        <h2>Login</h2>
        <form method='POST' action='/login'>
          @csrf
            <input value='{{ old('username') }}' class='inputfield' type="text" placeholder="Username" name='username'>
            @error('username')
              <p class='m-0 small alert alert-danger shadow-sm'>{{$message}}</p>
            @enderror

            <input class='inputfield' type="password" placeholder="Password" name='password'>
             @error('password')
              <p class='m-0 small alert alert-danger shadow-sm'>{{$message}}</p>
            @enderror

            <button type="submit">Sign In</button>
            <a href='/register' class='small'>register</a>
        </form>
    </div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    @vite(['resources/css/app.css'])
</head>
<body class='lr-body'>

    <div class="registration-box">
        <h2>Register</h2>
        <form action='/register' method="POST" id='registration-form'>
            @csrf
            <div>
            <input value="{{ old('username') }}" class='inputfield' type="text" placeholder="Username" name='username'>
            @error('username')
            <p class='m-0 small alert alert-danger shadow-sm'>{{$message}}</p>
            @enderror
            </div>    

            <div>
            <input value="{{ old('email') }}" class='inputfield' type="email" placeholder="Email" name='email'>
            @error('email')
            <p class='m-0 small alert alert-danger shadow-sm'>{{$message}}</p>
            @enderror
            </div>   

            <div>
            <input class='inputfield' type="password" placeholder="Password" name='password'>
            @error('password')
            <p class='m-0 small alert alert-danger shadow-sm'>{{$message}}</p>
            @enderror
            </div>   
           
            <div>
            <input class='inputfield' type="password" placeholder="Confirm Password" name='password_confirmation'>
            @error('password_confirmation')
            <p class='m-0 small alert alert-danger shadow-sm'>{{$message}}</p>
            @enderror
            </div>      
            
                <select name="userlevel" id="userlevel" class="inputfield">
                    <option value="1" {{ old('userlevel') == 1 ? 'selected' : '' }}>Employee</option>
                    <option value="2" {{ old('userlevel') == 2 ? 'selected' : '' }}>Accounting</option>
                    <option value="3" {{ old('userlevel') == 3 ? 'selected' : '' }}>HR Department</option>
                    <option value="4" {{ old('userlevel') == 4 ? 'selected' : '' }}>Administrator</option>
                </select>
            <button type="submit" class>Register</button>
        </form>
    </div>
</body>
</html>

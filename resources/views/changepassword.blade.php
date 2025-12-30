



   @auth
<x-main>
            <h2>Change password</h2>
            
            <form action='change_password' method='POST'>
                @csrf
                
            <span>current password</span>
            <input class='' type='password' name='currentpassword' maxlength="5" placeholder='5 digits only'></input>
            @error('currentpassword')
            <p class='m-0 small alert alert-danger shadow-sm'>{{$message}}</p>
            @enderror


            <span>new password</span>
            <input type='password' name='password' maxlength="5" placeholder='5 digits only'></input>
            @error('password')
            <p class='m-0 small alert alert-danger shadow-sm'>{{$message}}</p>
            @enderror

            <span>confirmed new password</span>
            <input type='password' name='password_confirmation' maxlength="5" placeholder='confirm new password'></input>
            @error('password_confirmation')
            <p class='m-0 small alert alert-danger shadow-sm'>{{$message}}</p>
            @enderror

            <button type='submit'>Save</button>
            </form>
 </x-main>
  @else
  
  @include('login');
     
   @endauth
    





   @auth
        <x-main>
                
                <h5>Make Post</h5>
                <hr>


                <div class='container'>
                        <div class='row justify-content-center input-group'>
                                
                                <form method='POST' action='save-post' enctype='multipart/form-data'>
                                        @csrf
                                        <div class='col-md-3 mx-auto'>
                                        </div>
                                                <div class='col-md-6 mx-auto'>
                                                <label class='label'>Title </label>
                                                <br>
                                                <input name='title' type='text' class='input-group-text' style='width:100%;text-align:left;'>
                                                @error('title')
                                                        <div class='text-danger small'>Please input post Title</div>
                                                @enderror
                                                </div>
                                        <div class='col-md-3 mx-auto'>
                                        </div>
                                        
                                        <div class='col-md-3 mx-auto mt-1'>
                                        </div>
                                                <div class='col-md-6 mx-auto  mt-1'>
                                                <label class='label'>Message </label>
                                                <br>
                                                <textarea aria-label="Message" class='input-group-text' style='width:100%;height:250px;text-align:left;' name='message'></textarea>
                                                @error('message')
                                                        <div class='text-danger small'>Please input post message</div>
                                                @enderror
                                                </div>
                                        <div class='col-md-3 mx-auto  mt-1'>
                                        </div>

                                        <div class='col-md-3 mx-auto mt-1'>
                                        </div>
                                                <div class='col-md-6 mx-auto mt-1'>
                                                <button class='btn btn-primary'>Post</button>
                                                </div>
                                        <div class='col-md-3 mx-auto mt-1'>
                                        </div>
                                </form>
                                        
                        </div>
                </div>
                <div>
                        @include('components.toast')
        </x-main>
  @else
  
  @include('login');
     
   @endauth
    

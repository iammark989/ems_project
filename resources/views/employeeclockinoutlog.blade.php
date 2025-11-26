



   @auth
        <x-main>
                <div class='col-lg-12'>
                <div class='col-5'><h5>Clock in and out Log</h5></div>
                </div>      
                <a href='/attendance'>Back</a>  
                <hr>


                @livewire('view-clockinout-log')
        
 </x-main>
  @else
  
  @include('login');
     
   @endauth
    

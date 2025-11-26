



   @auth
        <x-main>
                <div class='col-lg-12'>
                <div class='col-5'><h5>Update Gas Consumption</h5></div>
                </div>      
            
                <hr>

                @livewire('gas-consumption')


 </x-main>
  @else
  
  @include('login');
     
   @endauth
    

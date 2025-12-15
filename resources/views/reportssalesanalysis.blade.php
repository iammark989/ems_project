



   @auth
        <x-main>
                <div class='col-lg-12'>
                <div class='col-5'><h5>Sales Analysis</h5></div>
                </div>      
            
                <hr>

               @livewire('sales-analysis')


 </x-main>
  @else
  
  @include('login');
     
   @endauth
    

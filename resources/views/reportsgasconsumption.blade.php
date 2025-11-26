



   @auth
        <x-main>
                <div class='col-lg-12'>
                <div class='col-5'><h5>Gas Consumption Report</h5></div>
                </div>      
            
                <hr>

                @livewire('gasconsumption-reports')


 </x-main>
  @else
  
  @include('login');
     
   @endauth
    

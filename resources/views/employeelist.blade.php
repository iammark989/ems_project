



   @auth
        <x-main>
                <div class='row'>
                        <div class='col-lg-12'>
                <div class='col-5'><h5>Employee list</h5></div>
                <!-- Search bar (Bootstrap 5) -->
                <div class='col-7'>@livewire('employee-search')</div>
                </div>        
                <hr>

        <div class="page-content">
 

                
        <div class="container-fluid">
                
                <div class='container'>
                       
                        <div class='list-group'>
                                <div class='col-12 m-2' style=''>

                                @foreach ($employeelisting as $emplist)
                                        
                                        <a href='/employeelist/{{ $emplist->employeeID }}' class="list-group-item list-group-item-action">
                                                <span>
                                                {{ $emplist->employeeID }} - <img class='avatar-tiny' src='{{ $emplist->images }}' /> <span class="text-uppercase"> {{ $emplist->username }}</span> -
                                                </span>
                                                <span class="badge {{ $emplist->status == '1' ? 'bg-success' : 'bg-secondary' }}">
                                                {{ $emplist->status == '1' ? "Active" : "Inactive" }}
                                                </span>
                                        </a>
                                @endforeach
                                
                                </div>
                                <div class='mt-2'>
                                {{ $employeelisting->links() }}
                                </div> 
                        </div>
                </div>        
        </div>
        </div>

        </x-main>
  @else
  
  @include('login');
     
   @endauth
    

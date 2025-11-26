@auth
    <x-main>
        <div class='row'>
        <h2>Payroll Settings</h2>
        <hr>
        </div>

        <div class='container'>

           @livewire('payroll-settings')



        </div>
        @include('components.modals.schedule')
        @include('components.modals.cutoffperiod')
        
    </x-main>
@else

@include('login');

@endauth
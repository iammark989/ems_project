<!-- wire:model.live="query" → binds the input to your $query variable in realtime. -->
<!-- As you type, Livewire automatically calls updatedQuery() and re-renders the results. -->
<!-- Bootstrap classes make it look clean and dropdown-like. -->

<div class="position-relative" style="max-width: 400px;margin-bottom:5px;">
    <input type="text"
           wire:model.live="query"
           class="form-control"
           placeholder="Search employee...">

    @if(!empty($query))
        <ul class="list-group position-absolute w-100 mt-1 shadow-sm" style="z-index: 1000;">
            @forelse($employees as $employee)
                <li class="list-group-item">
                    <a href='/employeelist/{{ $employee->employeeID }}' style='text-decoration:none;'>{{ $employee->employeeID }} - <img class='avatar-tiny' src='{{ $employee->images }}' /> <span class="text-uppercase">{{ $employee->username }}</span> - <span class='badge {{ $employee->status  = '1' ? 'bg-success' : 'bg-secondary' }}''>{{ $employee->status  = '1' ? 'Active' : 'Inactive' }}</span> </a>
                </li>
            @empty
                <li class="list-group-item text-muted">No results found</li>
            @endforelse
        </ul>
    @endif
</div>
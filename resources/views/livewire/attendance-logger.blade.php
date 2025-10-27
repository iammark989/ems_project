
   <div>

     {{-- Toast --}}
    @if ($toastMessage)
        <div class="toast toast-{{ $toastType }}">
            {{ $toastMessage }}
        </div>

        <script>
            setTimeout(() => {
                Livewire.dispatch('clear-toast');
            }, 2000);
        </script>
    @endif

    <input type="text" wire:model.live="rfid" id="rfidInput" autofocus>
    <div>{{ $result }}</div>
    
 <script>
        // listen for the Livewire event
        window.addEventListener('focus-rfid', () => {
            const input = document.getElementById('rfidInput');
            input.value = '';
            input.focus();
        });
    </script>
    
</div>


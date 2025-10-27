<div>
    @if (session('message'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            toast: true,
            position: '{{ session('position') ?? 'top' }}', // top, top-start, top-end
            icon: '{{ session('type') ?? 'success' }}',         // success, error, warning, info
            title: '{{ session('message') }}',
            showConfirmButton: false,
            timer: {{ session('timer') ?? 3000 }},
            timerProgressBar: true
        });
    });
</script>
@endif
</div>
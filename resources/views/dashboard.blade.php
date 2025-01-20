{{-- {{ __("You're logged in!") }} --}}

@if (auth()->user()->hasRole('teacher'))
    <script>
        window.location.href = '{{ route('dashboard.courses.index') }}'; // Ubah rute sesuai kebutuhan
    </script>
@elseif(auth()->user()->hasRole('student'))
    <script>
        window.location.href = '{{ route('dashboard.learning.index') }}'; // Ubah rute sesuai kebutuhan
    </script>
@endif

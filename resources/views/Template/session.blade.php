@if (session('SESSION_TOKEN') != csrf_token())
    <script type="text/javascript">
        window.location = "{{ url('/') }} ";
    </script>
@else
    {{ request()->session()->put('CURRENT_URL', request()->url()) }}
@endif
{{-- Default toast messages --}}
@if(Session::has('message'))
    <script>
        toast.success("{{ session('message') }}");
    </script>
@endif

@if(Session::has('error'))
    <script>
        toast.error("{{ session('error') }}");
    </script>
@endif

@if(Session::has('info'))
    <script>
        toast.info("{{ session('info') }}");
    </script>
@endif

@if(Session::has('warning'))
    <script>
        toast.warning("{{ session('warning') }}");
    </script>
@endif

{{-- Custom toast validation errors --}}
@if(count($errors->all()) && Route::currentRouteName() !== 'profile.edit')
    <script>
        @foreach ($errors->all() as $error)
            toast.error("{{ $error }}");
        @endforeach
    </script>
@endif

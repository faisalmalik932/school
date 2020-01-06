@if (!empty($errors))
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger no-border">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
            <span class="text-semibold">Warning! </span>{{ $error }}
        </div>
    @endforeach
@endif


<!-- @if(Session::has('error'))
	<p class="alert alert-danger">{{Session::get('error')}} </p>

@endif


@foreach($errors->all() as $error)

<li class="alert alert-danger">{{$errors}}</li>
@endforeach -->
@if($errors->any())
@foreach ($errors->all() as $error)
<p class="alert alert-danger">{{ $error }}</p>
@endforeach
@endif



<!-- @if(session()->has('error'))
    <div class="alert alert-warning">
        {{ session()->get('error') }}
    </div>
@endif -->
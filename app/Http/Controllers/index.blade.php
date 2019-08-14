@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    	@foreach($plants as $plant)
    	<div>{{ $plant->name }}</div>
    	@endforeach
    </div>
</div>
@endsection

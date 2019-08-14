@extends('layouts.app')

@section('content')
<div class="container">

	<a href="/clients/create" class="btn btn-lg btn-success" style="margin-left: -15px;margin-bottom: 10px;">Add Client</a>
    @foreach($clients as $client)
    <div class="row justify-content-center" style="border-bottom: 3px solid #565656;">
	  
    	<div class="col-12" style="background-color: #a0a3a7;">

	    	<a href="/clients/{{ $client->id }}" class="plant-heading">
	    		<div class="row text-left">
	    		
		    		<div class="col-12">
		    			<h1>
		    				{{ $client->fullName }}
		    			</h1>
		    		</div>
		    		<div class="col-12">
		    			<h1 style="font-size: 16px;">
		    				{{ $client->information }}
		    			</h1>
		    		</div>
	    		</div>
	    	</a>
    	</div>
    </div>
    @endforeach
</div>
@endsection

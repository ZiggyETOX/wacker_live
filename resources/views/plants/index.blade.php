@extends('layouts.app')

@section('content')
<div class="container">
	<h1 style="color: #4caf50">{{ $message }}</h1>
	<div>
  		<button id="ALL" onclick="myfunction('ALL');"class="btn btn-md btn-success" title="Displays all the plants" style="background-color: #4caf50; margin-left: -15px;margin-bottom: 10px;">
  				ALL
  		</button>
  		<button id="GROWING" onclick="myfunction('GROWING');"class="btn btn-md btn-success" title="Displays all the plants busy growing" style="background-color: #4caf50; margin-left: 0;margin-bottom: 10px;">
  				GROWING
  		</button>
  		<button id="RFT" onclick="myfunction('RFT');"class="btn btn-md btn-success plants-active" title="Display all the plants that has stock" style="background-color: #4caf50; margin-left: 0;margin-bottom: 10px;">
  				RFT
  		</button>
  		<button id="OLD" onclick="myfunction('OLD');"class="btn btn-md btn-success" title="Display all the plants that is has no stock left" style="background-color: #4caf50; margin-left: 0;margin-bottom: 10px;">
  				OLD
  		</button>
	</div>

	<script type="text/javascript">
		
		var plantsActive = "RFT";

		function myfunction(id){
			if (id !== plantsActive) {
				var btn_clicked = document.getElementById(id),
					btn_old = document.getElementById(plantsActive),
					plants_new = document.getElementById('plants_' + id),
					plants_old = document.getElementById('plants_' + plantsActive);

				btn_clicked.className = "btn btn-md btn-success plants-active";
				btn_old.className = "btn btn-md btn-success";
				
				plants_old.style = "Display:none;";
				plants_new.style = "";

				plantsActive = id;
			}

		}

	</script>



<div id='plants_ALL' style="display: none;">
    @foreach($plants as $plant)
    <div class="row justify-content-center" style="border-bottom: 3px solid #565656;">
	    @if($plant->stage == 'RFT')
    	<div class="col-12" style="background-color: #6cb2eb;">
    	@else
    	<div class="col-12" style="background-color: #a0a3a7;">
    	@endif

	    	<a href="/plants/{{ $plant->id }}" class="plant-heading">
	    		<div class="row text-left">
	    		
		    		<div class="col-12">
		    			<h1>
		    				{{ $plant->name }}
		    			</h1>
		    		</div>
	    		</div>
	    	</a>

	    	<div class="row text-left">
	    		<div class="col-12">
	    			<table style="width: 100%;">
	    				<thead>
	    					<th width="15%">Strain</th>
	    					<th width="10%">Type</th>
	    					<th width="10%">Stage</th>
	    					<th width="5%">IO</th>
	    					@if($plant->stage == 'RFT')
	    					<th width="15%" style="text-align: right;">Price</th>
	    					<th width="15%" style="text-align: right;">Stock</th>
	    					@else
	    					<th width="15%" style="text-align: right;">Started</th>
	    					<th width="15%" style="text-align: right;">Harvested</th>
	    					@endif
	    					<!-- <th width="25%" style="text-align: right;">Harvested</th> -->
	    				</thead>
	    				<tbody>
	    					<tr>
	    						<td>{{ $plant->strain }}</td>
	    						<td>{{ $plant->strainType }}</td>
	    						<td><strong>{{ $plant->stage }}<strong></td>
	    						<td>{{ $plant->IO }}</td>
		    					@if($plant->stage == 'RFT')
		    					<td style="text-align: right;font-weight: bold;font-size: 20px;color: #ffffff;">
		    						R {{ $plant->price }}
		    					</td>
		    					<td style="text-align: right;font-weight: bold;font-size: 20px;color: #ffffff;">
		    						{{ $plant->stock }} G
		    					</td>
		    					@else
		    					<td style="text-align: right;">{{ $plant->startDate }}</td>
		    					<td style="text-align: right;">{{ $plant->harvestDate }}</td>
		    					@endif
	    					</tr>
	    				</tbody>
	    			</table>
	    		</div>
	    	</div>
    	</div>
    </div>
    @endforeach
</div>

<div id='plants_GROWING' style="display: none;">
    @foreach($plants_GROWING as $plant)
    <div class="row justify-content-center" style="border-bottom: 3px solid #565656;">
	    @if($plant->stage == 'RFT')
    	<div class="col-12" style="background-color: #6cb2eb;">
    	@else
    	<div class="col-12" style="background-color: #a0a3a7;">
    	@endif

	    	<a href="/plants/{{ $plant->id }}" class="plant-heading">
	    		<div class="row text-left">
	    		
		    		<div class="col-12">
		    			<h1>
		    				{{ $plant->name }}
		    			</h1>
		    		</div>
	    		</div>
	    	</a>

	    	<div class="row text-left">
	    		<div class="col-12">
	    			<table style="width: 100%;">
	    				<thead>
	    					<th width="15%">Strain</th>
	    					<th width="10%">Type</th>
	    					<th width="10%">Stage</th>
	    					<th width="5%">IO</th>
	    					@if($plant->stage == 'RFT')
	    					<th width="15%" style="text-align: right;">Price</th>
	    					<th width="15%" style="text-align: right;">Stock</th>
	    					@else
	    					<th width="15%" style="text-align: right;">Started</th>
	    					<th width="15%" style="text-align: right;">Harvested</th>
	    					@endif
	    					<!-- <th width="25%" style="text-align: right;">Harvested</th> -->
	    				</thead>
	    				<tbody>
	    					<tr>
	    						<td>{{ $plant->strain }}</td>
	    						<td>{{ $plant->strainType }}</td>
	    						<td><strong>{{ $plant->stage }}<strong></td>
	    						<td>{{ $plant->IO }}</td>
		    					@if($plant->stage == 'RFT')
		    					<td style="text-align: right;font-weight: bold;font-size: 20px;color: #ffffff;">
		    						R {{ $plant->price }}
		    					</td>
		    					<td style="text-align: right;font-weight: bold;font-size: 20px;color: #ffffff;">
		    						{{ $plant->stock }} G
		    					</td>
		    					@else
		    					<td style="text-align: right;">{{ $plant->startDate }}</td>
		    					<td style="text-align: right;">{{ $plant->harvestDate }}</td>
		    					@endif
	    					</tr>
	    				</tbody>
	    			</table>
	    		</div>
	    	</div>
    	</div>
    </div>
    @endforeach
</div>

<div id='plants_RFT'>
    @foreach($plants_RFT as $plant)
    <div class="row justify-content-center" style="border-bottom: 3px solid #565656;">
	    @if($plant->stage == 'RFT')
    	<div class="col-12" style="background-color: #6cb2eb;">
    	@else
    	<div class="col-12" style="background-color: #a0a3a7;">
    	@endif

	    	<a href="/plants/{{ $plant->id }}" class="plant-heading">
	    		<div class="row text-left">
	    		
		    		<div class="col-12">
		    			<h1>
		    				{{ $plant->name }}
		    			</h1>
		    		</div>
	    		</div>
	    	</a>

	    	<div class="row text-left">
	    		<div class="col-12">
	    			<table style="width: 100%;">
	    				<thead>
	    					<th width="15%">Strain</th>
	    					<th width="10%">Type</th>
	    					<th width="10%">Stage</th>
	    					<th width="5%">IO</th>
	    					<th width="15%" style="text-align: right;">Price</th>
	    					<th width="15%" style="text-align: right;">Stock</th>
	    				</thead>
	    				<tbody>
	    					<tr>
	    						<td>{{ $plant->strain }}</td>
	    						<td>{{ $plant->strainType }}</td>
	    						<td><strong>{{ $plant->stage }}<strong></td>
	    						<td>{{ $plant->IO }}</td>
		    					<td style="text-align: right;font-weight: bold;font-size: 20px;color: #ffffff;">
		    						R {{ $plant->Stock()->first()->price }}
		    					</td>
		    					<td style="text-align: right;font-weight: bold;font-size: 20px;color: #ffffff;">
		    						{{ $plant->Stock()->first()->stock }} G
		    					</td>
	    					</tr>
	    				</tbody>
	    			</table>
	    		</div>
	    	</div>
    	</div>
    </div>
    @endforeach
</div>

<div id='plants_OLD' style="display: none;">
    @foreach($plants_OLD as $plant)
    <div class="row justify-content-center" style="border-bottom: 3px solid #565656;">
	    @if($plant->stage == 'RFT')
    	<div class="col-12" style="background-color: #6cb2eb;">
    	@else
    	<div class="col-12" style="background-color: #a0a3a7;">
    	@endif

	    	<a href="/plants/{{ $plant->id }}" class="plant-heading">
	    		<div class="row text-left">
	    		
		    		<div class="col-12">
		    			<h1>
		    				{{ $plant->name }}
		    			</h1>
		    		</div>
	    		</div>
	    	</a>

	    	<div class="row text-left">
	    		<div class="col-12">
	    			<table style="width: 100%;">
	    				<thead>
	    					<th width="15%">Strain</th>
	    					<th width="10%">Type</th>
	    					<th width="10%">Stage</th>
	    					<th width="10%">IO</th>
	    					<th width="15%" style="text-align: right;">Yield</th>
	    					<th width="15%" style="text-align: right;">Total</th>
	    					<!-- <th width="25%" style="text-align: right;">Harvested</th> -->
	    				</thead>
	    				<tbody>
	    					<tr>
	    						<td>{{ $plant->strain }}</td>
	    						<td>{{ $plant->strainType }}</td>
	    						<td><strong>{{ $plant->stage }}<strong></td>
	    						<td>{{ $plant->IO }}</td>
		    					<td style="text-align: right;font-weight: bold;font-size: 20px;color: #ffffff;">
		    						{{ $plant->yield}} G
		    					</td>
		    					@php
		    						$transactions = $plant->Transaction()->get();
		    						$total = 0;
		    						foreach($transactions as $transaction){
		    						$total += $transaction->amount;
		    						}
		    					@endphp
		    					<td style="text-align: right;font-weight: bold;font-size: 20px;color: #ffffff;">
		    						R {{ $total }}
		    					</td>
	    					</tr>
	    				</tbody>
	    			</table>
	    		</div>
	    	</div>
    	</div>
    </div>
    @endforeach
</div>
@endsection

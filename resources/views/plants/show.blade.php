@extends('layouts.app')

@section('content')


<div class="container">
  <button onclick="window.history.back();"class="btn btn-lg btn-success" style="background-color: #4caf50; margin-left: -15px;margin-bottom: 10px;">BACK</button>
    <div class="row justify-content-center">
      <div class="col-12" style="background-color: #4caf50; border-radius: 10px;">
          <span style="font-size: 36px; font-weight: bold;">{{ $plant->name }}</span>
          @if(empty($stock->stock))
          @if($stock->stock == 0)
          <form action="/plants/{{ $plant->id }}" method="POST" style="float: right;">
            @method('DELETE')
            @csrf
            <input type="submit" name="submit-remove" class="btn btn-lg btn-danger" style="margin-top: 10px;margin-right: -5px;" value="REMOVE">
          </form>
          @endif
          @endif
        <div class="">          
          <a href="/plants/{{ $plant->id }}/edit" class="btn btn-lg btn-warning">EDIT</a>
          @if(empty($stock))
          <a href="/plants/{{ $plant->id }}/harvest" class="btn btn-lg btn-info">HARVEST</a>
          @else
          <p style="width: 50%;">
          <br>
            {{ $stock->notes }}
          </p>
          @endif
        </div>
        <div class="col-12">
            <table style="width: 100%;">
              <thead>
                <th width="15%">Strain</th>
                <th width="10%">Type</th>
                <th width="10%">Stage</th>
                <th width="5%">IO</th>
                @if($plant->stage == 'RFT')
                <th width="15%" style="text-align: right;">Price/Gram</th>
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
                  <td>{{ $plant->stage }}</td>
                  <td>{{ $plant->IO }}</td>
                  @if($plant->stage == 'RFT')
                  <td style="text-align: right;text-align: right;font-weight: bold;font-size: 20px;color: #ffffff;">R {{ $stock->price }}</td>
                  <td style="text-align: right;text-align: right;font-weight: bold;font-size: 20px;color: #ffffff;">{{ $stock->stock }} G</td>
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
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
      <div class="col-12" style="background-color: #a0a3a7;">
        
        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th class="th-sm">Client
              </th>
              <th class="th-sm">Date
              </th>
              <th style="text-align: right;" class="th-sm">Price / Gram
              </th>
              <th style="text-align: right;" class="th-sm">Total Grams
              </th>
              <th style="text-align: right;" class="th-sm">Amount
              </th>
            </tr>
          </thead>
          <tbody>

            @php
              $TotalAmount = 0;
              $TotalGramsAmount = 0;
            @endphp

            @foreach($plant->Transaction()->get() as $transaction)
            
            @php
            $TotalAmount += $transaction->amount;
            $TotalGramsAmount += $transaction->amount;
            @endphp
            <tr>
              <td>
                <a style="font-weight: bold;font-size: 18px;" href="/clients/{{ $transaction->Invoice()->first()->Client->first()->id }}">
                  {{ $transaction->Invoice()->first()->Client->first()->fullName }}
                </a>
              </td>
              <td>
                <a style="font-weight: bold;font-size: 18px;" href="/transactions/{{ $transaction->id }}/edit">
                  {{ $transaction->Invoice()->first()->date }}
                </a>
              </td>
              <td style="text-align: right;">R{{ $transaction->price_gram }}</td>
              <td style="text-align: right;">{{ $transaction->grams }}G</td>
              <td style="text-align: right;">R{{ $transaction->amount }}</td>
            </tr>
            @endforeach
            <tr>
              <td></td>
              <td></td>
              <td style="text-align: right;font-weight: bold;">TOTAL {{ $TotalGramsAmount }}G</td>
              <td style="text-align: right;font-weight: bold;">TOTAL R{{ $TotalAmount }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection
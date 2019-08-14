@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
      <div class="col-12" style="background-color: #4caf50; border-radius: 10px;">
          <span style="font-size: 36px; font-weight: bold;">INVOICE: {{ $invoice->date }}</span>
          <a href="/clients/{{ $invoice->client_id }}" class="btn btn-danger" style="margin: 15px;float: right;">Go Back</a>
        <div class="">          
          <!-- <a href="/invoices/{{ $invoice->id }}/edit" class="btn btn-lg btn-warning">EDIT</a> -->
          <a href="/invoices/{{ $invoice->id }}/add-transaction" class="btn btn-lg btn-info">Create new Transaction</a>
        </div>
        <div class="col-12">
          <br>
          {{ $invoice->info }}
          @php
            $total = 0;
            foreach($invoice->Transaction()->get() as $transaction){
            $total += $transaction->amount;
            }
            echo('R '.$total);
          @endphp
          <br>
          <br>
        </div>
      </div>
    </div>
</div>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
      <div class="col-12" style="background-color: #a0a3a7;">
          <span style="font-size: 36px; font-weight: bold;">Transactions</span>
        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th class="th-sm">Plant
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
            @endphp

            @foreach($invoice->Transaction()->get() as $transaction)
            
            @php
            $TotalAmount += $transaction->amount;
            @endphp
            <tr>
              <td>
                <a style="font-weight: bold;font-size: 18px;" href="/transactions/{{ $transaction->id }}/edit">
                  {{ $transaction->Plant()->first()->name }}
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
              <td></td>
              <td style="text-align: right;font-weight: bold;">TOTAL R{{ $TotalAmount }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection
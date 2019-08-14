@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
      <div class="col-12" style="background-color: #4caf50; border-radius: 10px;">
          <span style="font-size: 36px; font-weight: bold;">{{ $client->fullName }}</span>
          <a href="/clients" class="btn btn-danger" style="margin: 15px;float: right;">Go Back</a>
        <div class="">          
          <a href="/clients/{{ $client->id }}/edit" class="btn btn-lg btn-warning">EDIT</a>
          <a href="/clients/{{ $client->id }}/create-invoice" class="btn btn-lg btn-info">Create new Invoice</a>
        </div>
        <div class="col-12">
          <br>
          {{ $client->information }}
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
          <span style="font-size: 36px; font-weight: bold;">Invoices</span>
        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th class="th-sm">Date
              </th>
              <th class="th-sm">Info
              </th>
              <th style="text-align: right;" class="th-sm">Total
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($client->Invoice()->get() as $invoice)
            <tr>
              <td>
                <a style="font-weight: bold;font-size: 18px;" href="/invoices/{{ $invoice->id }}">
                  INVOICE: {{ $invoice->date }}
                </a>
              </td>
              <td>{{ $invoice->info }}</td>
              <td style="text-align: right;">{{ $invoice->total }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection
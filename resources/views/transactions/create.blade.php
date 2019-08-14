@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Add Transaction</div>

                <div class="card-body">
                    <form method="POST" action="/transactions">
                        @csrf

                        <div class="form-group row">
                            <label for="plant_id" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                                <a href="javascript:history.back()" class="btn btn-danger">Go Back</a>
                                <!-- <input id="strainType" type="text" class="form-control" name="strainType" value="" required> -->

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="plant_id" class="col-md-4 col-form-label text-md-right">Plant</label>

                            <div class="col-md-6">
                                <select name="plant_id" id="plant_id" required>

                                    @foreach($plants->where('stage', 'RFT') as $plant)
                                        <option value="{{ $plant->id }}">{{ $plant->name }} : {{ $plant->Stock()->first()->stock }}G</option>
                                    @endforeach
                                </select>
                                <!-- <input id="strainType" type="text" class="form-control" name="strainType" value="" required> -->

                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="price_gram" class="col-md-4 col-form-label text-md-right">Price/Gram</label>

                            <div class="col-md-6">
                                <input id="price_gram" type="number" class="form-control" name="price_gram" value="" required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="grams" class="col-md-4 col-form-label text-md-right">Total Grams</label>

                            <div class="col-md-6">
                                <input id="grams" type="number" class="form-control" name="grams" value="" max="{{ $plant->Stock()->first()->stock }}" required onchange="document.getElementById('amount').value = (document.getElementById('price_gram').value * document.getElementById('grams').value);">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="amount" class="col-md-4 col-form-label text-md-right">Total Amount Recieved</label>

                            <div class="col-md-6">
                                <input id="amount" type="number" class="form-control" name="amount" value="" required>
                                <input type="hidden" id="invoice_id" name="invoice_id" value="{{ $invoice->id }}"/>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create Transaction
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

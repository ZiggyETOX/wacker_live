@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Create Invoice</div>

                <div class="card-body">
                    <form method="POST" action="/invoices" id="createInvoice">
                        @csrf

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">Date</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control" name="date" value="" required autofocus>
                            </div>
                        </div>

                        <input id="client_id" type="hidden" class="form-control" name="client_id" value="{{ $client->id }}">                            

                        <div class="form-group row">
                            <label for="info" class="col-md-4 col-form-label text-md-right">Info</label>

                            <div class="col-md-6">
                                <textarea rows="4" style="width: 100%;"  name="info" id="info" form="createInvoice">
                                    
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create Invoice
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

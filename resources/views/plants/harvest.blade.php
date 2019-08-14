@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Harvest Plant</div>

                <div class="card-body">
                    <form method="POST" action="/plants/{{ $plant->id }}/store" id="harvestPlant">
                        {{ method_field('PUT') }}
                        @csrf

                        <div class="form-group row">
                            <label for="stock" class="col-md-4 col-form-label text-md-right">Total grams</label>

                            <div class="col-md-6">
                                <input id="stock" type="text" class="form-control" name="stock" value="" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="quality" class="col-md-4 col-form-label text-md-right">Quality</label>

                            <div class="col-md-6">
                                <input id="quality" type="text" class="form-control" name="quality" value="" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Premade Price</label>

                            <div class="col-md-6">

                                <input id="price" type="number" class="form-control" name="price" value="" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="notes" class="col-md-4 col-form-label text-md-right">Notes</label>

                            <div class="col-md-6">
                                <textarea rows="4" style="width: 100%;"  name="notes" id="notes" form="harvestPlant" required>
                                    
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="javascript:history.back()" class="btn btn-danger">Go Back</a>
                                <button type="submit" class="btn btn-primary">
                                    Harvest
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

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Add Client</div>

                <div class="card-body">
                    <form method="POST" action="/clients" id="createClient">
                        @csrf

                        <div class="form-group row">
                            <label for="plant_id" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                                <a href="javascript:history.back()" class="btn btn-danger">Go Back</a>
                                <!-- <input id="strainType" type="text" class="form-control" name="strainType" value="" required> -->

                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="fullName" class="col-md-4 col-form-label text-md-right">Full Name</label>

                            <div class="col-md-6">
                                <input id="fullName" type="text" class="form-control" name="fullName" value="" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="information" class="col-md-4 col-form-label text-md-right">Information</label>

                            <div class="col-md-6">
                                <textarea rows="4" style="width: 100%;"  name="information" id="information" form="createClient" required>
                                    
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    ADD
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

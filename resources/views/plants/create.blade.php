@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Add Plant</div>

                <div class="card-body">
                    <form method="POST" action="/plants" id="createPlant">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Strain</label>

                            <div class="col-md-6">
                                <input id="strain" type="text" class="form-control" name="strain" value="" required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Strain Type</label>

                            <div class="col-md-6">
                                <select name="strainType" id="strainType" required>
                                  <option value="Sativa">Sativa</option>
                                  <option value="Indica">Indica</option>
                                  <option value="Hybrid">Hybrid</option>
                                </select>
                                <!-- <input id="strainType" type="text" class="form-control" name="strainType" value="" required> -->

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Seed's Origin</label>

                            <div class="col-md-6">
                                <input id="seedOrigin" type="text" class="form-control" name="seedOrigin" value="" required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Plant's stage</label>

                            <div class="col-md-6">

                                <select name="stage" id="stage" required>
                                  <option value="Germination">Germination</option>
                                  <option value="Seedling">Seedling</option>
                                  <option value="Veg">Veg</option>
                                  <option value="Flower">Flower</option>
                                  <option value="Drying">Drying</option>
                                  <option value="Curing">Curing</option>
                                  <option value="RFT">RFT</option>
                                </select>
                                <!-- <input id="stage" type="text" class="form-control" name="stage" value="" required> -->

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Indoor/Outdoor</label>

                            <div class="col-md-6">
                                <select name="IO" id="IO">
                                  <option value="Indoor">Indoor</option>
                                  <option value="Outdoor">Outdoor</option>
                                </select>
                                <!-- <input id="IO" type="text" class="form-control" name="IO" value=""> -->

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Start Date</label>

                            <div class="col-md-6">
                                <input id="startDate" type="date" class="form-control" name="startDate" value="">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Harvest Date</label>

                            <div class="col-md-6">
                                <input id="harvestDate" type="date" class="form-control" name="harvestDate" value="">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Yield</label>

                            <div class="col-md-6">
                                <input id="yield" type="number" class="form-control" name="yield" value="">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <textarea rows="4" style="width: 100%;"  name="description" id="description" form="createPlant">
                                    
                                </textarea>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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

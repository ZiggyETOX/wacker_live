@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edit Plant</div>

                <div class="card-body">
                    <form method="POST" action="/plants/{{ $plant->id }}" id="editPlant">
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $plant->name }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="strain" class="col-md-4 col-form-label text-md-right">Strain</label>

                            <div class="col-md-6">
                                <input id="strain" type="text" class="form-control" name="strain" value="{{ $plant->strain }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="strainType" class="col-md-4 col-form-label text-md-right">Strain Type</label>

                            <div class="col-md-6">
                                <select name="strainType" id="strainType" required>
                                    @if($plant->strainType == 'Indica')
                                  <option value="Sativa">Sativa</option>
                                  <option value="Indica" selected>Indica</option>
                                  <option value="Hybrid">Hybrid</option>
                                    @elseif($plant->strainType == 'Hybrid')
                                  <option value="Sativa">Sativa</option>
                                  <option value="Indica">Indica</option>
                                  <option value="Hybrid" selected>Hybrid</option>
                                    @else
                                  <option value="Sativa" selected>Sativa</option>
                                  <option value="Indica">Indica</option>
                                  <option value="Hybrid">Hybrid</option>
                                    @endif
                                </select>
                                <!-- <input id="strainType" type="text" class="form-control" name="strainType" value="" required> -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="seedOrigin" class="col-md-4 col-form-label text-md-right">Seed's Origin</label>

                            <div class="col-md-6">
                                <input id="seedOrigin" type="text" class="form-control" name="seedOrigin" value="{{ $plant->seedOrigin }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="stage" class="col-md-4 col-form-label text-md-right">Plant's stage</label>

                            <div class="col-md-6">

                                <select name="stage" id="stage" required>
                                    @if($plant->stage == 'Germination')
                                  <option value="Germination" selected>Germination</option>
                                  <option value="Seedling">Seedling</option>
                                  <option value="Veg">Veg</option>
                                  <option value="Flower">Flower</option>
                                  <option value="Drying">Drying</option>
                                  <option value="Curing">Curing</option>
                                    @elseif($plant->stage == 'Seedling')
                                  <option value="Germination">Germination</option>
                                  <option value="Seedling" selected>Seedling</option>
                                  <option value="Veg">Veg</option>
                                  <option value="Flower">Flower</option>
                                  <option value="Drying">Drying</option>
                                  <option value="Curing">Curing</option>
                                    @elseif($plant->stage == 'Veg')
                                  <option value="Germination">Germination</option>
                                  <option value="Seedling">Seedling</option>
                                  <option value="Veg" selected>Veg</option>
                                  <option value="Flower">Flower</option>
                                  <option value="Drying">Drying</option>
                                  <option value="Curing">Curing</option>
                                    @elseif($plant->stage == 'Flower')
                                  <option value="Germination">Germination</option>
                                  <option value="Seedling">Seedling</option>
                                  <option value="Veg">Veg</option>
                                  <option value="Flower" selected>Flower</option>
                                  <option value="Drying">Drying</option>
                                  <option value="Curing">Curing</option>
                                    @elseif($plant->stage == 'Drying')
                                  <option value="Germination">Germination</option>
                                  <option value="Seedling">Seedling</option>
                                  <option value="Veg">Veg</option>
                                  <option value="Flower">Flower</option>
                                  <option value="Drying" selected>Drying</option>
                                  <option value="Curing">Curing</option>
                                    @elseif($plant->stage == 'Curing')
                                  <option value="Germination">Germination</option>
                                  <option value="Seedling">Seedling</option>
                                  <option value="Veg">Veg</option>
                                  <option value="Flower">Flower</option>
                                  <option value="Drying">Drying</option>
                                  <option value="Curing" selected>Curing</option>
                                    @elseif($plant->stage == 'RFT')
                                  <option value="RFT" selected>RFT</option>
                                    @endif
                                </select>
                                <!-- <input id="stage" type="text" class="form-control" name="stage" value="" required> -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="IO" class="col-md-4 col-form-label text-md-right">Indoor/Outdoor</label>

                            <div class="col-md-6">
                                <select name="IO" id="IO">
                                    @if($plant->IO == 'Indoor')
                                  <option value="Indoor" selected>Indoor</option>
                                  <option value="Outdoor">Outdoor</option>
                                    @else
                                  <option value="Indoor">Indoor</option>
                                  <option value="Outdoor" selected>Outdoor</option>
                                    @endif
                                </select>
                                <!-- <input id="IO" type="text" class="form-control" name="IO" value=""> -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="startDate" class="col-md-4 col-form-label text-md-right">Start Date</label>

                            <div class="col-md-6">
                                <input id="startDate" type="date" class="form-control" name="startDate" value="{{ $plant->startDate }}">
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="harvestDate" class="col-md-4 col-form-label text-md-right">Harvest Date</label>

                            <div class="col-md-6">
                                <input id="harvestDate" type="date" class="form-control" name="harvestDate" value="{{ $plant->harvestDate }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="yield" class="col-md-4 col-form-label text-md-right">Yield</label>

                            <div class="col-md-6">
                                <input id="yield" type="number" class="form-control" name="yield" value="{{ $plant->yield }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <textarea rows="4" style="width: 100%;"  name="description" id="description" form="editPlant">{{ $plant->description }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="javascript:history.back()" class="btn btn-danger">Go Back</a>
                                <button type="submit" class="btn btn-primary">
                                    Update
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

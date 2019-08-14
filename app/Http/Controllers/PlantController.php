<?php

namespace App\Http\Controllers;

use App\Plant;
use Illuminate\Http\Request;
use App\Stock;
use App\Transaction;
use App\Invoice;
use App\Client;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plants = \Auth::user()
            ->Plant()
            ->get();
        $return['message'] = "";
        foreach ($plants as $plant) {
            if (empty($plant->Stock()->first())) {
                
                $plant->price = null;
                $plant->stock = null;
            }else{
                $plant->price = $plant->Stock()->first()->price;
                $plant->stock = $plant->Stock()->first()->stock;
            }
        }
        $plants_growing = \Auth::user()->Plant()->where('stage', '!=', 'OLD')->where('stage', '!=', 'RFT')->get();
        $plants_RFT = \Auth::user()->Plant()->where('stage', 'RFT')->get();
        $plants_OLD = \Auth::user()->Plant()->where('stage', 'OLD')->get();

        $return['plants'] = $plants;
        $return['plants_GROWING'] = $plants_growing;
        $return['plants_RFT'] = $plants_RFT;
        $return['plants_OLD'] = $plants_OLD;
        // dd($plants[0]->Transaction()->first()->Invoice()->first()->Client()->get());

        return view('/plants/index', $return);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/plants/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $plant = new \App\Plant();
        $plant->user_id =  \Auth::user()->id;
        foreach ($request->all() as $key => $value) {
            
            switch ($key) {
                case 'name':
                case 'strain':
                case 'strainType':
                case 'seedOrigin':
                case 'stage':
                case 'IO':
                case 'startDate':
                case 'harvestDate':
                case 'yield':
                case 'description':
                    $plant->$key = $value;
                    break;
                
                default:
                    # code...
                    break;
            }
        }
        // dd($plant);
        $plant->save();

        $return['message'] = 'Plant Successfully added.';
        $plants = \Auth::user()
            ->Plant()
            ->get();
        $return['plants'] = $plants;

        return view('/plants/index', $return);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function show(Plant $plant)
    {

        $return['stock'] = $plant->Stock()->first();
        $return['plant'] = $plant;
        // dd($return['stock']->stock);
        return view('/plants/show', $return);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function edit(Plant $plant)
    {
        $return['plant'] = $plant;
        // dd($plant);/
        return view('/plants/edit', $return);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plant $plant)
    {
        
        foreach ($request->all() as $key => $value) {
            
            switch ($key) {
                case 'name':
                case 'strain':
                case 'strainType':
                case 'seedOrigin':
                case 'stage':
                case 'IO':
                case 'startDate':
                case 'harvestDate':
                case 'yield':
                case 'description':
                    $plant->$key = $value;
                    break;
                
                default:
                    # code...
                    break;
            }
        }
        $plant->save();

        return redirect('/plants/'.$plant->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plant $plant)
    {
        $plant_id = $plant->id;
        $temp_plant = \App\Plant::find($plant_id);
        $temp_plant->stage = 'OLD';
        $temp_plant->save();
        return redirect('/plants');
    }

    public function harvestCreate(Plant $plant){

        $return['plant'] = $plant;

        return view('/plants/harvest', $return);
    }

    public function harvestStore(Request $request, Plant $plant){

        $stock = new \App\Stock();

        foreach ($request->all() as $key => $value) {
            
            switch ($key) {
                case 'quality':
                case 'price':
                case 'notes':
                    $stock->$key = $value;
                    break;
                case 'stock':
                    $stock->$key = $value;
                    $plant->yield = $value;
                    break;

                default:
                    # code...
                    break;
            }
        }
        $stock->plant_id = $plant->id;
        $plant->stage = 'RFT';

        $plant->save();
        $stock->save();

        return redirect('/plants/'.$plant->id);
    }
}

<?php

namespace App\Http\Controllers;

use App\Client;
use App\Invoice;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        $clients =$user->Client()->get();
        $return['clients'] =  $clients;
        return view('/clients/index', $return);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/clients/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = \Auth::user();

        $client = \App\Client::firstOrCreate(
            ['fullName' => $request->fullName],
            ['information' => $request->information, 'user_id' => $user->id]);
        // dd($client);

        return redirect('/clients');
    }

    public function create_invoice(Client $client)
    {
        
        $return['client'] = $client;
        return view('/invoices/create', $return);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        $return['client'] = $client;
        // dd($client->Invoice()->get());
        return view('/clients/show', $return);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $return['client'] = $client;
        return view('/clients/edit',$return);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $client->fullName = $request->fullName;
        $client->information = $request->information;
        $client->save();
        return redirect('/clients/'.$client->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}

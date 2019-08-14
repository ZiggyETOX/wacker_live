<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use App\Client;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $transaction = new \App\Transaction();
        $transaction->plant_id = $request->plant_id;
        $transaction->price_gram = $request->price_gram;
        $transaction->grams = $request->grams;
        $transaction->amount = $request->amount;
        $transaction->invoice_id = $request->invoice_id;

        $stock = \App\Plant::find($request->plant_id)->Stock()->first();
        $stock->stock = $stock->stock - $transaction->grams;

        $invoice = \App\Invoice::find($request->invoice_id);
        $invoice->total = $invoice->total + $transaction->amount;
         
        $stock->save();
        $transaction->save();
        $invoice->save();

        return redirect('/invoices/'.$request->invoice_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        $plants = \App\Plant::all();

        $return['stock'] = \App\Plant::find($transaction->plant_id)->Stock()->first();
        $return['plants'] = $plants;
        $return['transaction'] = $transaction;
        return view('/transactions/edit', $return);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {

        $stock = \App\Plant::find($request->plant_id)->Stock()->first();
        $stock->stock = $stock->stock + $transaction->grams;
        $stock->stock = $stock->stock - $request->grams;

        $invoice = \App\Invoice::find($request->invoice_id);
        $invoice->total = $invoice->total - $transaction->amount;
        $invoice->total = $invoice->total + $request->amount;


        $transaction->plant_id = $request->plant_id;
        $transaction->price_gram = $request->price_gram;
        $transaction->grams = $request->grams;
        $transaction->amount = $request->amount;
        $transaction->invoice_id = $request->invoice_id;
        
        $stock->save();
        $transaction->save();
        $invoice->save();

        return redirect('/invoices/'.$request->invoice_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $invoice_id = $transaction->invoice_id;

        $invoice = \App\Invoice::find($invoice_id);
        $invoice->total = $invoice->total - $transaction->amount;

        $stock = \App\Plant::find($transaction->plant_id)->Stock()->first();
        $stock->stock = $stock->stock + $transaction->grams;

        $transaction->delete();
        // dd(sizeof($invoice->Transaction()->get()));
        if (sizeof($invoice->Transaction()->get()) < 1) {
            $invoice->delete();
        }
        else{
            $invoice->save();
        }
        $stock->save();

        return redirect('/clients/'.$invoice->client_id);
    }
}

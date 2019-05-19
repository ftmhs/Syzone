<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use DB ;
class ClientsControler extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
        $this->middleware('auth',['except' => ['index' ,'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     // $clients = Client::orderby('name','asc')->get();
     $clients = Client::orderby('name','asc')->paginate(10);
        return view('clients.index')->with('clients' , $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'contact' => 'required'
        ]);
      //CREATE THE CLIENT
      $client = new Client;
      $client->name = $request->input('name');
      $client->phone = $request->input('phone');
      $client->email = $request->input('email');
      $client->contact = $request->input('contact');
      $client->user_id =  auth()->user()->id;
            $client->save();
          return redirect('http://localhost/lsapp/public/clients')->with('sucess','Client Created ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
$client = Client::find($id);
 return view('clients.show')->with('client' , $client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $client = Client::find($id);
//check for correct user
      if(auth()->user()->id !== $client->user_id){
          return redirect('http://localhost/lsapp/public/clients')->with('error','Unauthorzed Page');
      }      
        return view('clients.edit')->with('client',$client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'contact' => 'required'
        ]);
      //update THE CLIENT
      $client = Client::find($id);
      $client->name = $request->input('name');
      $client->phone = $request->input('phone');
      $client->email = $request->input('email');
      $client->contact = $request->input('contact');
            $client->save();
          return redirect('http://localhost/lsapp/public/clients')->with('sucess','Client updated');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        //check for correct user
      if(auth()->user()->id !== $client->user_id){
        return redirect('http://localhost/lsapp/public/clients')->with('error','Unauthorzed Page');
    }      
        $client->delete();
        return redirect('http://localhost/lsapp/public/clients')->with('sucess','Client removed');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
class SitesController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     //   $this->middleware('auth');
     $this->middleware('auth',['except' => ['index' ,'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $sites = Site::orderby('domain_name','asc')->paginate(10);
        return view('sites.index')->with('sites',$sites);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sites.create');
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
            'domain_name' => 'required',
            'server' => 'required'
        ]);
          //CREATE THE site
      $site = new Site;
      $site->domain_name = $request->input('domain_name');
      $site->server = $request->input('server');
      $site->user_id =  auth()->user()->id;
            $site->save();
          return redirect('http://localhost/lsapp/public/sites')->with('sucess','Site Created ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $site = Site::find($id);
        return view('sites.show')->with('site',$site);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $site = Site::find($id);
 //check for correct user
        if(Auth()->user_id !== $site->user_id){
            return redirect('http://localhost/lsapp/public/sites')->with('error','Unauthorized page');
        }
        return view('sites.edit')->with('site',$site);
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
            'domain_name' => 'required',
            'server' => 'required'
        ]);
          //CREATE THE site
      $site = Site::find($id);
      $site->domain_name = $request->input('domain_name');
      $site->server = $request->input('server');
      $site->user_id =  auth()->user()->id;
            $site->save();
          return redirect('http://localhost/lsapp/public/sites')->with('sucess','Site updated ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $site = Site::find($id);
        //check for correct user
        if(Auth()->user_id !== $site->user_id){
            return redirect('http://localhost/lsapp/public/sites')->with('error','Unauthorized page');
        }
        $site->delete();
        return redirect('http://localhost/lsapp/public/sites')->with('sucess','site removed');
    }
}

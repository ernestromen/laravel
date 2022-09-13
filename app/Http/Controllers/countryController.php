<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Countries;
use  App\Models\User;
use Illuminate\Support\Facades\Auth;


class countryController extends Controller
{

     public function index(){
        $user_id = Auth::id();
        $user = User::find($user_id);

        return view('dashboard')->with(compact('user_id'))
        ->with('countries',$user->countries);
         }




    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id'=>'required',
            'name'=>'required|max:20|unique:countries',
            'iso'=>'required|max:4|unique:countries'
        ]); 
        $data['iso'] = strtoupper($data['iso']);
        Countries::create($data);
        return redirect()->back();
    }


 

    public function edit($id)
    {
    $data = Countries::where('id',$id)->get();
     return view('edit',compact('data'));

    }


    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'name'=>'required|max:20',
            'iso'=>'required|max:3'
        ]);

         $nameExists = Countries::where('name',$request->name)->get();
         $isoExists = Countries::where('iso',$request->iso)->get();
        if(count($nameExists)>0 && count($isoExists)>0){    
            $request->validate([
                'name'=>'required|max:20|unique:countries',
                'iso'=>'required|max:3|unique:countries'
            ]); 
                 
            return redirect('dashboard');

        }else if(count($nameExists)>0){
            $country = Countries::find($id);
            $country->iso = strtoupper($request->input('iso'));
            $country->update();
            
        }else if(count($isoExists)>0){
            $country = Countries::find($id);
            $country->name = $request->input('name');
            $country->update();
        }
        return redirect('dashboard');

        
        }


    public function destroy($id)
    {
        $country = Countries::find($id);
        $country->delete();
        return redirect('dashboard');
    }
}

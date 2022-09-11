<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Countries;


class countryController extends Controller
{


    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id'=>'required',
            'name'=>'required|max:20|unique:countries',
            'currency'=>'required|max:3|unique:countries'
        ]); 

        $data['currency'] = strtoupper($data['currency']);
        Countries::create($data);
        return redirect()->back();
    }


 

    public function edit($id)
    {
      
        return view('edit',compact('id'));

    }


    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'name'=>'required',
            'currency'=>'required|max:3|unique:countries'
        ]); 
          $country = Countries::find($id);
          $country->name = $request->input('name');
          $country->currency = strtoupper($request->input('currency'));
          $country->update();
          return redirect('dashboard');
        }


    public function destroy($id)
    {
        $country = Countries::find($id);
        $country->delete();
        return redirect('dashboard');
    }
}

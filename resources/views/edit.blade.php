

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @foreach($data as $d)
    {{-- {{dd($d->name)}} --}}
    @endforeach
@if(count($data)>0)
@foreach($data as $d)
    <div style="margin:auto;margin-top:30px;" class="block p-6 rounded-lg shadow-lg bg-white max-w-sm">
        {{ Form::open(array('url' => '/dashboard/edit/' .$d->id)) }}
        <div class="form-group mb-6">
            <label for="exampleInputEmail1" class="form-label inline-block mb-2 text-gray-700">Name</label>
            <input type="text" class="form-control
              block
              w-full
              px-3
              py-1.5
              text-base
              font-normal
              text-gray-700
              bg-white bg-clip-padding
              border border-solid border-gray-300
              rounded
              transition
              ease-in-out
              m-0
              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInputEmail1"
              name="name"
              placeholder="Enter Name"
              value="{{$d->name}}"
              >
      
          </div>
          <div class="form-group mb-6">
            <label for="iso" class="form-label inline-block mb-2 text-gray-700">ISO</label>
            <input name="iso" type="text" class="form-control block
              w-full
              px-3
              py-1.5
              text-base
              font-normal
              text-gray-700
              bg-white bg-clip-padding
              border border-solid border-gray-300
              rounded
              transition
              ease-in-out
              m-0
              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              name="currency"
              placeholder="Enter ISO"
              value={{$d->iso}}>
          </div>
      
          <button type="submit" class="
            px-6
            py-2.5
            bg-blue-600
            text-white
            font-medium
            text-xs
            leading-tight
            uppercase
            rounded
            shadow-md
            hover:bg-blue-700 hover:shadow-lg
            focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
            active:bg-blue-800 active:shadow-lg
            transition
            duration-150
            ease-in-out"
            style="margin:auto;display:flex">Submit</button>

            @if(count($errors) >0) 
            <div style="margin-top:10px;text-align:center;background-color:red;border:3px solid black;color:white;width:100%;padding-top:5px;padding-bottom:5px;">
            {{-- @if($errors->first('name')) --}}
            @error('name')
            <span>*{{$errors->first('name')}}</span>
            <br>
            @enderror
            {{-- @if($errors->first('email')) --}}
            @error('iso')
            <span>*{{$errors->first('iso')}}</span>
            @enderror
            </div>
            @endif
            {{ Form::close() }}
        </div>

@endforeach
@endif
    </x-app-layout>

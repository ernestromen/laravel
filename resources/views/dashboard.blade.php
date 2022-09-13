<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>



                <div class="border-solid grid grid-cols-2 gap-4" style="padding-left:20px;margin-top:23px;margin-bottom:23px;">
                    <div class=" border border-solid border-grey-300" >
                        <div class="mb-3 ">
                            @if(count($errors) >0) 
                            <div style="margin-bottom:10px;text-align:center;background-color:red;border:3px solid black;color:white;width:100%;padding-top:5px;padding-bottom:5px;">
                            @error('name')
                            <span>*{{$errors->first('name')}}</span>
                            <br>
                            @enderror
                            @error('iso')
                            <span>*{{$errors->first('iso')}}</span>
                            @enderror
                            </div>
                            @endif
                            {{ Form::open(array('url' => '/dashboard')) }}

                     

                            <div style="padding-left:20px;padding-top:10px;padding-bottom:10px;" class="bg-lgrey border border-solid border-black-600 ">Add New Country</div>
                          <label style="padding-left:20px;padding-top:10px;"  class="form-label inline-block mb-2 text-gray-700"
                            >Name</label
                          >
                          <input
                          name="name"
                          style="width: 90%;
                          margin-left: 20px;"
                            type="text"
                            class="
                              form-control
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
                              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                            "
                            placeholder="Enter Name"
                          />
                          <br>
                          <label style="padding-left:20px;" class="form-label inline-block mb-2 text-gray-700"
                            >ISO</label
                          >
                          <input
                          name="iso"
                          style="width: 90%;
                          margin-left: 20px;"
                            type="text"
                            class="
                              form-control
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
                              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                            "
                            placeholder="Enter ISO"
                            />
                         <input name="user_id" type="hidden" value={{$user_id}} />
                         <div class="bg-lgrey border border-solid border-gray-300 flex" style="justify-content:end;margin-top:20px;">
                            <button type="submit" class="bg-lgrey" style="background-color:black;color:white;margin-right:20px;margin-top:10px;margin-bottom:10px;width:25%;
                            border-radius:7px;
                            height:33px;
                            font-size:18px;
                            padding-top:2px;
                            ">SAVE</button>
                         </div>
                        </div>
                     
                      </div>
                      
                      {{ Form::close() }}



                      <div
                      class="border border-solid border-grey-300"
                      style="margin-right:20px;"
                      >
                    <div class="bg-lgrey border border-solid border-black-600 " style="padding-left:20px;padding-top:10px;padding-bottom:10px;">List of countries</div>
                        <div style="padding-left:32px;font-weight:600; margin-left:10px;margin-right:10px;border-top:1px solid grey;border-bottom:2px solid grey;margin-top:16px;
                        padding-top:10px;
                        padding-bottom:10px;
                        " class="grid grid-cols-5 gap-4">
                            <div>#</div>
                            <div>Name</div>
                            <div>ISO</div>
                            <div>Edit</div>
                            <div>Delete</div>
                        </div>
@if(count($countries) > 0) 
        @foreach($countries as $country) 
                        <div style="padding-left:32px;font-weight:600; margin-left:10px;margin-right:10px;border-top:1px solid grey;border-bottom:1px solid grey;margin-top:16px;
                        padding-top:10px;
                        padding-bottom:10px;
                        " class="grid grid-cols-5 gap-4">
                            <div>{{$country->id}}</div>
                            <div>{{$country->name}}</div>
                            <div>{{$country->iso}}</div>
                           
                            <div>
                              <a href="{{ url('dashboard/edit/'.$country->id) }}" style="background-color:#007bff;
                            color:white;
                            padding-top:5px;
                            padding-left:10px;
                            padding-right:10px;
                            padding-bottom:5px;
                            border-radius:5px;" class="bg-blue-600">Edit</a>
                            </div>
                           
                            <div style="margin-top:-4px;">
                                {{ Form::open(array('url' => '/dashboard/delete'.'/'.$country->id)) }}
                                

                                <button type ="submit"  style="background-color:#007bff;
                            color:white;
                            padding-top:5px;
                            padding-left:10px;
                            padding-right:10px;
                            padding-bottom:5px;
                            border-radius:5px;" class="bg-blue-600">Delete</button>
                                {{ Form::close() }}

                            </div>
                        </div>
         @endforeach
   @endif

                    </div>
                    
                    </div>


     
             
            </div>
        </div>
    </div>
</x-app-layout>

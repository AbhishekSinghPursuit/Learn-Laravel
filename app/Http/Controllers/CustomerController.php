<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $url = url('/customer');
        $title = "Customer Registration";
        $data = compact('url', 'title');
        return view('customer')->with($data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        echo "<pre>";
        print_r($request->all());

        $customer = new Customer;
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->gender = $request['gender'];
        $customer->address = $request['address'];
        $customer->state = $request['state'];
        $customer->country = $request['country'];
        $customer->dob = $request['dob'];
        $customer->age = $request['age'];
        $customer->status = $request['status'];
        $customer->password = md5($request['password']);

        $customer->save();

        return redirect('/customer/view');
    }

    public function view()
    {
        // fetch customer data from database
        $customers = Customer::all();

        // echo "<pre>";
        // print_r($cusotmers->toArray()); // toArray() when data exists

        $data = compact('customers'); // make array

        return view('customer_view')->with($data);
    }

    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        if(is_null($customer)){
            return redirect('/customer/view');
        }else{
            // making url for update page
            $url = url('/customer/update') .'/'. $id;
            $title = "Update Customer";
            $data = compact('customer', 'url', 'title');
            return view('customer')->with($data);
        }
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
        $customer = Customer::find($id);
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->gender = $request['gender'];
        $customer->address = $request['address'];
        $customer->state = $request['state'];
        $customer->country = $request['country'];
        $customer->dob = $request['dob'];
        $customer->age = $request['age'];
        if($request['status']){
            $customer->status = $request['status'];
        }else{
            $customer->status = "0";
        }
        $customer->password = md5($request['password']);

        $customer->save();

        // echo "<pre>";
        // print_r($customer);
        return redirect('/customer/view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        if(!is_null($customer)){
            $customer->delete();
        }
        // echo "<pre>";
        // print_r($customer);
        // return redirect()->back(); // it can create a loop 
        return redirect('/customer/view');
    }
}

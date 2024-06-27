<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
// {

//     public function customersData(){
//     	$customers = Customer::all();
//     	return view('Admin.all_customers',compact('customers'));
//     }

//     public function update($id,Request $request)
//     {
       
//         $customers =  Customer::find($id);
//         $customers->name = $request->name;
//         // $customers->email = $request->email;
//         // $customers->password = $request->password;
//         // $customers->gender = $request->gender;
//         // if($request->is_active){
//         //     $employee->is_active = 1;

//         // }
      
//         // $employee->date_of_birth = $request->date_of_birth;
//         // $employee->roll = $request->roll;

//         if($employee->save())
//         {
           
//             return redirect()->back()->with(['msg' => 1]);
//         }
//         else
//         {
//             return redirect()->back()->with(['msg' => 2]);
//         }
     
//         return view('update.customer',compact('customers'));

//     }

//     public function edit($id){
//         $customers = Customer::find($id);
//         return view('edit.customer', compact('customers'));
//     }
    
// }
{
    public function index()
    {
        $customer = new Customer();
        $customer = $customer->get();
        return view('dashbord.dashbord',[
            'customer' =>$customer
            ]);

    }//fungsi untuk menampilkan list customer

    public function customersEdit($id)
    {
        $customers = Customer::find($id);
     
        return view('Admin.edit_customer',compact('customers'));

    }//fungsi untuk menampilkan edit customer

    public function storeCustomers(Request $request){

        Customer::where('id',$request->id)->update([
           'name' => $request->update_name,
           'email' => $request->update_email,
           'address' =>$request->update_address,
           'phone' => $request->update_phone,
           'company' => $request->update_company,

        ]);
        
        return Redirect()->route('all.customers');
    }//fungsi untuk menyimpan customer yang sudah di edit


    public function create()
    {
        return view('customer.create');

    }//fungsi untuk menampilkan form menambahkan customer

    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->company = $request->company;

        $customer->save();
        return Redirect()->route('add.customer');
        
    }//fungsi untuk menyimpan inputan ke databse

    // public function update($id,Request $request)
    // {
       
    //     $customer =  Customer::find($id);
    //     $customer->name = $request->name;
    //     $customer->email = $request->email;
    //     $customer->password = $request->password;
    //     $customer->gender = $request->gender;
    //     if($request->is_active){
    //         $customer->is_active = 1;

    //     }
      
    //     $customer->date_of_birth = $request->date_of_birth;
    //     $customer->roll = $request->roll;

    //     if($customer->save())
    //     {
           
    //         return redirect()->back()->with(['msg' => 1]);
    //     }
    //     else
    //     {
    //         return redirect()->back()->with(['msg' => 2]);
    //     }
     
    //     return view('customer.edit',compact('customers'));

    // }//fungsi untuk mengupdate data customer yang ada di db

        
    public function customersData(){
        $customers = Customer::all();
        return view('Admin.all_customers',compact('customers'));
    }//fungsi untuk menmpilkan semua list customer yang ada di db
         
     

    public function delete(Request $request)
    {
        $customer =  Customer::find($request->id);
        if($customer->delete())
        {
           
            return redirect()->back()->with(['msg' => 1]);
        }
        else
        {
            return redirect()->back()->with(['msg' => 2]);
        }

    }//fungsi untuk menghapus customer di db

}
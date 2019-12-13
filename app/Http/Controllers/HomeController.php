<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Auth;
use Session;

use App\User;
use App\Customer;

class HomeController extends Controller{
	public function _construct(){
		
	}

	public function index(){
		return view('home.home');
	}

	public function about(){
		return view('home.about');
	}

	public function register(){
		return view('home.register');
	}

	public function register_operation(Request $request){
		$validationRules = [
			'user_name' => 'required|min:6|max:15',
			'user_email' => 'required|email|unique:users,user_email',
			'user_password' => 'required|min:6|max:15'
		];
		
		$validator = Validator::make($request->all(), $validationRules);
		
		if($validator->fails()){
			return redirect()->back()->withInput()->withErrors($validator);
		}else{
			User::create($request->all());
       		return redirect('login')->with('success', 'User registered successfully!');	
		}		
	}

	public function login(){
		return view('home.login');
	}

	public function login_operation(Request $request){
		$validationRules = [
			'user_email' => 'required|email',
			'user_password' => 'required|min:6|max:15',
		];

		$validator = Validator::make($request->all(), $validationRules);

		if($validator->fails()){
			return redirect()->back()->withInput()->withErrors($validator);
		}else{
			if ($request->input('user_email') == 'bose@gmail.com' && $request->input('user_password') == 'bose@123') {
				Session::put('auth_id', 1);
				$request->session()->put('auth_email', $request->input('user_email'));
				return redirect('dashboard')->with('success', 'Loggedin successfully!');		
			}else{
				return redirect()->back()->withInput()->with('warning', 'Given credentials are wrong!');
			}
		}
	}

	public function logout(){
		Session::forget('auth_id');
		Session::forget('auth_email');
		return redirect('/')->with('success', 'Logout successfully!');
	}
	 
	public function dashboard(Request $request){
		if(!$request->session()->has('auth_id')){
			return redirect('login');
		}

		$customers = Customer::orderBy('id', 'desc')->get();
		$structure = $this->customer_structure($customers);
		return view('home.dashboard', compact('structure'));
	}

	public function new_customer(Request $request){
		if(!$request->session()->has('auth_id')){
			return redirect('login');
		}
		return view('home.new_customer');
	}

	public function store_new_customer(Request $request){
		if(!$request->session()->has('auth_id')){
			return redirect('login');
		}
		$validationRules = [
			'name' => 'required|min:3|max:25',
			'email' => 'required|email|unique:customers,email',
			'mobile' => 'required|numeric|digits:10',
			'salary' => 'required|numeric',
		];
		$validator = Validator::make($request->all(), $validationRules);
		
		if($validator->fails()){
			return redirect()->back()->withInput()->withErrors($validator);
		}else{
			Customer::create($request->all());
			return redirect('/dashboard')->with('success', 'New customer added successfully!');
		}
	}

	public function edit_customer(Request $request, $id){
		if(!$request->session()->has('auth_id')){
			return redirect('login');
		}
		$customer = Customer::find($id);
		return view('home.edit_customer', compact('customer'));
	}

	public function store_edit_customer(Request $request, $id){
		if(!$request->session()->has('auth_id')){
			return redirect('login');
		}
		$validationRules = [
			'name' => 'required|min:3|max:25',
			'email' => 'required|email',
			'mobile' => 'required|numeric|digits:10',
			'salary' => 'required|numeric',
		];
		$validator = Validator::make($request->all(), $validationRules);
		
		if($validator->fails()){
			return redirect()->back()->withInput()->withErrors($validator);
		}else{
			$customer = Customer::find($id);
			$customer->name = $request->input('name');
			$customer->email = $request->input('email');
			$customer->mobile = $request->input('mobile');
			$customer->salary = $request->input('salary');
			$customer->save();
			return redirect('/dashboard')->with('success', 'Customer details updated successfully!');
		}
	}

	public function filter_customer(Request $request){
		$keyword = $request->input('keyword');
		$customers = Customer::query()->where('name', 'LIKE', "%{$keyword}%")->orWhere('email', 'LIKE', "%{$keyword}%")->get();
		$structure = $this->customer_structure($customers);
		return $structure;
	}

	public function customer_structure($customers){
		$structure = '';
		if(!empty($customers)){
			$structure .= '
			<table class="table table-hover">
                <thead class="thead-dark thead-custom">
                    <tr>
                        <th>NAME</th>
                        <th>E-MAIL</th>
                        <th>MOBILE</th>
                        <th>SALARY</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>';
                    foreach ($customers as $customer) {
					$structure .= '
                    <tr>
                        <td>'.$customer->name.'</td>
                        <td>'.$customer->email.'</td>
                        <td>'.$customer->mobile.'</td>
                        <td>'.$customer->salary.'</td>
                        <td><a href="/edit-customer/'.$customer->id.'"><i class="fas fa-edit text-warning"></i></a></td>
                    </tr>';
                    }
                $structure .= '
                </tbody>
            </table>';
        }else{
        	$structure .= '<h4>There is no Customers, please add new</h4>';
        }
		return $structure;
	}

}



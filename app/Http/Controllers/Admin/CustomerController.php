<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseController;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerController extends ResponseController
{
    public function index(Request $request)
    {   
        $query = Customer::latest();
        $name = $request->query('name');
        $email = $request->query('email');
        $login_type = $request->query('login_type');
        $email_verified = $request->query('email_verified');
        $date = $request->query('date');

        if($name) {
            $query->where('name', 'like', '%'.$name.'%');
        }

        if($email) {
            $query->where('email', 'like', '%'.$email.'%');
        }

        if($login_type) {
            $query->where('login_type', $login_type);
        }

        if($email_verified == 'yes') {
            $query->where('email_verified_at', '!=', null);
        }

        if($date) {
            $query->whereDate('created_at', $date);
        }

        $array = array(
            'name' => $name,
            'email' => $email,
            'login_type' => $login_type,
            'email_verified' => $email_verified,
        );

        session()->put('filter', $array);

        $users = $query->paginate(10)->appends($request->except('page'));
        return view('admin.customer.index', compact('users'));
    }

    public function show($id)
    {
        $user = Customer::findOrFail($id);
        return view('admin.customer.show', compact('user'));
    }

    public function create()
    {   
        return view('admin.customer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required |unique:users',
            'password' => 'min:8 |max:20|same:confirm_password',
            'confirm_password' => 'min:8|max:20'
        ]);

        $user = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->assignRole($request->role);
        return redirect()->route('userIndex')->with('message', 'User created successfully');
    }

    public function edit($id)
    {   
        $user = Customer::findOrFail($id);
        return view('admin.customer.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {  
        $user = Customer::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id),
            ],
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->route('customerIndex');
    }

    public function change_state(Request $request)
    {
        $user = Customer::findOrFail($request->id);
        if($user) {
            if($user->status == 0) {
                $user->status = 1;
                $user->save();
                return $this->successMessage($user, 'Customer Ban Successfully');
            } else {
                $user->status = 0;
                $user->save();
                return $this->successMessage($user, 'Customer Unbanned Successfully');
            }
        } else {
            return $this->errorMessage();
        }
    }

    public function delete(Request $request)
    {
        $user = Customer::find($request->id);
        if($user) {
            $user->delete();
            return $this->successMessage('', 'Customer Deleted Successfully');
        } else {
            return $this->errorMessage();
        }
    }
}

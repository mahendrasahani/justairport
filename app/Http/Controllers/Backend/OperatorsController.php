<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules; 
use Illuminate\Validation\Rule;  

class OperatorsController extends Controller
{
    public function index(){ 
        $operators = User::where('role_id', 4)->orderBy('id', 'desc')->paginate(10);
        return view('backend.operator.index', compact('operators'));
    }

    public function create(){
        return view('backend.operator.create');
    }

    public function store(Request $request){  
        $request->validate([
            'first_name' => ['required', 'string', 'max:20'],
            'last_name' => ['max:20'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'phone' => ['required', 'numeric', 'digits:10', 'unique:'.User::class],
            'username' => ['required', 'string', 'lowercase', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]); 
        $user = User::create([
            'name' => $request->first_name .' '. $request->last_name ?? '',
            'first_name' => $request->first_name,
            'last_name' => $request->last_name ?? '',
            'email' => $request->email,
            'phone' => $request->phone,
            'username' => strtolower($request->username),
            'password' => Hash::make($request->password),
            'role_id' => 4
        ]); 
        return redirect()->route('admin.operators.index')->with('operator_created', 'Operator has been added successfully.');
    }

    public function edit($id){
        $user = User::where('id', $id)->first();
        return view('backend.operator.edit', compact('user'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'first_name' => ['required', 'string', 'max:20'],
            'last_name' => ['max:20'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)->ignore($id)],
            'phone' => ['required', 'numeric', 'digits:10', Rule::unique(User::class)->ignore($id)],
            'username' => ['required', 'string', 'max:255', Rule::unique(User::class)->ignore($id)],
        ]);
        $user = User::where('id', $id)->update([
            'name' => $request->first_name .' '. $request->last_name ?? '',
            'first_name' => $request->first_name,
            'last_name' => $request->last_name ?? '',
            'email' => strtolower($request->email),
            'phone' => $request->phone,
            'username' => strtolower($request->username),
            'password' => Hash::make($request->password),
            'role_id' => 4
        ]);

        if($request->password != ''){
            $user = User::where('id', $id)->update([
                'password' => Hash::make($request->password),   
            ]);

        }
        return redirect()->route('admin.operators.index')->with('operator_updated', 'Operator has been updated successfully.');
    }


}

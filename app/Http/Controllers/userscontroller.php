<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required | string',
            'address'=>'required',
            'phone'=>'required'

        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->address = $request->address;
        $user->phone = $request->phone;

$user->save();
Auth::login($user);
return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * R
     * emove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function logout(){
        Auth::logout();
        return view('login');
    }

    public function login(Request $request){
        $validator = validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required'

        ]);
        if($validator->fails()){
            return redirect()->route('login')->withErrors($validator);
                }
        $user = User::where('email',$request->email)->first();
        if(!$user)
        {
            return redirect()->route('signup')->with('error','Email does not exist. Please sign up');
        }

        if(!Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect()->route('login')->with('error', 'Wrong password. Please try again.');
        }
        elseif(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
Auth::login($user);
        return redirect()->route('user.index');
        }
        else{
        return redirect()->route('login')->withErrors($validator);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{


    public function login_page(){
        return view("auth.login");
    }


    public function login_logic(Request $request){


        $username = $request->username;
        $password = $request->password;

       $user = User::where("username",$username)->where("password",$password)->first();

        if ($user) {

            session()->put('user-data',$user);
           
            return redirect("/dashboard");
    
        } else {
            
            session()->flash("error","تأكد من إسم المستخدم وكلمة المرور");

            return redirect("/login");
        }
    }

    public function logout(Request $request){


            session()->flush();
            return redirect("/login");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Data = User::all();

        return view("users.view" , ["Data" => $Data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            "name" => "required",
            'username' => 'required|unique:users|regex:/^[a-zA-Z]+$/',
            "password" => "required|min:6",
        ],[ 
            "name.required" => "حقل الإسم مطلوب",
            'username.required' => 'إسم المستخدم مطلوب',
            'username.unique' => 'إسم المستخدم موجود من قبل',
            'username.regex' => 'إسم المستخدم بالإنجليزية فقط بدون مسافات',
            "password.required" => "كلمة السر مطلوبة",
            "password.min" => "أقل حروف لكلمة السر 6 حروف",
        ]);

        $query = User::create([
            "name" => $request->name,
            'username' => $request->username,
            "password" => $request->password,
        ]);

        if ($query) {
            session()->flash('message',"تم إضافة المستخدم بنجاح");
            return view("users.create");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query =  User::find($id);

      if ($query) {

        $query->delete();

        session()->flash("message","تم حذف المستخم بنجاح");

        return redirect("/users");

    } else {

        session()->flash("error","رقم المستخم غير موجود");

        return redirect("/users");

      }
    }
}

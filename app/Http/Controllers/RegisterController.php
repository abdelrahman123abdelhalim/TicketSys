<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\loginRequest;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    
    public function showRegistrationForm()
    {
    return view('admin.Registeration.register');
    }
    
    public function register(RegisterRequest $request)
    {
        $userCode = mt_rand(100, 999);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $path = $image->storeAs('public/images', $imageName);
        }
        $user = User::create([
            'name'         => $request->name,
            'company_name' => $request->company_name,
            'email'        => $request->email,
            'mobile'       => $request->mobile,
            'password'     => bcrypt($request->password),
            'image'        => $imageName,
            'user_type'    => $request->user_type,
            'user_code' => $userCode,

        ]);
        return redirect()->route('login_form')->with('success', 'تم التسجيل بنجاح ');
    }

    public function showLoginForm()
    {
        return view('admin.login.login');
    }

    public function login(loginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->user_type == 1) {
                return redirect()->route('ticket.view',Auth::user()->user_code);
            }else {
                return redirect()->route('admin.tickets.index')->with('success', 'تم الدخول بنجاح ');
            }
        }
        return back()->withInput()->withErrors(['email' => 'الرجاء التاكد من البريد الإلكتروني او كلمة المرور ']);
    }

    public function logout()
    {
        Auth::logout();   
        return redirect()->route('login_form');
    }

}
<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
    $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
    return view('admin.Registeration.register');
    }
    
    public function register(RegisterRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->storeAs('images', $imageName);
        }
        $user = User::create([
            'name'         => $request->name,
            'company_name' => $request->company_name,
            'email'        => $request->email,
            'mobile'       => $request->mobile,
            'password'     => bcrypt($request->password),
            'image'        => $imageName,
        ]);
        return back()->with('success', 'Registration successful! Please log in.');
    }
}
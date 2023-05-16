<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\CartItem;

use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    protected function authenticated(Request $request, $user)
{
    CartItem::where('cart_id', $user->id)->delete();
    // Check if the user already has a cart
    $cart = Cart::where('user_id', $user->id)->first();

    if (!$cart) {
        // Create a new cart if it doesn't exist
        Cart::create([
            'user_id' => $user->id,
            'created_at' => now(),
        ]);
    }
    
}

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }




    
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    
    public function handleGoogleCallback(Request $request)
    {
        $user = Socialite::driver('google')->user();
    
        // You can customize the logic to handle the user's data
        // For example, you can check if the user exists and log them in, or create a new user account
    
        // Here's an example of logging in the user if they exist in your system
        $existingUser = User::where('email', $user->getEmail())->first();
    
        if ($existingUser) {
            Auth::login($existingUser);
            return redirect()->intended('/');
        }
    
        // If the user doesn't exist, you can redirect them to a registration page or create a new user account
    
        return redirect('/register')->with('googleUser', $user);
    }
    

public function redirectToProvider($provider)
{
    return Socialite::driver($provider)->redirect();
}

public function handleProviderCallback($provider)
{
    $user = Socialite::driver($provider)->user();

    // Do something with the user data, such as creating a new account or logging them in

    return redirect('/home');
}
public function showLoginForm()
{
    Session::flash('login_required', 'Please log in to register a store.');
    return view('auth.login');
}
public function login(Request $request)
{
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        return redirect()->intended();
    }
    return redirect()->back()->withInput();
}


}

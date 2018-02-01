<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use App\Http\Requests\loginZanibalUser;
use Socialite;
use Auth;
use SoapClient;
use DB;
use Session;


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

    use AuthenticatesUsers;

    /**
    * Override the username method used to validate login
    *
    * @return string
    */
    public function username()
    {
        return 'username';
    }

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Redirect the user to the OAuth Provider.
     *
     * @param String $providerName The name of the OAuth used for authentication
     *
     * @return Response
     */
    public function redirectToProvider($providerName)
    {
        return Socialite::driver($providerName)->redirect();
    }

    /**
     * Obtain the user information from the OAuth provider.
     *
     * Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that
     * redirect them to the authenticated users homepage.
     *
     * @param String $providerName The name of OAuth Provider used for authentication
     *
     * @return Response
     */
    public function handleProviderCallback($providerName)
    {
        $user = Socialite::driver($providerName)->user();
        
        $authenticatedUser = $this->findOrCreateUser($user, $providerName);

        Auth::login($authenticatedUser, true);

        return redirect($this->redirectTo);
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     *
     * @param  \Laravel\Socialite\ $user Socialite user object
     * @param   string $providerName Social auth provider
     *
     * @return  User
     */
    private function findOrCreateUser($user, $providerName)
    {
        $authenticatedUser = User::where('provider_id', $user->id)->first();

        if ($authenticatedUser) {
            return $authenticatedUser;
        }

        $username = "";
        if( ($providerName == "google") || ($providerName == "twitter") ) {
            $username = $user->name;
        }
      
        $newUser = User::create([
            'username'    => $username,
            'email'       => $user->email,
            'provider'    => $providerName,
            'provider_id' => $user->id
        ]);

        /**
         * Dispatch the newUserCreated event so the various actions that need to be *    carried out when a user is created are done.
         *
         * The actions include:
         *  
         *
         */
        //event(new NewUserCreated($newUser));

        return $newUser;
    }

    /**
     * Authenticate users via zanibal
     * 
     * @return User
     */
    public function loginWithZanibal(loginZanibalUser $request)
    {
        $credentials = $request->all();

        $username = $credentials['username'];
        $password = $credentials['password'];

        $wsdl = $this->zanibalWSDL();

        try{

             $zanibalToken = $wsdl->login($username, $password);

             // Incorrect credentials
            if(!$zanibalToken) {
                return Response::json(['error' => 'Invalid username or password'], 401);
            }
            // Correct credentials 
            else {
                $zanibalUser = DB::connection('zanibal')->select('select * from partner where portalUserName = ?', [$username])[0];
                 
                 /**
                  * The firstOrNew does not persist the user to the database (because the user already exists on zanibal). To persist the user on the local DB use firstOrCreate
                  * 
                  */
                 $newUser = User::firstOrNew([
                    'username'        => $zanibalUser->portalUserName,
                    'email'       => $zanibalUser->EMAILADDRESS1,
                    'provider'    => 'zanibal',
                    'provider_id' => $zanibalUser->name
                ]);

                Auth::login($newUser, true);
                return redirect($this->redirectTo);
            }

        } catch (\Exception $ex) {
             //Session::flash('error', 'We don\'t recognize this user ID or password');
            return redirect()->back()->with('invalidZanibalUserMessage', 'We don\'t recognize this user ID or password');
        }

    }

 

}

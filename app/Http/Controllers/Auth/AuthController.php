<?php namespace Nwidart\Http\Controllers\Auth;

use Illuminate\Routing\Controller;
use Illuminate\Contracts\Auth\Authenticator;

use Nwidart\Http\Requests\Auth\LoginRequest;
use Nwidart\Http\Requests\Auth\RegisterRequest;
use Nwidart\User;

class AuthController extends Controller
{
    /**
     * The authenticator implementation.
     *
     * @var Authenticator
     */
    protected $auth;

    /**
     * Create a new authentication controller instance.
     *
     * @param  Authenticator $auth
     * @return \Nwidart\Http\Controllers\Auth\AuthController
     */
    public function __construct(Authenticator $auth)
    {
        $this->auth = $auth;

        $this->beforeFilter('csrf', ['on' => ['post']]);
        $this->beforeFilter('guest', ['except' => ['getLogout']]);
    }

    /**
     * Show the application registration form.
     *
     * @return Response
     */
    public function getRegister()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  RegisterRequest $request
     * @return Response
     */
    public function postRegister(RegisterRequest $request)
    {
        User::create($request->all());

        $this->auth->login($user);

        return redirect('/');
    }

    /**
     * Show the application login form.
     *
     * @return Response
     */
    public function getLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  LoginRequest $request
     * @return Response
     */
    public function postLogin(LoginRequest $request)
    {
        if ($this->auth->attempt($request->only('email', 'password'))) {
            return redirect('/');
        }

        return redirect('/login')->withErrors(
            [
                'email' => 'The credentials you entered did not match our records. Try again?',
            ]
        );
    }

    /**
     * Log the user out of the application.
     *
     * @return Response
     */
    public function getLogout()
    {
        $this->auth->logout();

        return redirect('/');
    }

}

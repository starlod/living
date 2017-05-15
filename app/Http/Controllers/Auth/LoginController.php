<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LoginHistory;

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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    private $reader;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * リクエストから認証に必要な資格情報を取得します。
     *
     * @link http://y6rasaki.hatenablog.com/entry/2016/11/17/222713
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $login = $request->input($this->username());
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        $request->merge([$field => $login]);
        return $request->only($field, 'password');
    }

    /**
     * コントローラが使用するログインユーザ名を取得します。
     *
     * @return string
     */
    public function username()
    {
        return 'login';
    }

    /**
     * ユーザー認証成功時
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        LoginHistory::create([
            'user_id'      => $user->id,
            'status'       => 'authenticated',
            'login_at'     => new \DateTime(),
            'agent'        => $_SERVER['HTTP_USER_AGENT'],
            'ip'           => $_SERVER['REMOTE_ADDR'],
            'errors'       => '',
            // 'country_name' => geoip_country_name_by_name($_SERVER['REMOTE_ADDR']),
            // 'country_code' => geoip_country_code_by_name($_SERVER['REMOTE_ADDR']),
        ]);
    }

    /**
     * ユーザーをアプリケーションからログインします。
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        LoginHistory::create([
            'user_id'      => $request->user()->id,
            'status'       => 'logout',
            'login_at'     => new \DateTime(),
            'agent'        => $_SERVER['HTTP_USER_AGENT'],
            'ip'           => $_SERVER['REMOTE_ADDR'],
            'errors'       => '',
            // 'country_name' => geoip_country_name_by_name($_SERVER['REMOTE_ADDR']),
            // 'country_code' => geoip_country_code_by_name($_SERVER['REMOTE_ADDR']),
        ]);

        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect('/');
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];

        LoginHistory::create([
            'user_id'      => 0,
            'status'       => 'auth_failed',
            'login_at'     => new \DateTime(),
            'agent'        => $_SERVER['HTTP_USER_AGENT'],
            'ip'           => $_SERVER['REMOTE_ADDR'],
            'errors'       => trans('auth.failed'),
            // 'country_name' => geoip_country_name_by_name($_SERVER['REMOTE_ADDR']),
            // 'country_code' => geoip_country_code_by_name($_SERVER['REMOTE_ADDR']),
        ]);

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }
}

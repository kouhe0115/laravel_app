<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

//    use Illuminate\Foundation\Auth\AuthenticatesUsersの使用の宣言と
//    use AuthenticatesUsersでAuthenticatesUsersに定義されている、メソッドが
//    定義された状態と同意義である。
    use AuthenticatesUsers;
    
    protected $maxAttempts = 3;     // ログイン試行回数（回）
//  protected $decayMinutes = 10;   // ログインロックタイム（分）

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/home';
    protected $redirectTo = '/todo';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//      except('logout')でログアウトパスへアクセスできるユーザーの権限を変更してる。
//      logoutのパスから、guestを取り除き、アクセスできるようにしている
        $this->middleware('guest')->except('logout');
    }
    
//  トレイトに定義されている、loggedOutメソッドをオーバーライドしリダイレクト先の変更をしている
    public function loggedOut(Request $request)
    {
        return redirect('/login');
    }
}

//vendor以下のファイルはgitでも管理されないファイルになっていて、仮に変更しても意味もないし、
//それはlaravelでなくなる

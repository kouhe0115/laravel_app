<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
//  ユーザー登録画面の表示
    public function showRegistrationForm()
    {
//      authディレクトリのregisterファイルの表示
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
//      $thisはregisterコントローラオブジェクトを指す。
//      $this->validator($request->all())でバリデートの処理は終わっており、リダイレクトやエラーの処理は
//      validateメソッドを使って実行する
        $this->validator($request->all())->validate();

//      リクエストされた情報を元にユーザーのレコードを作成する
        event(new Registered($user = $this->create($request->all())));
        
//      上記で作成されたユーザーの情報を元にログイン処理を行う
        $this->guard()->login($user);
        
//        ログインが成功すれば、registerControllerで定義したパスへ遷移、失敗ならloginへリダイレクトする
        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

//      validateメソッド バリデーションルールに成功すると続けて実行されます。
//      バリデーションに失敗すると、例外が投げられ自動的に適切なエラーレスポンスが返されます。
//      伝統的なHTTPリクエストの場合は、リダイレクトレスポンスが生成されリダイレクトされる

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
//      ユーザーの認証状態の確認
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}

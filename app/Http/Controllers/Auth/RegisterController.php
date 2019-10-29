<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
//  ユーザー作成時のリダイレクト先の設定
    protected $redirectTo = '/todo';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//      $thisはregisterController
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
//      $dataにはpostの情報が格納されている
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

//      required - 必須
//      string - 文字列
//      max:255 - 最大文字数255
//      email - メールの形式化どうか
//      unique:users - データベースに重複していないかどうか
//      min:6 - 最低文字数6
//      confirmed - 確認で入力してものと一致しているか
//                  フィールドがそのフィールド名＋_confirmationフィールドと同じ値であることをバリデートします。
//                  例えば、バリデーションするフィールドがpasswordであれば、
//                  同じ値のpassword_confirmationフィールドが入力に存在していなければなりません。



    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
//  クリエイトの裏側でfillみたいなことしてる、複数代入を許可していない
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}

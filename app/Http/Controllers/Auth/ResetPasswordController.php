<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo;

    protected $attrFormNiceNames;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->redirectTo = route('home.index.get');

        $this->attrFormNiceNames = [
			'nome' => trans('custom.name'),
			'email' => trans('custom.email'),
			'senha' => trans('custom.password'),
			'senha_confirmacao' => trans('custom.password_confirmation'),
		];
    }

     /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function reset(Request $request)
    {
        $request->validate($this->rules(), $this->attrFormNiceNames);

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $response == Password::PASSWORD_RESET
                    ? $this->sendResetResponse($request, $response)
                    : $this->sendResetFailedResponse($request, $response);
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword(Authenticatable $user, $password)
    {
        $user->senha = Hash::make($password);
        $user->setRememberToken(Str::random(60));
        $user->save();
        event(new PasswordReset($user));
        $this->guard()->login($user);
    }

    /**
     * Get the password reset validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'senha' => ['required', 'string', 'min:8', 'required_with:senha_confirmacao', 'same:senha_confirmacao'],
			'senha_confirmacao' => ['required', 'string', 'min:8'],	
        ];
    }

    /**
     * Get the password reset validation error messages.
     *
     * @return array
     */
    protected function validationErrorMessages()
    {
        return [];
    }

    /**
     * Get the password reset credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only(
            'email', 'senha', 'senha_confirmacao', 'token'
        );
    }

    /**
     * Determine if the passwords match for the request.
     *
     * @param  array  $credentials
     * @return bool
     */
    public function validateNewPassword(array $credentials)
    {
        if (isset($this->passwordValidator)) {
            [$password, $confirm] = [
                $credentials['senha'],
                $credentials['senha_confirmacao'],
            ];

            return call_user_func(
                $this->passwordValidator, $credentials
            ) && $password === $confirm;
        }

        return $this->validatePasswordWithDefaults($credentials);
    }

    /**
     * Determine if the passwords are valid for the request.
     *
     * @param  array  $credentials
     * @return bool
     */
    protected function validatePasswordWithDefaults(array $credentials)
    {
        [$password, $confirm] = [
            $credentials['senha'],
            $credentials['senha_confirmacao'],
        ];

        return $password === $confirm && mb_strlen($password) >= 8;
    }

    /**
     * Validate a password reset for the given credentials.
     *
     * @param  array  $credentials
     * @return \Illuminate\Contracts\Auth\CanResetPassword|string
     */
    protected function validateReset(array $credentials)
    {
        if (is_null($user = $this->getUser($credentials))) {
            return static::INVALID_USER;
        }

        if (! $this->validateNewPassword($credentials)) {
            return static::INVALID_PASSWORD;
        }

        if (! $this->tokens->exists($user, $credentials['token'])) {
            return static::INVALID_TOKEN;
        }

        return $user;
    }
}

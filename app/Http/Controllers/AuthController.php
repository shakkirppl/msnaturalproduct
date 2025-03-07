<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
class AuthController extends Controller
{
    //
    public function signOut(Request $request)
    {
        try {

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been signed out.');
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function validate_user(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => ['nullable', 'email', Rule::unique('users', 'email')],
        'phone' => [
            'nullable', 
            new PhoneNumber($request->country_code),
            Rule::unique('users', 'phone')
        ],
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    return response()->json(['success' => true]);
}

}

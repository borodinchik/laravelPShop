<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{

    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success], Response::HTTP_OK);
        } else {
            return response()->json(['error'=>'Unauthorised'], Response::HTTP_UNAUTHORIZED);
        }
    }
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'c_password' => 'required|same:password',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], Response::HTTP_UNAUTHORIZED);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;
        return response()->json(['success' => $success], Response::HTTP_OK);
    }
    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], Response::HTTP_OK);
    }

//    public function tests()
//    {
//        $array = [['Same value1'],['same Value 2']];
//        $arrayBody = [['Same value one'],['Same value two']];
//       $result = file_put_contents('./log.log', [json_encode($array). "\n"  . json_encode($arrayBody) . "\n". date('Y-m-d H:i:s') . "\n" . get_class() . "\n" . __FUNCTION__ . "\n\n"],FILE_APPEND);
//       return $result;
//    }
}
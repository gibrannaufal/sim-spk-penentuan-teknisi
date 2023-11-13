<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AuthRequest;
use App\Helpers\AuthHelpers\AuthHelper;

class AuthController extends Controller
{
    /**
     * Method untuk handle proses login & generate token JWT
     *
     * @author Muhammad Naufal Gibran (naufalgibran961@gmail.com)
     *
     * @return void
     */
    public function login(AuthRequest $request)
    {
         /**
         * Menampilkan pesan error ketika validasi gagal
         * pengaturan validasi bisa dilihat pada class app/Http/request/User/UpdateRequest
         */
        // dd($request->all());
        if (isset($request->validator) && $request->validator->fails()) 
        {
            return response()->failed($request->validator->errors(), 422);
        }
        // dd("hello");
        $credentials = $request->only('email', 'password');
        
        $login = AuthHelper::login($credentials['email'], $credentials['password']);
        // dd($login);
        if(!$login['status']) {
            return response()->failed($login['error'], 422);
        }
    
        return response()->success($login['data']);
    }

     /**
     * Method untuk handle proses logout dan menghapus token JWT
     * 
     * @author Muhammad Naufal Gibran (naufalgibran961@gmail.com)
     *
     * @return void
     */
    public function logout()
    {
        auth()->logout();
        return response()->success();
    }

    /**
     * Generate token baru untuk disimpan pada frontend 
     * dan digunakan pada request selanjutnya, karena token JWT memiliki masa aktif
     *
     * @return void
     */
    public function refresh()
    {
        return response()->success(auth()->user());
    }

     /**
     * Mengambil profile user yang sedang login
     *
     * @return void
     */
    public function profile()
    {
        // dd("hello");
        return response()->success(auth()->user());
    }

     /**
     * Generate token 
     *
     * @return void
     */
    public function csrf()
    {
        // dd(csrf_token());
        return response()->success(csrf_token());
    }
}

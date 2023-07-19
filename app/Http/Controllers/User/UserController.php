<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\UserRegisterRequest;
class UserController extends Controller
{    
     use ResponseTrait;     
     /**
      * columns
      *
      * @var array
      */
     protected $columns = ['#','Name','Email','Role','Create_at'];       
     /**
      * data
      *
      * @var array
      */
     protected $data = []; 
    /**
     * index
     *
     * @param  mixed $request
     * @return Response
     */
    function index(Request $request) : Response {
        $this->data['columns'] = $this->columns;
        $this->data['users'] = User::all();
        $this->data['roles'] = Role::all();
        return $this->sendResponse('User',$this->data);
    }    
    /**
     * registerUser
     *
     * @param  mixed $request
     * @return Response
     */
    function registerUser(UserRegisterRequest $request) : Response {
       $data = array(
         'name'=>$request->name,
         'email'=>$request->email,
         'password'=>Hash::make($request->password)
        );
       $user  = User::created($data);
       if($request->role){
        $role = Role::findById($request->role);
        $request->user()->assignRole($role);
       }
       return $this->index($request);
    }
}

<?php
namespace App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
Class UserController extends Controller{
    private $request;
    public function __construct(Request $request){
    $this->request = $request;
    }
    public function getUsers(){
    $users = User::all();
    return response()->json($users, 200);
    }
    /**
    * Return the list of users
    * @return Illuminate\Http\Response
    */
    public function index()
    {
    $users = User::all();
    return response()->json($users, 200);
    }
    public function add(Request $request ){
    $rules = [
    'username' => 'required|max:20',
    'password' => 'required|max:20',
    'gender' => 'required|in:Male,Female',
    ];
    $this->validate($request,$rules);
    $user = User::create($request->all());

    return response()->json($user, Response::HTTP_CREATED);
     }

}
<?php

// <!-- 

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

// class UserController extends Controller
// {
//   public function showUsers(){
//  $users= DB::table('students')->Paginate(2);
// //  ->select('name','email as User_Personal_Email')

// //  return $users;
// // dd($users);

// // foreach($users as $user){
// // echo $user->name . "<br>";
// // }

// return view('allusers',['data'=> $users]);
//   }
//   public function singleUser(string $id){
//     $user= DB::table('students')->where('id',$id)->get();
//    return view("usersdata",['data'=>$user]);
//      }

// public function deletedata(string $id){
//   $user= DB::table('students')->where('id',$id)->delete();
// if ($user ) {
//  return redirect()->route('home');
// }
// }
// public function adduser(Request $req)
//     {
//         $users = DB::table('students')->insert([
//             'name' => $req->username,
//             'email' => $req->useremail,
//             'age' => $req->userage,
//         ]);
//         if ($users) {
//             return redirect()->route('home');
//         }
//     }

//     public function updatepage(string $id){
//       $user= DB::table('students')->find($id);
//      return view("updateuser",['data'=>$user]);
//        }
//        public function  updateData(Request $req, $id)
//     {
//         $user = DB::table('students')
//             ->where('id', $id)
//             ->update([
//               'name' => $req->username,   
//               'email' => $req->useremail,
//               'age' => $req->userage
//             ]);
//         if ($user) {
//             return redirect()->route('home');
//         }
//     }

// } -->

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Ui\ControllersCommand;
use Illuminate\Support\Facades\DB;

class UserController extends Controller 
{
    //
    function login(Request $req)
    {
        $user= User::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password,$user->password))
        {
            return "Username or password is not matched";
        }
        else{
            $req->session()->put('user',$user);
            return redirect('/');
        }
    }
}
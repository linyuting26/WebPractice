<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;//透過依賴注入的方式取得 HTTP 請求(Request $resquest)
use App\Http\Controllers\Controller;

class WebController extends Controller
{
    //
    public function __construct(){
        
    }
    public function register(Request $request){
        $link = mysqli_connect("192.168.10.10", "homestead", "secret", "Test");
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        mysqli_query($link ,"SET NAMES 'utf8'");
        if(isset($request->submit)){          
            if(mysqli_query($link, 'INSERT INTO users VALUES(\''. $request->email . '\', \'' . $request->password . '\', \'' . $request->name . '\', \'' . $request->id . '\', \'' . $request->gender . '\', \'' . $request->birthday . '\', \'' . $request->phone . '\', \'' . $request->address .'\')') === TRUE){
                echo 'registration success';
            }
        }
        mysqli_close($link);
    }

    public function login(Request $request){
        $link = mysqli_connect("192.168.10.10", "homestead", "secret", "Test");
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        mysqli_query($link ,"SET NAMES 'utf8'");
        if(isset($request->submit)){  
            $email=$request->email;
            $password=$request->password;
            $sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
            $result=mysqli_query($link, $sql);
            if(!$result){
                echo "Error: " . mysqli_error($link);
                exit();
            }
            if(mysqli_num_rows($result)==""){
                return redirect()->back()->with('alert', 'login_error!');
            }
            else{
                return redirect()->back()->with('alert', 'login_OK!');
            }
        }
        mysqli_close($link);
    }
}

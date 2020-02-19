<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    //
    public function __construct(){
        
    }
    public function register(){
        $link = mysqli_connect("192.168.10.10", "homestead", "secret", "Test");
        if (!$link) {
            die('Could not connect: ' . mysql_error());
        }
        mysqli_query($link ,"SET NAMES 'utf8'");
        if(isset($_POST["submit"])){          
            if(mysqli_query($link, 'INSERT INTO users VALUES(\''. $_POST["email"] . '\', \'' . $_POST["password"] . '\', \'' . $_POST["name"] . '\', \'' . $_POST["id"] . '\', \'' . $_POST["gender"] . '\', \'' . $_POST["birthday"] . '\', \'' . $_POST["phone"] . '\', \'' . $_POST["address"] .'\')') === TRUE){
                echo 'registration success';
            }
        }
        mysqli_close($link);
    }

    public function login(){
        $link = mysqli_connect("192.168.10.10", "homestead", "secret", "Test");
        if (!$link) {
            die('Could not connect: ' . mysql_error());
        }
        mysqli_query($link ,"SET NAMES 'utf8'");
        if(isset($_POST["submit"])){  
            $seldb=mysql_select_db("Test") or die("DB connection failed!");
            $sql="SELECT * FROM `users` WHERE `email` = '" . $_POST["email"] ."'";
            $result=mysql_query($sql);
            $row_result=mysql_fetch_assoc($result);
            if(isset($_POST["email"])){
                $admin=$row_result["password"];
                if($_POST["password"]==$admin){
                    echo "歡迎" . $_POST["email"] . "登入成功" . "";
                    return view('cover');
                }
                else{
                    echo $_POST["email"] . "登入失敗";
                }
            }
        }
        mysqli_close($link);
    }
}

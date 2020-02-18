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
            if(mysqli_query($link, 'INSERT INTO users VALUES(\''. $_POST["email"] . '\', \'' . $_POST["password"] . '\', \'' . $_POST["name"] . '\', ' . $_POST["id"] . ', ' . $_POST["gender"] . ', ' . $_POST["birthday"] . ', ' . $_POST["phone"] . ', \'' . $_POST["address"] .'\')') === TRUE){
                echo 'registration success';
            }
        }
        mysqli_close($link);
    }
}

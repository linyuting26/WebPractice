<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>會員註冊</title>
        <style>
            .center{
                text-align: center;
            }
        </style>
    </head>
    <body>
        <form method="post" action="register">     
            {{ csrf_field() }}     
            <fieldset>
                <legend>會員註冊</legend>
                姓名:<br>
                <input type="text" name="name"><br>
                身分證字號:<br>
                <input type="text" name="id"><br>
                性別:<br>
                <input type="text" name="gender"><br>
                生日:<br>
                <input type="text" name="birthday"><br>
                手機號碼:<br>
                <input type="text" name="phone"><br>
                居住地址:<br>
                <input type="text" name="address"><br>
                登入帳號(電子信箱):<br>
                <input type="text" name="email"><br>
                登入密碼:<br>
                <input type="text" name="password"><br><br>
                <input type="submit" value="註冊" name="submit">
            </fieldset>
        </form>
        <script>
            var msg = '{{Session::get('alert')}}';
            var exist = '{{Session::has('alert')}}';
            if(exist){
                alert(msg);
            }
        </script>
    </body>
</html>
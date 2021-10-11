<?php
session_start();
$_SESSION['login_times'] = ((isset($_SESSION['login_times'])) ? $_SESSION['login_times'] : 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Ugly Test</title>
</head>
<body>
    <div class="jumbotron">
        <div class="container"><br><br>
        <form action="test.php" method="post">
        <button  class="btn btn-success" type="login" name="login">Login</button>
        &nbsp&nbsp&nbsp
        <button  class="btn btn-danger" type="logout" name="logout">Logout</button>&nbsp&nbsp&nbsp
        <button  class="btn btn-warning" type="restart" name="restart">Restart</button><br><br><br><br>
        </form>
        <table class="table table-bordered" style="background-color:white">
            <thead class="table table-dark">
                <th>Data</th>
                <th>Time</th>
            </thead>
            <tbody>
            <column>
                <tr>
                <td><b> Last Login Time : </b></td>
                <td><b> <?php if(isset($_SESSION['login_time']) && $_SESSION['login_time']!=""){
                    echo $_SESSION['login_time'];}else {echo "";}?> </b></td>
                </tr>
                <tr><td><b> Last Logout Time :  </b></td> 
                <td><b>  <?php if(isset($_SESSION['logout_time'])&& $_SESSION['logout_time']!=""){ echo $_SESSION['logout_time'];
                }else {echo "";}?> </b></td>
                </tr>
                <tr><td><b> Difference Time: </b></td> 
                <td><b>  <?php 
                if(isset($_SESSION['date1'],$_SESSION['date2'])){
                       $date_diff=abs($_SESSION['date1']-$_SESSION['date2']);
                       echo floor($date_diff/(60*60))."H"."&nbsp".floor($date_diff/(60))."m"."&nbsp".floor($date_diff)."s";
                    }
                else echo "";
                ?> </b></td>
                </tr>
                <tr><td><b> Total Login Time: </b></td> 
                <td><b> <?php if(isset($_SESSION['login_times'])){
                    echo $_SESSION['login_times']."times";}else{echo "";}?> </b></td>
                </tr>
        
            </tbody>
        </table>
        </div>
    </div>
</body>
</html>
<?php

if(isset($_POST['login'])){
    $date_login=date("d-m-Y H:m:s");
    $date_login_str=strtotime($date_login);
    $s=date("H:m:s",$date_login_str);
    $_SESSION['login_time']=$s;
    $_SESSION['date1']=$date_login_str;
    $_SESSION['login_times']++;
    header("location:test.php");
}
if(isset($_POST['logout'])){
    $date=date("d-m-Y H:m:s");
    $date_str=strtotime($date);
    $g=date("H:m:s",$date_str);
    $_SESSION['logout_time']=$g;
    $_SESSION['date2']=$date_str;
    header("location:test.php");
}
if(isset($_POST['restart'])){
   unset($_SESSION['logout_time']);
   unset($_SESSION['login_time']);
   unset($_SESSION['login_times']);
   unset($_SESSION['login_gha']);
   unset($_SESSION['date1']);
   unset($_SESSION['date2']);
   header("location:test.php");
}
?>
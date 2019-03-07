<?php
/**
 * Created by PhpStorm.
 * User: james
 * Date: 3/7/19
 * Time: 9:24 AM
 */
function unicodeDecode($unicode_str){
    $json = '{"str":"'.$unicode_str.'"}';
    $arr = json_decode($json,true);
    if(empty($arr)) return '';
    return $arr['str'];
}
if(isset($_POST['storeid']) && !empty($_POST['storeid'])){
   $storeid = $_POST['storeid'];
}else{
    echo 'no storeid exit;';die();
}
$db_host = "127.0.0.1";
$db_user = "root";
$db_pwd  = "P@ssw0rd";
$db_name  = "test";
$mysqli = mysqli_connect($db_host, $db_user, $db_pwd, $db_name);
if(!$mysqli ){
    echo mysqli_connect_error();
}

if(isset($_POST['data'])){
    $datas = explode(",",$_POST['data']);
    foreach ($datas as $data){
        $time =time();
        $a = explode("_____",$data);
        $orderNum = $a[0];
        $orderPrice = $a[1];

        $username = unicodeDecode($a[2]);
       if('undefined'!==$orderNum &&!empty($orderNum)){
            if(!check_exsit($orderNum,$mysqli)){
                $sql = "insert into test (`orderNum`,`username`,`orderPrice`,`addTime`,`storeid`) values ('$orderNum','$username','$orderPrice','$time','$storeid')";
                $result = $mysqli->query($sql);
            }
        }


    }
}

mysqli_close($mysqli);
echo $_POST['data'];
function check_exsit($data,$mysqli){
    $sql = "SELECT * FROM test.test where orderNum='".$data."'";
    $result = $mysqli->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        return true;
    }
    return false;
}
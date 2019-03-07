<script type="text/javascript">
    var id=window.setTimeout(reload,1000);
    function reload(){
        //window.location.reload();
    }
    </script>

<?php
/**
 * Created by PhpStorm.
 * User: james
 * Date: 3/7/19
 * Time: 10:37 AM
 */
ini_set("display_errors","On");
error_reporting(E_ALL);
$db_host = "127.0.0.1";
$db_user = "root";
$db_pwd  = "P@ssw0rd";
$db_name  = "bjl";

$mysqli = mysqli_connect($db_host, $db_user, $db_pwd, $db_name);
if(!$mysqli ){
    echo mysqli_connect_error();
}
$sql = "SELECT * FROM test.test order by addTime desc";
$result = $mysqli->query($sql);
mysqli_close($mysqli);
?>
<table style="width:100%">
    <tr>
        <th>ordernum</th>
        <th>username</th>
        <th>price</th>
        <th>addtime</th>
        <th>status</th>
    </tr>
<?php
while ($row = mysqli_fetch_assoc($result)) {
    $time = $row["addTime"];
    echo " <tr>";
    echo "<td>".$row["orderNum"]."</td>";
    echo "<td>".$row["username"]."</td>";
    echo "<td>".$row["orderPrice"]."</td>";
    echo "<td>".date("Y-m-d H:i:s",$time)."</td>";
    echo "<td>"."NO PAY"."</td>";
    echo " </tr>";
}
?>


</table>
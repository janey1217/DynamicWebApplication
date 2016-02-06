<?php
/**
 * Created by PhpStorm.
 * User: jym
 * Date: 2016/2/5
 * Time: 15:41
 */
require_once ("head.php");
$vsp = $_GET['vsp'];
$vrpm = $_GET['vrpm'];
$tmp = $_GET['tmp'];
$longi = $_GET['longi'];
$lati = $_GET['lati'];
$insert_date = $_GET['insert_date'];
$flag = $_GET['flag'];
if($flag ==1){
    $insert_sql = "insert into car_info (vsp,vrpm,tmp,longi,lati) VALUE ($vsp,$vrpm,$tmp,$longi,$lati)";
  //  echo $insert_sql;
    $insert_result =mysql_query($insert_sql);
    if($insert_result) {
    //    echo "插入数据成功";
    } else echo "failed";
}
?>
<div  class="container" style="font-size: 14px">
    <div class="">
        <table class="table-bordered" style="width: 100%">
            <th>编号</th>
            <th>VSP</th>
            <th>VRPM</th>
            <th>Tmp</th>
            <th>经度</th>
            <th>维度</th>
            <th>时间</th>
            <?php
            $sql = "select * from car_info where 1=1 order by insert_date desc";
            $result = mysql_query($sql);
            while($row=mysql_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo $row["Id"] ?></td>
                <td><?php echo $row["vsp"] ?></td>
                <td><?php echo $row["vrpm"] ?></td>
                <td><?php echo $row["tmp"] ?></td>
                <td><?php echo $row["longi"] ?></td>
                <td><?php echo $row["lati"] ?></td>
                <td><?php echo $row["insert_date"] ?></td>
            </tr>
            <?php }?>
        </table>
    </div>
</div>
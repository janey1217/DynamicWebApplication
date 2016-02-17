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
<script src="lib/js/jqPaginator.min.js" type="text/javascript"></script>
<link href="lib/css/myPage.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
    function loadData(num) {
        console.log(num);
        $pageCount = $('#visiblePages').val();
        $.ajax({
            type:'POST',
            url:'mypage.php',
            data:{'num':num,'pageCount':$pageCount},
            success:function(data){
                if(data!=null){
                    var strs ="";
                    var json = $.parseJSON(data);
                    $(json).each(function(i,val){
                        var tr='<tr>';
                        $.each(val,function(k,v){
                            tr+='<td>'+v+'</td>';
                        });
                        tr +='</tr>';
                        strs +=tr;
                    });
                    $('#carinfo tbody').html(strs);
                    //console.log(data);
                    //for (var i=0; i<data.length; i++)
                    //{
                    //        var tr='<tr>';
                    //        tr+='<td>'+data[i]['Id']+'</td>';
                    //        tr+='<td>'+data[i]['vsp']+'</td>';
                    //        tr+='<td>'+data[i]['vrpm']+'</td>';
                    //        tr+='<td>'+data[i]['tmp']+'</td>';
                    //        tr+='<td>'+data[i]['longi']+'</td>';
                    //        tr+='<td>'+data[i]['lati']+'</td>';
                    //        tr+='<td>'+data[i]['insert_date']+'</td>';
                    //        tr += '</tr>';
                    //        strs += tr;
                    //   // console.log(data[i]);
                    //
                    //}
                    //$('#carinfo tbody').html(strs);
                }
            },
        })
    }
</script>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">WebSiteName</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Page 1-1</a></li>
                        <li><a href="#">Page 1-2</a></li>
                        <li><a href="#">Page 1-3</a></li>
                    </ul>
                </li>
                <li><a href="#">Page 2</a></li>
                <li><a href="#">Page 3</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </div>
</nav>
<div  class="container" style="font-size: 14px">
    <div class="">
        <table class="table-bordered" id="carinfo" style="width: 100%">
            <thead>
            <th>编号</th>
            <th>VSP</th>
            <th>VRPM</th>
            <th>Tmp</th>
            <th>经度</th>
            <th>维度</th>
            <th>时间</th>
            </thead>
            <tbody></tbody>
<?php
//            $sql = "select * from car_info where 1=1 order by insert_date desc";
//            $result = mysql_query($sql);
//            while($row=mysql_fetch_array($result)) {
//                echo json_encode($row);
//            ?>
<!--            <tr>-->
<!--                <td>--><?php //echo $row["Id"] ?><!--</td>-->
<!--                <td>--><?php //echo $row["vsp"] ?><!--</td>-->
<!--                <td>--><?php //echo $row["vrpm"] ?><!--</td>-->
<!--                <td>--><?php //echo $row["tmp"] ?><!--</td>-->
<!--                <td>--><?php //echo $row["longi"] ?><!--</td>-->
<!--                <td>--><?php //echo $row["lati"] ?><!--</td>-->
<!--                <td>--><?php //echo $row["insert_date"] ?><!--</td>-->
<!--            </tr>-->
<!--            --><?php //}?>
        </table>
    </div>
    <div class="pagination">
        <?php
        $sql ='select count(*) from car_info';
        $result =mysql_query($sql);
        $count = mysql_fetch_array($result);
        //echo $count[0];
        ?>
        <form id="form1" runat="server">
            <div>
            </div>
            <div>
                <ul class="pagination" id="pagination">
                </ul>
                <input type="hidden" id="PageCount" runat="server"  value="<?php echo $count[0] ?>"/>
                <input type="hidden" id="PageSize" runat="server" value="20" />
                <input type="hidden" id="countindex" runat="server" value="20"/>
                <!--设置最多显示的页码数 可以手动设置 默认为7-->
                <input type="hidden" id="visiblePages" runat="server" value="20" />
            </div>
            <script src="lib/js/myPage.js" type="text/javascript"></script>
        </form>
    </div>
</div>
<?php

include '../conn.php';
include 'function.php';
header("Content-type: text/html; charset=utf-8");
$uid=$_REQUEST['uid'];

$sql = "SELECT * FROM user where id = '".$uid."'";
$result = $conn->query($sql);
$arr=[];
if ($result->num_rows <= 0) {

echo 'Please Login';
exit;
  }

?>
<!DOCTYPE>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Fun</title>
  <link rel="stylesheet" href="../admin/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/general.css">
  <link rel="stylesheet" type="text/css" href="../css/index.css">
    <link rel="stylesheet" type="text/css" href="../css/list.css">
  <script type="text/javascript" src="../js/jquery.js"></script>
  <script type="text/javascript" src="../js/general.js"></script>
  <script type="text/javascript" src="../js/carousel.js"></script>
</head>
<body>
<style type="text/css">
	* {
                margin: 0;
                padding: 0;
                border: 0;
                outline: 0
            }
            
            ul,
            li {
                list-style: none;
            }
            
            a {
                text-decoration: none;
            }
            
            a:hover {
                cursor: pointer;
                text-decoration: none;
            }
            
            a:link {
                text-decoration: none;
            }
            
            img {
                vertical-align: middle;
            }
            
            .btn-numbox {
                overflow: hidden;
                margin-top: 20px;
            }
            
            .btn-numbox li {
                float: left;
            }
            
            .btn-numbox li .number,
            .kucun {
                display: inline-block;
                font-size: 12px;
                color: #808080;
                vertical-align: sub;
            }
            
            .btn-numbox .count {
                overflow: hidden;
                margin: 0 16px 0 -20px;
            }
            
            .btn-numbox .count .num-jian,
            .input-num,
            .num-jia {
                display: inline-block;
                width: 28px;
                height: 28px;
                line-height: 28px;
                text-align: center;
                font-size: 18px;
                color: #999;
                cursor: pointer;
                border: 1px solid #e6e6e6;
            }
            .btn-numbox .count .input-num {
                width: 58px;
                height: 26px;
                color: #333;
                border-left: 0;
                border-right: 0;
            }

</style>
<!-- 头部开始 -->
<?php include 'top.php'; ?>
<!-- 头部结束 -->
<!-- 主体开始 -->
<form action="payall.php" method="post">
	<div class="w1100">
		<div class="col-md-15 col-lg-15">
			        <?php
			$sql = "SELECT * FROM cart where user_id = ".$uid;
			$result = $conn->query($sql);
			       
			if ($result->num_rows > 0) {
                 echo"<table class='table table-bordered'>";
                    echo"<tr>";
                    echo"<td colspan='7' style='text-align:center;' >Shop Car</td>";
                    echo"<tr>";
                    echo"<tr>";
                    echo"<th >Img</th><th >Username</th><th >Goods</th><th >Num</th><th >Price</th><th ></th><th >";
                    echo"<tr>";
			while($row = $result->fetch_assoc()) {
			    $name=getUserNameById($conn,$row['user_id']);
			    $goods_name=getGoodsNameById($conn,$row['goods_id']);
			    $img=getGoodsImgById($conn,$row['goods_id']);
			    $pc=getGoodspcById($conn,$row['goods_id']);
				$zongjia = $row['price']*$row['count'];
				$heji = $zongjia;
			        echo"<tr>";
			        echo "<td style='width:10%'> <img src='../{$img}' style='width:50%'></td>";
			        echo "<td>{$name}</td>";
			        
			        echo "<td>{$goods_name}</td>";
			       ?>
			       <td style="width:15%">　<ul class="btn-numbox" style="margin-left: 20px;width: 80%;padding:2px">
            <li></li>
            <li>
                <ul class="count" style="margin-left:1px">

                    <li ><span id="num-jian" class="num-jian" gid="<?php echo $row['id']?>" style="line-height:25px">-</span></li>
                    <li><input type="text" class="input-num" style="height: 28px" id="input-num" value="<?php echo $row['count']?>" gid="<?php echo $row['id']?>" ></li>
                    <li><span id="num-jia"  class="num-jia" gid="<?php echo $row['id']?>">+</span></li>
                </ul>
            </li>
            <input type="hidden" name="arr[<?php echo $row['id']?>][count]" value="<?php echo $row['count']?>"  gid="<?php echo $row['id']?>" class="ic">
            <input type="hidden" name="arr[<?php echo $row['id']?>][price]" value="<?php echo $zongjia?>"   gid="<?php echo $row['id']?>" class="ip">
            <li><span class="kucun"></span></li>
　　　  </ul></td>
			       <?php
			        echo "<td class='pce' gid={$row['id']}>{$zongjia}</td>";
			       
			        echo "<td><a href='deletecart.php?uid={$row['user_id']}&gid={$row['goods_id']}'>删除</a></td>";
			        echo "<td><a sid='pay.php?uid={$row['user_id']}&gid={$row['goods_id']}' class='onlypay' gid={$row['id']}>付款</a></td>";
			        echo"</tr>";
			
			
			 ?>
			<hr>
			<input type="hidden" id="pcc" value="<?php echo $pc?>">
			 <?php
			}
			 echo"</table>";
			
            ?>
            <input type="hidden" name="uid" value="<?php echo $uid?>">
            <br>  <br>
             <button  type="submit" class="btn btn-success" style="margin-left: 91%">Pay</button>
             <button type="button" class="btn btn-danger"><a style="color: #fff;" href="cleancart.php?uid=<?php echo $uid?>">Clear</a></button><br>
            <?php
        }else{


			 ?> <br><br><br><br><br><br>
             <h1 style="margin-left: 40%">EMPTY</h1>
             <br><br><br><br>

 <?php
        }


             ?> 
            </p>
			 
            
		</div>
	</div>
	</form>
<script type="text/javascript">
	　 var num_jia = $('.num-jia');
        var num_jian = $(".num-jian");
        var   input_num= $(".input-num");

        num_jia.click(function(){
        	 var gid=$(this).attr('gid');
        	 var  c=parseInt($('.input-num[gid='+gid+']').val()) + 1;
            $('.input-num[gid='+gid+']').attr('value',c) ;
            $('.ic[gid='+gid+']').attr('value',c) ;
            var pc=c*parseInt($('#pcc').val());
            $('.pce[gid='+gid+']').html(pc) ;
            $('.ip[gid='+gid+']').attr('value',pc) ;
            
        }) 

        num_jian.click(function(){
 var gid=$(this).attr('gid');
            if($('.input-num[gid='+gid+']').val() <= 0) {
               $('.input-num[gid='+gid+']').attr('value',0);
            } else {

                var  d=parseInt($('.input-num[gid='+gid+']').val()) - 1;
                $('.input-num[gid='+gid+']').attr('value',d) ;
                 $('.ic[gid='+gid+']').attr('value',d) ;
                var pc=d*parseInt($('#pcc').val());
	            $('.pce[gid='+gid+']').html(pc) ;
	            $('.ip[gid='+gid+']').attr('value',pc) ;
            }

        })

       
        $('.onlypay').click(function(){
        	 var url=$(this).attr('sid');
        	 var gid=$(this).attr('gid');
        	 var  co=$('.input-num[gid='+gid+']').val();
        	var u =url+'&count='+co
        	window.location.href=u;
        })
       
</script>

</body>
</html>

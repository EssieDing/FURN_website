<!DOCTYPE html>
<html>
<head>
  <style type="text/css">.h{color:black;}</style>
  <meta charset="utf-8">
<?php

include '../conn.php';
session_status();
$uid=$_REQUEST['uid'];
$goods_id = $_REQUEST['gid'];
$count = $_REQUEST['count'];



$sql = "SELECT * FROM user where id = '".$uid."'";
$result = $conn->query($sql);

if ($result->num_rows <= 0) {

echo 'Please LOGIN';
exit;
  }

?>

<?php include('./top.php');  ?>
<meta name="verydows-baseurl" content="">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Fun+</title>
<link rel="stylesheet" href="../admin/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/general.css">
<link rel="stylesheet" type="text/css" href="../css/index.css">
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/general.js"></script>
<script type="text/javascript" src="../js/carousel.js"></script>
<link href="../static/css/cartstyle.css" rel="stylesheet" type="text/css" />
    <link href="../static/css/optstyle.css" rel="stylesheet" type="text/css" />

</head>
<body>
  <div class="concent">
        <div id="cartTable">
          <div class="cart-table-th">
            <div class="wp">
              <div class="th th-chk">
                <div id="J_SelectAll1" class="select-all J_SelectAll">

                </div>
              </div>
              <div class="th th-item">
                <div class="td-inner">Goods</div>
              </div>
              <div class="th th-price">
                <div class="td-inner">Price</div>
              </div>
              <div class="th th-amount">
                <div class="td-inner">Num</div>
              </div>
              <div class="th th-sum">
                <div class="td-inner">Total</div>
              </div>
              
            </div>
          </div>
          <div class="clear"></div>
   <?php
              $a=0;
      $sql = "SELECT * FROM goods where id = '".$goods_id."'";

            $result = $conn->query($sql);
            
      if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {   
             ?>
          <tr class="item-list">
            <div class="bundle  bundle-last ">
              <div class="bundle-hd">
               
              </div>
              <div class="clear"></div>
              <div class="bundle-main">
                <ul class="item-content clearfix">
                  <li class="td td-chk">
                    <div class="cart-checkbox ">
                      
                      <label for="J_CheckBox_170037950254"></label>
                    </div>
                  </li>
                  <li class="td td-item">
                    <div class="item-pic">
                      <a href="#" target="_blank" data-title="" class="J_MakePoint" data-point="tbcart.8.12">
                        <img src="../<?php echo $row['picture']; ?>" class="itempic J_ItemImg"></a>
                    </div>
                    <div class="item-info" >
                      <div class="item-basic-info">
                        <a href="#" target="_blank" title="" class="item-title J_MakePoint" data-point="tbcart.8.11" ><?php echo $row['goods_name']; ?></a>
                      </div>
                    </div>
                  </li>
                  <li class="td td-info" style="margin-top:20px">
                   
                     
                      
                     
                  
                  </li>
                  <li class="td td-price">
                    <div class="item-price price-promo-promo">
                      <div class="price-content">
                        <div class="price-line">
                          <em class="price-original"><?php echo ($row['price']*1.2); ?>元</em>
                        </div>
                        <br>
                        <div class="price-line">
                          <em class="J_Price price-now" tabindex="0">
                              <?php if ($_SESSION['type'] != 10){?>
                              <?php echo $row['price'];}else{ ?>
                              <?php echo $row['stuprice'];}?>元
                          </em>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="td td-amount">
                    <div class="amount-wrapper ">
                      <div class="item-amount ">
                        <div class="sl">
                         
                         <?php echo $count;  ?>
                          
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="td td-sum">
                    <div class="td-inner">
                      <em tabindex="0" class="J_ItemSum number">
                          <?php if ($_SESSION['type'] != 10){?>
                          <?php echo $row['price']*$count;}else{ ?>
                          <?php echo $row['stuprice']*$count;}?>元
                      </em>
                    </div>
                  </li>
                  <li class="td td-op">
                    <div class="td-inner">
                    
                    </div>
                  </li>
                </ul>
                
                
                
                
                
                          
                
                
                
              </div>
            </div>
          </tr>
          <div class="clear"></div>

         
        </div>
        <div class="clear"></div>

        <div class="float-bar-wrapper">
          <div id="J_SelectAll2" class="select-all J_SelectAll">
            <div class="cart-checkbox">
                <form method="get" action="pay.php" style="margin-left: 80%">
             <span></span> 
              <label for="J_SelectAllCbx2"></label>
            </div>
           
          </div>
         
          <div class="float-bar-right">
            
            <div class="price-sum">
              <span class="txt">Total:</span>
              <strong class="price">¥<em id="J_Total">
                      <?php if ($_SESSION['type'] != 10){?>
                          <?php echo $row['price']*$count;}else{ ?>
                          <?php echo $row['stuprice']*$count;}?>
                  </em></strong>
            </div>
            <div class="btn-area">
        
      
       <input type="hidden" name="uid" value="<?php echo $uid?>">
      
       <input type="hidden" name="gid" value="<?php echo $goods_id?>">
       <input type="hidden" name="count" value="<?php echo $count?>">
       <input type="hidden" name="types" value="<?php echo $_SESSION['type']?>">
        <br><br>
        <button type="submit" style="background:rgb(255,42,0);width:60px;margin-left:0px;margin-top:-190px;color: white;border:1px solid rgb(255,42,0)">
          Pay</button>
      </form>
             
              
            </div>
          </div>
 <?php
             }}
      
      
       ?>
        </div>

        <div class="footer">
          <div class="footer-hd">
            
          </div>
          <div class="footer-bd">
            <p>
             
              <em>© 2020-2022  Fun</em>
            </p>
          </div>
        </div>

      </div>

      <!--操作页面-->


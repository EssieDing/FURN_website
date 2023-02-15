<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Admin</title>
<link rel="stylesheet" type="text/css" href="../css/general.css">
<link rel="stylesheet" type="text/css" href="../css/login.css">
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/general.js"></script>
</head>
<body>

<div class="header">
  <div class="w900 mt30 cut">
    <div class="logo" style="margin-left: 23%"><a href="/"></a></div>
  </div>
</div>

<div class="container w900 mt20">
  <div class="wbox cut">
    <div class="login-banner fl cut"></div>
    <form method="post" action="dologin.php" id="login-form">
      <input type="password" value="" class="hide">
      <div class="login ml530">
        <h2 class="c666">Admin</h2>
        <dl class="username mt20">
          <dt><span style="font-size:5px"></span><i class="icon"></i></dt>
          <dd><input name="username" id="username" type="text" placeholder="username"></dd>
        </dl>
        <dl class="pwd mt20">
          <dt><span style="font-size:5px"></span><i class="icon"></i></dt>
          <dd><input name="password" id="password" type="password" placeholder="password"></dd>
        </dl>
        <div class="ck module mt20 cut">
          <div class="fl"></div>
          <div class="fr"></div>
        </div>
        <input class="form-submit aln-c radius4 mt20" type="submit" style="margin-left:35%" value="Submit">

      </div>
    </form>
  </div>
</div>
<div class="cl"></div>
<script type="text/javascript" src="../images/md5.js"></script>
</body>
</html>

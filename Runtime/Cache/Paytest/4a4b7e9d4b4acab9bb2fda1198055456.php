<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script type="text/javascript" src="/moguplay/Public/Api/js/jquery.js"></script>
</head>
<body>
    <!--<form action="/moguplay/index.php?s=/Paytest/Ips/index" method="post" enctype="multipart/form-data">-->
        <img src="/moguplay/Public/Home/images/banner2-am.png" />
        <p>商品名称：<span>1元硬币</span></p>
        <!--<input type="hidden" id="ShopName" name="ShopName" value="1元硬币" />-->
        <p>商品数量：<span>1</span></p>
        <!--<input type="hidden" id="ShopNum" name="ShopNum" value="1" />-->
        <p>商品价格：<span>0.01</span>元</p>
        <!--<input type="hidden" id="ShopPrice" name="ShopPrice" value="0.01" />-->
        <input type="button" id="btn" name="btn" value="购买" />
    <!--</form>-->

   <script>
   $(function () {
       $("#btn").click(function () {
           var ShopName = $("span:eq(0)").html();
           var ShopNum = $("span:eq(1)").html();
           var ShopPrice = $("span:eq(2)").html();
           $.post("/moguplay/index.php?s=/Paytest/Ips/Ajaxindex",{ShopName:ShopName,ShopNum:ShopNum,ShopPrice:ShopPrice},function (msg) {
               alert(1)
               //window.location.href="http://localhost/moguplay/index.php?s=/Paytest/Ips/validCode?code="+msg.code+"&msg="+msg.msg;
           },"json");
           //window.location.href="http://localhost/moguplay/index.php?s=/Paytest/Ips/validCode";
       });
   });
   </script>

</body>
</html>
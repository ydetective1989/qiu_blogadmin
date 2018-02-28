<?php include("config.php"); ?>
<?php include("head.php"); ?>

<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo">layui 后台布局</div>
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <ul class="layui-nav layui-layout-left">
      <li class="layui-nav-item"><a href="">控制台</a></li>
      <li class="layui-nav-item"><a target="main" href="userlist.php">用户资料</a></li>
          <li class="layui-nav-item"><a target="main" href="useradmin.php">用户管理</a></li>
      <li class="layui-nav-item"><a target="main" href="namelist.php">文章管理</a></li>

      <li class="layui-nav-item">
        <a href="javascript:;">其它系统</a>
        <dl class="layui-nav-child">
          <dd><a href="">邮件管理</a></dd>
          <dd><a href="">消息管理</a></dd>
          <dd><a href="">授权管理</a></dd>
        </dl>
      </li>
    </ul>
    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item">
        <a href="javascript:;">
          <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
          <?php
          if(isset($_COOKIE['admin'])){
            echo $_COOKIE['admin'];
          }else{
            echo "游客";
          }
          ?>
        </a>
        <dl class="layui-nav-child">
          <dd><a href="">基本资料</a></dd>
          <dd><a href="">安全设置</a></dd>
        </dl>
      </li>
      <?php
      if(isset($_COOKIE['admin'])){ ?>
      <li class="layui-nav-item"><a href="loginout.php">退了</a></li>
    <?php }else{ ?>
      <li class="layui-nav-item"><a href="login.php">登录</a></li>
    <?php }?>
    </ul>
  </div>

  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
      <ul class="layui-nav layui-nav-tree"  lay-filter="test">
        <li class="layui-nav-item layui-nav-itemed">
          <a class="" href="javascript:;">功能开发中</a>
          <dl class="layui-nav-child">
            <dd><a href="javascript:;">功能开发中</a></dd>
            <dd><a href="javascript:;">功能开发中</a></dd>
            <dd><a href="javascript:;">功能开发中</a></dd>
            <dd><a href="">功能开发中</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">功能开发中</a>
          <dl class="layui-nav-child">
            <dd><a href="javascript:;">功能开发中</a></dd>
            <dd><a href="javascript:;">功能开发中</a></dd>
            <dd><a href="">功能开发中</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item"><a href="">功能开发中</a></li>
        <li class="layui-nav-item"><a href="">功能开发中</a></li>
      </ul>
    </div>
  </div>

  <div class="layui-body">
    <!-- 内容主体区域 -->
    <div style="padding: 15px;">
        <iframe class="layui-col-md12" src="" name="main" height="1500"   scrolling= "no" frameborder="0"></iframe>
    </div>
  </div>

  <div class="layui-footer">
    <!-- 底部固定区域 -->
    © layui.com - 底部固定区域
  </div>
</div>
<script src="../src/layui.js"></script>
<script>
//JavaScript代码区域
layui.use('element', function(){
  var element = layui.element;

});
</script>

</body>
</html>

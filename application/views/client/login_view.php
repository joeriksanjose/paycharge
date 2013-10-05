<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
    <link href="<?php echo base_url("public/bootstrap/css/bootstrap.min.css") ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url("public/css/global.css") ?>" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?php echo base_url("public/js/jquery1_9.min.js") ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("public/bootstrap/js/bootstrap.min.js") ?>"></script>
</head>
<body onload="document.getElementById('name').focus()">
<div class="topmargin"></div>
<div class="container">
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">

        </div>
    </div>
    <div class="row">
        <div class="span12">
            <div class="loginBox centerDiv">
                <div class="topmargin"></div>
                <?php if ($login_error) : ?>
                <div class="alert alert-error">
                    <?php echo $error_message ?>
                </div>
                <?php endif; ?>
                <form class="form-horizontal" action="<?php echo base_url("client/home/login"); ?>" method="post">
                  <h4 style="margin-left: 170px;"><i class="icon-lock"></i>  Client Login</h4>
                  <div class="control-group">
                    <label class="control-label" for="username">User ID</label>
                    <div class="controls">
                      <input type="text" id="name" name="name">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="username">User Name</label>
                    <div class="controls">
                      <input type="text" id="username" name="username">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="password">Password</label>
                    <div class="controls">
                      <input type="password" id="password" name="password">
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                      <button type="submit" class="btn">Log in</button>
                    </div>
                  </div>
                </form>
                <div class="topmargin"></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
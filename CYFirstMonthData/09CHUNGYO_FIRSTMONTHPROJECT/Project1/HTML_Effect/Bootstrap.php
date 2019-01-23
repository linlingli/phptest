<nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">首頁</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">音樂討論版<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="Board.php?Type=<?php echo urlencode(base64_encode("華語流行音樂")); ?>">華語流行音樂</a></li>
                            <li><a href="Board.php?Type=<?php echo urlencode(base64_encode("西洋流行音樂")); ?>">西洋流行音樂</a></li>
                            <li><a href="Board.php?Type=<?php echo urlencode(base64_encode("日韓流行音樂")); ?>">日韓流行音樂</a></li>
                            <li><a href="Board.php?Type=<?php echo urlencode(base64_encode("古典類型音樂")); ?>">古典類型音樂</a></li>
                            <li><a href="Board.php?Type=<?php echo urlencode(base64_encode("其他類型音樂")); ?>">其他類型音樂</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">電影討論版<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="Board.php?Type=<?php echo urlencode(base64_encode("國內電影")); ?>">國內電影</a></li>
                            <li><a href="Board.php?Type=<?php echo urlencode(base64_encode("香港電影")); ?>">香港電影</a></li>
                            <li><a href="Board.php?Type=<?php echo urlencode(base64_encode("大陸電影")); ?>">大陸電影</a></li>
                            <li><a href="Board.php?Type=<?php echo urlencode(base64_encode("西洋電影")); ?>">西洋電影</a></li>
                            <li><a href="Board.php?Type=<?php echo urlencode(base64_encode("日韓電影")); ?>">日韓電影</a></li>
                            <li><a href="Board.php?Type=<?php echo urlencode(base64_encode("其他電影")); ?>">其他電影</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">電玩討論版<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="Board.php?Type=<?php echo urlencode(base64_encode("單機PC遊戲")); ?>">單機PC遊戲</a></li>
                            <li><a href="Board.php?Type=<?php echo urlencode(base64_encode("多人PC遊戲")); ?>">多人PC遊戲</a></li>
                            <li><a href="Board.php?Type=<?php echo urlencode(base64_encode("線上PC遊戲")); ?>">線上PC遊戲</a></li>
                            <li><a href="Board.php?Type=<?php echo urlencode(base64_encode("掌上機遊戲")); ?>">掌上機遊戲</a></li>
                            <li><a href="Board.php?Type=<?php echo urlencode(base64_encode("電視遊樂器")); ?>">電視遊樂器</a></li>
                            <li><a href="Board.php?Type=<?php echo urlencode(base64_encode("手機的遊戲")); ?>">手機的遊戲</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">出遊討論版<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="Board.php?Type=<?php echo urlencode(base64_encode("北部旅遊景點")); ?>">北部旅遊景點</a></li>
                            <li><a href="Board.php?Type=<?php echo urlencode(base64_encode("中部旅遊景點")); ?>">中部旅遊景點</a></li>
                            <li><a href="Board.php?Type=<?php echo urlencode(base64_encode("南部旅遊景點")); ?>">南部旅遊景點</a></li>
                            <li><a href="Board.php?Type=<?php echo urlencode(base64_encode("東部旅遊景點")); ?>">東部旅遊景點</a></li>
                            <li><a href="Board.php?Type=<?php echo urlencode(base64_encode("離島旅遊景點")); ?>">離島旅遊景點</a></li>
                            <li><a href="Board.php?Type=<?php echo urlencode(base64_encode("國外旅遊景點")); ?>">國外旅遊景點</a></li>
                        </ul>
                    </li>
                </ul>
                <!--<form class="navbar-form navbar-left">-->
                <!--    <div class="form-group">-->
                <!--        <input type="text" class="form-control" placeholder="Search" >-->
                <!--    </div>-->
                <!--    <button type="submit" class="btn btn-default">收尋</button>-->
                <!--</form>-->
                <?php if(!isset($_SESSION["MemberNickName"])): ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="Login.php"   >會員登入</a></li>
                        <li><a href="Register.php">會員註冊</a></li>
                    </ul>
                <?php else: ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="Login.php?Logout=1">會員登出</a></li>
                        <li><a href="ViewMember.php"      ><?php echo $_SESSION["MemberNickName"]; ?></a></li>
                    </ul>
                <?php endif; ?>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
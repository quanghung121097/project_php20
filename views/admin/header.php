<!-- light-blue - v3.1.0 - 2014-12-06 -->

<!DOCTYPE html>
<html>

<!-- Tieu Long Lanh Kute -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <title>Light Blue - Responsive Admin Dashboard Template</title>

    <link href="public/admin/css/application.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="public/admin/img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">
    <script>
        /* yeah we need this empty stylesheet here. It's cool chrome & chromium fix
           chrome fix https://code.google.com/p/chromium/issues/detail?id=167083
                      https://code.google.com/p/chromium/issues/detail?id=332189
                      */
                  </script>


            </head>
            <body class="background-dark">
                <div class="logo">
                    <h4><a href="index.php?mod=blogger&act=home_admin ">Light <strong>Blue</strong></a></h4>
                </div>
                <nav id="sidebar" class="sidebar nav-collapse collapse">
                    <ul id="side-nav" class="side-nav">
                        <li class="active">
                            <a href="index.php?mod=user&act=home"><i class="fa fa-home"></i> <span class="name">Trang chủ</span></a>
                        </li>
                        <li class="panel ">
                            <a class="accordion-toggle collapsed" data-toggle="collapse"
                            data-parent="#side-nav" href="#ui-collapse"><i class="fa fa-magic"></i> <span class="name">bài viết của bạn</span></a>
                            <ul id="ui-collapse" class="panel-collapse collapse ">
                                <li class=""><a href="index.php?mod=blogger&act=add_post">Thêm</a></li>
                                <li class=""><a href="index.php?mod=blogger&act=list_post">Danh sách</a></li>

                            </ul>
                        </li>
                        <li class="panel ">
                            <a class="accordion-toggle collapsed" data-toggle="collapse"
                            data-parent="#side-nav" href="#grid-collapse"><i class="fa fa-th"></i> <span class="name">Quản lý danh mục</span></a>
                            <ul id="grid-collapse" class="panel-collapse collapse ">
                                <li class=""><a href="index.php?mod=blogger&act=addcategory">Thêm</a></li>
                                <li class=""><a href="index.php?mod=blogger&act=list_categories">Danh sách</a></li>
                            </ul>
                        </li>
                        <?php if ($_SESSION['user']['role']==1) {?>
                            <li class="panel ">
                                <a class="accordion-toggle collapsed" data-toggle="collapse"
                                data-parent="#side-nav" href="#components-collapse"><i class="fa fa-tree"></i> <span class="name">Quản lý trang Blog</span></a>
                                <ul id="components-collapse" class="panel-collapse collapse ">
                                    <li class=""><a href="index.php?mod=blogger&act=getlistall">Danh sách bài đăng</a></li>
                                    <li class=""><a href="index.php?mod=blogger&act=list_approved_post" data-no-pjax>Duyệt bài đăng mới</a></li>
                                    <li class=""><a href="index.php?mod=blogger&act=list_status_post">Các bài đăng bị ẩn</a></li>
                                    
                                </ul>
                            </li>
                            <li>
                                <a href="index.php?mod=blogger&act=list_user"><i class="fa fa-user"></i> <span class="name">Quản lý tài khoản</span></a>
                            </li>
                            
                        <?php } else {

                        } ?>
                        <!-- <li class="panel ">
                            <a class="accordion-toggle collapsed" data-toggle="collapse"
                            data-parent="#side-nav" href="#forms-collapse"><i class="fa fa-pencil"></i> <span class="name">Forms</span></a>
                            <ul id="forms-collapse" class="panel-collapse collapse ">
                                <li class=""><a href="form_account.html">Account</a></li>
                                <li class=""><a href="form_article.html">Article</a></li>
                                <li class=""><a href="form_elements.html">Elements</a></li>
                                <li class=""><a href="form_validation.html">Validation</a></li>
                                <li class=""><a href="form_wizard.html">Wizard</a></li>
                            </ul>
                        </li>
                        <li class="panel ">
                            <a class="accordion-toggle collapsed" data-toggle="collapse"
                            data-parent="#side-nav" href="#stats-collapse"><i class="fa fa-area-chart"></i> <span class="name">Statistics</span></a>
                            <ul id="stats-collapse" class="panel-collapse collapse ">
                                <li class=""><a href="stat_statistics.html">Stats</a></li>
                                <li class=""><a href="stat_charts.html">Charts</a></li>
                                <li class=""><a href="stat_realtime.html">Realtime</a></li>
                            </ul>
                        </li>

                        
                        <li class="panel ">
                            <a class="accordion-toggle collapsed" data-toggle="collapse"
                            data-parent="#side-nav" href="#tables-collapse"><i class="fa fa-cog"></i> <span class="name">aaa</span></a>
                            <ul id="tables-collapse" class="panel-collapse collapse ">
                                <li class=""><a href="tables_static.html">Static <sup class="text-danger fw-bold">upd</sup></a></li>
                                <li class=""><a href="tables_dynamic.html">Dynamic</a></li>
                            </ul>
                        </li>
                        <li class="panel ">
                            <a class="accordion-toggle collapsed" data-toggle="collapse"
                            data-parent="#side-nav" href="#special-collapse"><i class="fa fa-leaf"></i> <span class="name">Special</span></a>
                            <ul id="special-collapse" class="panel-collapse collapse ">
                                <li class=""><a href="special_search.html">Search <sup class="text-warning fw-bold">new</sup></a></li>
                                <li class=""><a href="special_invoice.html">Invoice</a></li>
                                <li class=""><a href="special_inbox.html">Inbox &nbsp; <span class="label label-important">3</span></a></li>
                                <li><a target="_blank" href="login.html">Login</a></li>
                                <li><a target="_blank" href="error.html">Error Page</a></li>
                                <li><a href="landing.html" data-no-pjax>Landing</a></li>
                                <li><a href="http://demo.flatlogic.com/3.1/white/index.html" data-no-pjax>White <sup class="text-warning fw-bold">new</sup></a></li>
                            </ul>
                        </li>
                        <li class="panel">
                            <a class="accordion-toggle collapsed" data-toggle="collapse"
                            data-parent="#side-nav" href="#menu-levels-collapse"><i class="fa fa-folder-open"></i> <span class="name">Menu Levels</span></a>
                            <ul id="menu-levels-collapse" class="panel-collapse collapse">
                                <li><a href="#">Item 1.1</a></li>
                                <li><a href="#">Item 1.2</a></li>
                                <li class="panel">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse"
                                    data-parent="#menu-levels-collapse" href="#sub-menu-1-collapse">Item 1.3</a>
                                    <ul id="sub-menu-1-collapse" class="panel-collapse collapse">
                                        <li class="panel">
                                            <a class="accordion-toggle collapsed" data-toggle="collapse"
                                            data-parent="#sub-menu-1-collapse" href="#sub-menu-3-collapse">Item 2.1</a>
                                            <ul id="sub-menu-3-collapse" class="panel-collapse collapse">
                                                <li><a href="#">Item 3.1</a></li>
                                                <li><a href="#">Item 3.2</a></li>
                                                <li><a href="#">Item 3.3</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Item 2.2</a></li>
                                        <li class="panel">
                                            <a class="accordion-toggle collapsed" data-toggle="collapse"
                                            data-parent="#sub-menu-1-collapse" href="#sub-menu-2-collapse">Item 2.3</a>
                                            <ul id="sub-menu-2-collapse" class="panel-collapse collapse">
                                                <li><a href="#">Item 3.4</a></li>
                                                <li><a href="#">Item 3.5</a></li>
                                                <li><a href="#">Item 3.6</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="visible-xs">
                            <a href="login.html"><i class="fa fa-sign-out"></i> <span class="name">Sign Out</span></a>
                        </li> -->
                    </ul>

                    

                    
                </nav>  
                <div class="wrap">
                    <header class="page-header">
                        <div class="navbar">
                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="visible-phone-landscape">
                                    <a href="#" id="search-toggle">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" title="Messages" id="messages"
                                    class="dropdown-toggle"
                                    data-toggle="dropdown">
                                    <i class="fa fa-comments"></i>
                                </a>
                                <ul id="messages-menu" class="dropdown-menu messages" role="menu">
                                    <li role="presentation">
                                        <a href="#" class="message">
                                            <img src="public/admin/img/1.jpg" alt="">
                                            <div class="details">
                                                <div class="sender">Jane Hew</div>
                                                <div class="text">
                                                    Hey, John! How is it going? ...
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#" class="message">
                                            <img src="public/admin/img/2.jpg" alt="">
                                            <div class="details">
                                                <div class="sender">Alies Rumiancaŭ</div>
                                                <div class="text">
                                                    I'll definitely buy this template
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#" class="message">
                                            <img src="public/admin/img/3.jpg" alt="">
                                            <div class="details">
                                                <div class="sender">Michał Rumiancaŭ</div>
                                                <div class="text">
                                                    Is it really Lore ipsum? Lore ...
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#" class="text-align-center see-all">
                                            See all messages <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" title="8 support tickets"
                                class="dropdown-toggle"
                                data-toggle="dropdown">
                                <i class="fa fa-group"></i>
                                <span class="count">8</span>
                            </a>
                            <ul id="support-menu" class="dropdown-menu support" role="menu">
                                <li role="presentation">
                                    <a href="#" class="support-ticket">
                                        <div class="picture">
                                            <span class="label label-important"><i class="fa fa-bell-o"></i></span>
                                        </div>
                                        <div class="details">
                                            Check out this awesome ticket
                                        </div>
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#" class="support-ticket">
                                        <div class="picture">
                                            <span class="label label-warning"><i class="fa fa-question-circle"></i></span>
                                        </div>
                                        <div class="details">
                                            "What is the best way to get ...
                                        </div>
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#" class="support-ticket">
                                        <div class="picture">
                                            <span class="label label-success"><i class="fa fa-tag"></i></span>
                                        </div>
                                        <div class="details">
                                            This is just a simple notification
                                        </div>
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#" class="support-ticket">
                                        <div class="picture">
                                            <span class="label label-info"><i class="fa fa-info-circle"></i></span>
                                        </div>
                                        <div class="details">
                                            12 new orders has arrived today
                                        </div>
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#" class="support-ticket">
                                        <div class="picture">
                                            <span class="label label-important"><i class="fa fa-plus"></i></span>
                                        </div>
                                        <div class="details">
                                            One more thing that just happened
                                        </div>
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#" class="text-align-center see-all">
                                        See all tickets <i class="fa fa-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="hidden-xs">
                            <a href="#" id="settings"
                            title="Settings"
                            data-toggle="popover"
                            data-placement="bottom">
                            <i class="fa fa-cog"></i>
                        </a>
                    </li>
                    <li class="hidden-xs dropdown">
                        <a href="#" title="Account" id="account"
                        class="dropdown-toggle"
                        data-toggle="dropdown">
                        <i class="fa fa-user"></i>
                    </a>
                    <ul id="account-menu" class="dropdown-menu account" role="menu">
                        <li role="presentation" class="account-picture">
                            <img src="public/user/images/demo/<?=$userlogin['avatar']?>" alt="">
                            <?=$userlogin['name']?>
                        </li>
                        <li role="presentation">
                            <a href="index.php?mod=blogger&act=update_info" class="link">
                                <i class="fa fa-user"></i>
                                Thay đổi thông tin cá nhân
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="index.php?mod=blogger&act=reset_password" class="link">
                                <i class="fa fa-calendar"></i>
                                Đổi mật khẩu
                            </a>
                        </li>
                        
                    </ul>
                </li>
                <li class="visible-xs">
                    <a href="#"
                    class="btn-navbar"
                    data-toggle="collapse"
                    data-target=".sidebar"
                    title="">
                    <i class="fa fa-bars"></i>
                </a>
            </li>
            <li class="hidden-xs"><a href="index.php?mod=blogger&act=logout"><i class="fa fa-sign-out"></i></a></li>
        </ul>
        <form id="search-form" class="navbar-form pull-right" role="search">
            <input type="search" class="form-control search-query" placeholder="Search...">
        </form>
        <div class="notifications pull-right">
            <div class="alert pull-right">
                <a href="#" class="close ml-xs" data-dismiss="alert">&times;</a>
                <i class="fa fa-info-circle mr-xs"></i> Check out Light Blue <a id="notification-link" href="#">settings</a> on the right!
            </div>
        </div>
    </div>
</header>  
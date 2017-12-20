<!DOCTYPE html>
<html lang="en" class="app">
<head>
    <meta charset="utf-8"/>
    <title>Tan Millet | Web Application</title>
    <meta name="description"
          content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav"/>

    <meta name="_token" content="{{ csrf_token() }}"/>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <link rel="stylesheet" href="/tan-admin/js/jPlayer/jplayer.flat.css" type="text/css"/>
    <link rel="stylesheet" href="/tan-admin/css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="/tan-admin/css/animate.css" type="text/css"/>
    <link rel="stylesheet" href="/tan-admin/css/font-awesome.min.css" type="text/css"/>
    <link rel="stylesheet" href="/tan-admin/css/simple-line-icons.css" type="text/css"/>
    <link rel="stylesheet" href="/tan-admin/css/font.css" type="text/css"/>
    <link rel="stylesheet" href="/tan-admin/css/app.css" type="text/css"/>
    <link rel="stylesheet" href="/tan-admin/css/sweetalert.css">

    @yield('tan-css')
    <!--[if lt IE 9]>
    <script src="/tan-admin/js/ie/html5shiv.js"></script>
    <script src="/tan-admin/js/ie/respond.min.js"></script>
    <script src="/tan-admin/js/ie/excanvas.js"></script>
    <![endif]-->
</head>
<body class="">
<section class="vbox">

    <header class="bg-white-only header header-md navbar navbar-fixed-top-xs">
        <div class="navbar-header aside bg-info dk nav-xs">
            <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
                <i class="icon-list"></i>
            </a>
            <a href="/pro" class="navbar-brand text-lt">
                <i class="icon-drop"></i>
                <img src="/tan-admin/images/logo.png" alt="." class="hide">
                <span class="hidden-nav-xs m-l-sm">Millet</span>
            </a>
            <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
                <i class="icon-settings"></i>
            </a>
        </div>
        <ul class="nav navbar-nav hidden-xs">
            <li>
                <a href="#nav,.navbar-header" data-toggle="class:nav-xs,nav-xs" class="ttext-muted active">
                    <i class="fa fa-indent text"></i>
                    <i class="fa fa-dedent text-active"></i>
                </a>
            </li>
        </ul>
        <form class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" role="search">
            <div class="form-group">
                <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-sm bg-white btn-icon rounded"><i class="fa fa-search"></i></button>
            </span>
                    <input type="text" class="form-control input-sm no-border rounded"
                           placeholder="查询..">
                </div>
            </div>
        </form>
        <div class="navbar-right ">
            <ul class="nav navbar-nav m-n hidden-xs nav-user user">
                <li class="hidden-xs">
                    <a href="#" class="dropdown-toggle lt" data-toggle="dropdown">
                        <i class="icon-bell"></i>
                        <span class="badge badge-sm up bg-danger count">2</span>
                    </a>
                    <section class="dropdown-menu aside-xl animated fadeInUp">
                        <section class="panel bg-white">
                            <div class="panel-heading b-light bg-light">
                                <strong>You have <span class="count">2</span> notifications</strong>
                            </div>
                            <div class="list-group list-group-alt">
                                <a href="#" class="media list-group-item">
                    <span class="pull-left thumb-sm">
                      <img src="/tan-admin/images/a0.png" alt="..." class="img-circle">
                    </span>
                                    <span class="media-body block m-b-none">
                      Use awesome animate.css<br>
                      <small class="text-muted">10 minutes ago</small>
                    </span>
                                </a>
                                <a href="#" class="media list-group-item">
                    <span class="media-body block m-b-none">
                      1.0 initial released<br>
                      <small class="text-muted">1 hour ago</small>
                    </span>
                                </a>
                            </div>
                            <div class="panel-footer text-sm">
                                <a href="#" class="pull-right"><i class="fa fa-cog"></i></a>
                                <a href="#notes" data-toggle="class:show animated fadeInRight">See all the
                                    notifications</a>
                            </div>
                        </section>
                    </section>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle bg clear" data-toggle="dropdown">
              <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                <img src="/tan-admin/images/a3.png" alt="...">
              </span>
                      {{get_user_name()}} <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight">
                        <li>
                            <span class="arrow top"></span>
                            <a href="#">修改信息</a>
                        </li>
                        <li>
                            <a href="profile.html">个人信息</a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="badge bg-danger pull-right">3</span>
                                任务提示
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                退出
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>
    <section>
        <section class="hbox stretch">
            <!-- .aside -->
            <aside class="bg-black dk aside hidden-print nav-xs" id="nav">
                <section class="vbox">
                    <section class="w-f-md scrollable">
                        <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0"
                             data-size="10px" data-railOpacity="0.2">
                            <!-- nav -->
                            <nav class="nav-primary hidden-xs">
                                <ul class="nav bg clearfix">
                                    <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted">
                                        快捷方式
                                    </li>
                                    <li>
                                        <a href="index.html">
                                            <i class="icon-user icon text-success"></i>
                                            <span class="font-bold">个人信息</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/pro/show/task">
                                            <i class="icon-list icon text-info-lter"></i>
                                            <span class="font-bold">新建任务</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/pro/show/project">
                                            <i class="icon-drawer icon text-primary-lter"></i>
                                            <span class="font-bold">新建项目</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/pro/show/project">
                                            <i class="fa fa-bug icon text-primary-lter"></i>
                                            <span class="font-bold">新建BUG</span>
                                        </a>
                                    </li>
                                    <li class="m-b hidden-nav-xs"></li>
                                </ul>
                                <ul class="nav" data-ride="collapse">
                                    <li class="active">
                                        <a href="#" class="auto"><span class="pull-right text-muted"><i class="fa fa-angle-left text"></i><i class="fa fa-angle-down text-active"></i></span>
                                            <i class="fa fa-inbox"></i>
                                            <span>项目管理</span>
                                        </a>
                                        <ul class="nav dk text-sm">
                                            <li class="">
                                                <a href="/pro" class="auto">
                                                    <i class="icon-drawer icon text-xs"></i>
                                                    <span>项目列表</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="/pro/show/project" class="auto">
                                                    <i class="icon-plus text-xs"></i>
                                                    <span>添加项目</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="/pro/tasks" class="auto">
                                                    <i class="icon-list icon text-xs"></i>
                                                    <span>任务列表</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="/pro/show/task" class="auto">
                                                    <i class="icon-plus text-xs"></i>
                                                    <span>添加任务</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="/pro/tasks" class="auto">
                                                    <i class="fa fa-bug text-xs"></i>
                                                    <span>BUG列表</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="/pro/show/task" class="auto">
                                                    <i class="icon-plus text-xs"></i>
                                                    <span>添加BUG</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="nav text-sm">
                                    <li>
                                        <a href="#">
                                            <i class="icon-eye icon text-info-lter"></i>
                                            <b class="badge bg-info dker pull-right">9</b>
                                            <span>最新焦点</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            <!-- / nav -->
                        </div>
                    </section>
                    <footer class="footer hidden-xs no-padder text-center-nav-xs">
                        <div class="bg hidden-xs ">
                            <div class="dropdown dropup wrapper-sm clearfix">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <span class="thumb-sm avatar pull-left m-l-xs">
                        <img src="/tan-admin/images/a3.png" class="dker" alt="...">
                        <i class="on b-black"></i>
                      </span>
                                    <span class="hidden-nav-xs clear">
                        <span class="block m-l">
                          <strong class="font-bold text-lt">  {{get_user_name()}}</strong>
                          <b class="caret"></b>
                        </span>
                        <span class="text-muted text-xs block m-l">自游人</span>
                      </span>
                                </a>
                                <ul class="dropdown-menu animated fadeInRight aside text-left">
                                    <li>
                                        <span class="arrow bottom hidden-nav-xs"></span>
                                        <a href="#">修改信息</a>
                                    </li>
                                    <li>
                                        <a href="profile.html">个人信息</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="badge bg-danger pull-right">3</span>
                                            任务提示
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            退出
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </footer>
                </section>
            </aside>
            <!-- /.aside -->
            <section id="content">
                @yield('tan-main')
                <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open"
                   data-target="#nav,html"></a>
            </section>
        </section>
    </section>
</section>

<script src="/tan-admin/js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/tan-admin/js/bootstrap.js"></script>
<!-- App -->
<script src="/tan-admin/js/app.js"></script>
<script src="/tan-admin/js/slimscroll/jquery.slimscroll.min.js"></script>
<script src="/tan-admin/js/app.plugin.js"></script>
<script type="text/javascript" src="/tan-admin/js/jPlayer/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="/tan-admin/js/jPlayer/add-on/jplayer.playlist.min.js"></script>
<script type="text/javascript" src="/tan-admin/js/jPlayer/demo.js"></script>

@yield('tan-js')

</body>
</html>
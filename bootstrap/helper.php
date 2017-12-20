<?php
/*
|--------------------------------------------------------------------------
|Helper 提供系统需要的方法
|--------------------------------------------------------------------------
|
|提高代码的利用率复用
|加强代码规范
|
*/

/**
 * 后台模板菜单栏进行渲染
 * 后台菜单栏作用方便用户使用点击不同的菜单栏激活当前菜单栏
 * 并且请求对应的页面
 */
if (!function_exists("render_menu")) {
    function render_menu()
    {
        $current_request = current_url();

        //菜单数据
        $menus = [
            [
                'name'           => '权限管理',
                'status'         => TRUE,
                'level'          => 1,
                'run_url'        => '#',
                'request_urls'   => [
                    '/admin2/roles',
                    '/admin2/show/role',
                    '/admin2/permissions',
                    '/admin2/show/permission',
                ],
                'icon_css_class' => 'fa fa-laptop',
                'children_nodes' => [
                    [
                        'name'           => '角色列表',
                        'status'         => TRUE,
                        'level'          => 0,
                        'run_url'        => '/admin2/roles',
                        'icon_css_class' => 'fa fa-circle-o',
                        'request_urls'   => [],
                        'children_nodes' => [],
                    ],
                    [
                        'name'           => '权限列表',
                        'status'         => TRUE,
                        'level'          => 0,
                        'run_url'        => '/admin2/permissions',
                        'icon_css_class' => 'fa fa-circle-o',
                        'request_urls'   => [],
                        'children_nodes' => [],
                    ],
                ],
            ],
            [
                'name'           => '时间轴管理',
                'status'         => TRUE,
                'level'          => 1,
                'request_urls'   => [
                    '/admin2/tlcontents',
                    '/admin2/tltypes',
                    '/admin2/show/tlcontent',
                    '/admin2/show/tltype',
                ],
                'run_url'        => '#',
                'icon_css_class' => 'fa fa-laptop',
                'children_nodes' => [
                    [
                        'name'           => '类型列表',
                        'status'         => TRUE,
                        'level'          => 0,
                        'run_url'        => '/admin2/tltypes',
                        'icon_css_class' => 'fa fa-circle-o',
                        'request_urls'   => [],
                        'children_nodes' => [],
                    ],
                    [
                        'name'           => '内容列表',
                        'status'         => TRUE,
                        'level'          => 0,
                        'run_url'        => '/admin2/tlcontents',
                        'icon_css_class' => 'fa fa-circle-o',
                        'request_urls'   => [],
                        'children_nodes' => [],
                    ],
                ],
            ],
        ];
        //render html
        $ul_start_html = '<ul class="sidebar-menu" data-widget="tree"><li class="header">MAIN NAVIGATION</li>';
        $li_start_html = '<li class="treeview">';
        $li_start_active_html = '<li class="treeview  active menu-open">';
        $li_active_html = '<li class="active">';
        $li_html = '<li>';
        $a_start_html = '<a href="#">';
        $render_html = '';
        $a_end_html = '</a>';
        $li_end_html = '</li>';
        $ul_end_html = '</ul>';
        $render_html .= $ul_start_html;
        foreach ($menus as $menu) {
            if (!$menu['status']) {
                continue;
            }
            $str = (in_array($current_request, $menu['request_urls'])) ? $li_start_active_html : $li_start_html;
            $render_html .= $str.$a_start_html.'<i class="'.$menu['icon_css_class'].'"></i><span>'.$menu['name'].'</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>'.$a_end_html;

            if ($menu['level'] != 0 && isset($menu['children_nodes'])) {
                $render_html .= '<ul class="treeview-menu">';

                foreach ($menu['children_nodes'] as $children_node) {
                    if (!$children_node['status']) {
                        continue;
                    }
                    if ($children_node['level'] != 0 && isset($children_node['children_nodes'])) {
                        //进行二级
                    } else {
                        $str_li = ($current_request == $children_node['run_url']) ? $li_active_html : $li_html;
                        $render_html .= $str_li.'<a href="'.$children_node['run_url'].'"><i class="'.$children_node['icon_css_class'].'"></i> '.$children_node['name'].'</a></li>';
                    }
                }
                $render_html .= $ul_end_html;
            }
            $render_html .= $li_end_html;
        }
        $render_html .= $ul_end_html;

        return $render_html;
    }
}

/**
 * 获取当前请求的URL
 */
if (!function_exists("current_url")) {
    function current_url()
    {
        return \Illuminate\Support\Facades\Request::getRequestUri();
    }
}

/**
 *求两个日期之间相差的天数
 */
if (!function_exists("diff_between_two_days")) {
    function diff_between_two_days($start_date, $end_date)
    {
        $falg = FALSE;
        $start_date_second = strtotime($start_date);
        $end_date_second = strtotime($end_date);
        if ($start_date_second < $end_date_second) {
            $tmp = $end_date_second;
            $end_date_second = $start_date_second;
            $start_date_second = $tmp;
            $falg = TRUE;
        }

        return ($falg) ? 0 - (($start_date_second - $end_date_second) / 86400) : ($start_date_second - $end_date_second) / 86400;
    }
}

/**
 * 获取当前登录用户姓名
 */
if (!function_exists("get_user_name")) {
    function get_user_name()
    {
        if (\Illuminate\Support\Facades\Auth::check()) {
            return \Illuminate\Support\Facades\Auth::user()->name;
        }

        return "";
    }
}
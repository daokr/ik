<?php if (!defined('THINK_PATH')) exit(); if($ik == 'index'): ?><li class="treemenu_on">
        <a style="outline:none;" hidefocus="true" href="javascript:void(0)" class="actuator">系统首页</a>
        <ul class="submenu" style="display: block;">
            <li><a style="outline:none;" hidefocus="true" class="submenuB" href="<?php echo U('admin/index/main');?>" target="MainIframe">首页</a></li>
            <li><a style="outline:none;" hidefocus="true" class="submenuA" href="<?php echo U('admin/cache/index');?>" target="MainIframe">缓存管理</a></li>
            <li><a style="outline:none;" hidefocus="true" class="submenuA" href="<?php echo U('admin/words/lists');?>" target="MainIframe">违禁词过滤</a></li>
            <li><a style="outline:none;" hidefocus="true" class="submenuA" href="<?php echo U('admin/tag/manage');?>" target="MainIframe">标签管理</a></li>
            <li><a style="outline:none;" hidefocus="true" class="submenuA" href="<?php echo U('admin/area/manage');?>" target="MainIframe">地区管理</a></li>
        </ul>   
    </li>
    <li class="treemenu_on">
        <a style="outline:none;" hidefocus="true" href="javascript:void(0)" class="actuator">前台管理</a>
        <ul class="submenu" style="display: block;">
            <li><a style="outline:none;" hidefocus="true" class="submenuB" href="<?php echo U('admin/home/page');?>" target="MainIframe">单页管理</a></li>
        </ul> 
    </li><?php endif; ?>

<?php if($ik == 'setting'): ?><li class="treemenu_on">
        <a style="outline:none;" hidefocus="true" href="javascript:void(0)" class="actuator">全局配置</a>
        <ul class="submenu" style="display: block;">
            <li><a style="outline:none;" hidefocus="true" class="submenuB" href="<?php echo U('admin/setting/index');?>" target="MainIframe">站点设置</a></li>
            <li><a style="outline:none;" hidefocus="true" class="submenuA" href="<?php echo U('admin/setting/url');?>" target="MainIframe">链接形式</a></li>
         </ul>
    </li> 

    <li class="treemenu_on">
        <a style="outline:none;" hidefocus="true" href="javascript:void(0)" class="actuator">前台界面</a>
        <ul class="submenu" style="display: block;">
            <li><a style="outline:none;" hidefocus="true" class="submenuA" href="<?php echo U('admin/nav/index');?>" target="MainIframe">导航设置</a></li>
            <li><a style="outline:none;" hidefocus="true" class="submenuA" href="<?php echo U('admin/setting/theme');?>" target="MainIframe">前台风格</a></li>        
         </ul>
    </li><?php endif; ?>
<?php if($ik == 'user'): ?><li class="treemenu_on">
        <a style="outline:none;" hidefocus="true" href="javascript:void(0)" class="actuator">用户管理</a>
        <ul class="submenu" style="display: block;">
        <li><a style="outline:none;" hidefocus="true" class="submenuB" href="<?php echo U('admin/user/manage');?>" target="MainIframe">会员列表</a></li>
        </ul>
    </li><?php endif; ?>

<?php if($ik == 'apps'): ?><li class="treemenu_on">
        <a style="outline:none;" hidefocus="true" href="javascript:void(0)" class="actuator">应用管理</a>
        <ul class="submenu" style="display: block;">
        	<li><a style="outline:none;" hidefocus="true" class="submenuB" href="<?php echo U('admin/apps/uninstall');?>" target="MainIframe">未安装的应用</a></li>
        	<li><a style="outline:none;" hidefocus="true" class="submenuA" href="<?php echo U('admin/apps/installed');?>" target="MainIframe">已安装的应用</a></li>
        </ul>
    </li><?php endif; ?>
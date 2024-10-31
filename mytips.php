<?php
/*
Plugin Name: My Tips
Plugin URI:http://wordpress.org/extend/plugins/my-tips/
Author:胡继续
Version:1.0.3
Author URI:http://blog.csdn.net/hu2008yinxiang
Description: 一个为您的博客添加气泡提示支持的插件。核心组件为<a href="http://www.craigsworks.com/projects/qtip2">qTip2</a>。. . . . . . . . <br><a href="mailto:hu2008yinxiang@163.com">邮件支持</a>. . . . . . . . <br>A plugin that can add bubble tips supporting to your blog. It's core component is <a href="http://www.craigsworks.com/projects/qtip2">qTip2</a>. <a href="mailto:hu2008yinxiang@163.com">Contact Author</a> 
License: GPLv2
*/
?>
<?php

require_once 'js/mytips-class.php';
add_action('init', 'MyTips::mytips_init');
register_uninstall_hook(__FILE__, 'mytips_uninstall');
register_activation_hook(__FILE__, 'mytips_install');


/**
 * 安装函数
 */
function mytips_install()
{
	if(!get_option('mytips_options'))
		add_option('mytips_options',unserialize('a:4:{s:4:"attr";a:1:{i:0;a:4:{s:5:"label";s:1:"a";s:7:"content";s:5:"title";s:5:"title";s:0:"";s:2:"et";s:5:"false";}}s:5:"arrow";s:11:"left center";s:8:"position";s:12:"right center";s:5:"style";s:16:"ui-tooltip-tipsy";}'));
}
/**
 * 卸载函数
 */
function mytips_uninstall()
{
	delete_option('mytips_options');
}
?>
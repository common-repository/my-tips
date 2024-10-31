=== My Tips ===

Contributors: hu2008yinxiang

Donate link: 

Tags: WordPress, qTip2, My Tips,Tips

Requires at least: 3.1.2

Tested up to: 3.4.2

Stable tag: 1.0.3

License: GPLv2 or later

License URI: http://www.gnu.org/licenses/gpl-2.0.html


My Tips能让您轻而易举地为您的WordPress添加气泡提示的插件。My Tips is a plugin that make you get your blog Bubble Tiped easily.

== Description ==

My Tips是一款让您能亲轻而易举地为您的WordPress添加气泡提示的插件。  
My Tips is a plugin that make you get your blog **Bubble Tip**ed easily.

使用它的理由:  
The reason of why you use it:

1. **无需修改**任何文件；  
	**NO FILE** need to be edit to use it.

2. **自动检测**jQuery库，避免冲突；  
	**AUTO DETECT** the loading of jQuery Lib to avoid conflict.

3. 配置**多样化**但很**简单**，轻松为各标签**批量添加**Tip。  
	**Multi-Styled** but **Simple-Use**, it's just a cake for you to make all elements to be **Tipped**.




== Installation ==

1. 使用WordPress的上传插件将下载的zip文件上传安装即可。或者将zip文件解压后通过ftp上传至wp-content/plugins/目录。  
	You can simply use the WordPress' Install Plugins page install this plugin from the WordPress plugin repo or download the zipped file and unziiped it to the wp-content/plugins/ directory.

2. 在‘已安装的插件‘中‘启用’ ‘My Tips’。  
	Switch to the Installed Plugins page to activate 'My Tips'.

3. 在‘My Tips’配置页进行个性化设置。  
	And you can config if in the 'My Tips Configuration' page.



== Frequently Asked Questions ==

= 配置中的标签名是什么意思？ /  What is the 'Label Name' means to ?  =

配置中的**标签名**会作为Tip的**选择器**，比如'a'，会给页面所有的链接且内容属性不为空的加上Tip（如果它的内容属性值不为空的话），像配置标签名为a，内容属性为attr，标题属性为title，会对所有的具有attr属性的链接加Tip，当鼠标悬停时会弹出Tip鼠标移出Tip关闭，这样的话对于类似`<a href="xxx" title="示例标题" attr="示例内容">示例链接</a>`的链接，鼠标悬停时会弹出内容为“示例内容”标题为“示例标题”的Tip。  
In the configurations every **Label Nam**e will be the **selector** for decide what element should be **Tipped**. For example, the 'a' will make all links will be tipped(if them have an un-empty content attribute).So if you have a config label name as 'a', content attribute as 'attr', title attribute as 'title', all the links that has an un-empty 'attr' attribution will be tipped, the tip will popped by mousehover and close by mouseleave. such as `<a href="xxx" title="example title" attr="example content">example link</a>` will have a tip poped with mousehover and closed with mouseleave, its content is 'example content' and its title is 'example title'. 

= 标签名有哪几种形式  / How many selector it support ? =

两种，一种是直接标签名为标签选择器，支持通配符。另外一种是以点头的类选择器。**2012-11-4更新支持ID选择器。**  
Tow kinds, one kind is the label selector, and it support the '*' to apply to any label. another one is the class selector which are prefixed by '.' .

= 怎样让指定的内容Tip显示？ / How to make your message displayed ?=

例如：为所有的具有title属性的链接加上Tip并以title属性作为Tip内容，你需要这样做，在My Tip配置里添加自动属性，标签名a，内容属性title，保存配置后，只要前台页面中的链接具有title属性就会被加上Tip。当鼠标悬停在她上面时，就会弹出Tip。  
Set your message as the value of the content attribute that you has configed.




== Screenshots ==

1. screenshot-1.png
2. screenshot-2.png
3. screenshot-3.png

== Changelog ==

= 2012.11.04 = 
* 修复功能缺陷，支持ID选择器 
	FIX the function bug, and make it support the ID selector.

= 2012.10.21 =

* 完善国际化支持  
	Completed the Internationalizition.

* 添加国际化支持  
	Make It Internationalized.

= 1.0.1 =

* 修改qTip调用方式。在js/mytips-class.php  
	Modified the calling of qTip. at js/mytips-class.php.

* 修改jQuery兼容性，考虑其他插件会替换系统自带jQuery  
	Modified the compatibility of jQuery, aware of others plugins/themes will replace the jQuery Lib of WordPress.

== Upgrade Notice ==

= 1.0.2 = 
* 修复功能缺陷，支持ID选择器 
	FIX the function bug, and make it support the ID selector.


= 1.0.1 =

 为了兼容其他使用jQuery库的插件而做的修改。  
 The Modify to make it to be compatible to other plugins that use jQuery.




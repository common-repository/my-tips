<?php
/**
 * @author 胡继续
 * @version 1.0.0
 * @license GPLv2S
 * @name My Tips 核心类
 */
class MyTips
{

	/**
	 * @var 样式列表
	 */
	const MYTIPS_STYLES='a:13:{s:18:"ui-tooltip-default";s:12:"默认样式";s:18:"ui-tooltip-youtube";s:13:"YouTube样式";s:17:"ui-tooltip-jtools";s:12:"jTools样式";s:18:"ui-tooltip-cluetip";s:13:"Cluetip样式";s:16:"ui-tooltip-tipsy";s:11:"Tipsy样式";s:17:"ui-tooltip-tipped";s:12:"Tipped样式";s:20:"ui-tooltip-bootstrap";s:13:"Twitter样式";s:16:"ui-tooltip-light";s:16:"qTip Light样式";s:15:"ui-tooltip-dark";s:15:"qTip Dark样式";s:16:"ui-tooltip-cream";s:16:"qTip Cream样式";s:15:"ui-tooltip-blue";s:15:"qTip Blue样式";s:16:"ui-tooltip-green";s:16:"qTip Green样式";s:14:"ui-tooltip-red";s:14:"qTip Red样式";}';
	/**
	 * @var 位置列表
	 */
	const MYTIPS_POSITIONS='a:12:{i:0;s:10:"top center";i:1;s:9:"top right";i:2;s:9:"right top";i:3;s:12:"right center";i:4;s:12:"right bottom";i:5;s:12:"bottom right";i:6;s:13:"bottom center";i:7;s:11:"bottom left";i:8;s:11:"left bottom";i:9;s:11:"left center";i:10;s:8:"left top";i:11;s:8:"top left";}';
	/**
	 * @var 默认配置
	 */
	const MYTIPS_DEFAULT_OPTIONS='a:4:{s:4:"attr";a:0:{}s:5:"arrow";s:13:"bottom center";s:8:"position";s:10:"top center";s:5:"style";s:18:"ui-tooltip-default";}';
	/**
	 * @var qTip2加载JS
	 */
	const MYTIPS_JS_MAIN="jQuery('%s[%s]').qtip({content:{attr:'%s'%s},position:{my:'%s',at:'%s'},style:{classes:'%s'}});";
	/**
	 * @var qTip2加载JS title
	 */
	const MYTIPS_JS_TITLE=",title:{text:function(api){return $(this).attr('%s');}}";
	/**
	 * @var MyTips配置项名称
	 */
	const MYTIPS_OPTIONS_NAME='mytips_options';

	/**
	 * 获取MyTips配置
	 * @return Ambigous <mixed, boolean>
	 */
	private function mytips_get_options()
	{
		return get_option(MyTips::MYTIPS_OPTIONS_NAME,unserialize(MyTips::MYTIPS_DEFAULT_OPTIONS));
	}

	/**
	 * 写入配置
	 * @param <mixed> $param
	 */
	private function mytips_update_options($param) {
		$default=unserialize(MyTips::MYTIPS_DEFAULT_OPTIONS);
		if(!isset($param['attr']))$param['attr']=$default['attr'];
		if(!isset($param['arrow']))$param['arrow']=$default['arrow'];
		if(!isset($param['position']))$param['position']=$default['position'];
		if(!isset($param['style']))$param['style']=$default['style'];
		update_option(MyTips::MYTIPS_OPTIONS_NAME, $param);
	}

	/**
	 * @deprecated
	 * 负责添加jQuery支持
	 */
	public function mytips_add_jquery() {
	}
	/**
	 * 添加管理菜单
	 */
	public function mytips_add_menu() {
		add_options_page(__('My Tips配置','my-tips'), __('配置My Tips','my-tips'), 'activate_plugins', 'mytipsconfig','MyTips::mytips_admin_page');
	}
	/**
	 * 配置页函数
	 */
	public function mytips_admin_page() {
		?>
<div class="wrap">
	<?php screen_icon();?>
	<h2><?php _e('My Tips配置','my-tips')?></h2>
	<?php echo MyTips::mytips_verify_options();?>
	<?php
	$options=MyTips::mytips_get_options();
	?>
	<form action="" method="post" id="mytips-options">
		<?php wp_nonce_field('mytips-nonce','mytips-nonce')?>
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><?php _e('自动参数','my-tips');?></th>
					<td><table class="wp-list-table widefat" cellspacing="0">
							<thead>
								<tr>
									<th scope="col" class="manage-column"><span><?php _e('标签名','my-tips');?></span><span
										class="sorting-indicator"></span></th>
									<th scope="col" class="manage-column"><span><?php _e('内容属性','my-tips');?></span><span
										class="sorting-indicator"></span></th>
									<th scope="col" class="manage-column"><span><?php _e('标题属性','my-tips');?></span>
									</th>
									<th scope="col" class="manage-column"><span> <input
											type="checkbox" onclick="allchecked('checkallh');"
											id="checkallh" /><?php _e('启用标题','my-tips');?>
									</span></th>
									<th scope="col" class="manage-column"><?php _e('删除','my-tips');?></th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th scope="col" class="manage-column "><span><?php _e('标签名','my-tips');?></span><span
										class="sorting-indicator"></span></th>
									<th scope="col" class="manage-column"><span><?php _e('内容属性','my-tips');?></span><span
										class="sorting-indicator"></span></th>
									<th scope="col" class="manage-column"><span><?php _e('标题属性','my-tips');?></span>
									</th>
									<th scope="col" class="manage-column"><span> <input
											type="checkbox" onclick="allchecked('checkallf');"
											id="checkallf" /><?php _e('启用标题','my-tips');?>
									</span></th>
									<th scope="col" class="manage-column"><?php _e('删除','my-tips');?></th>
								</tr>
							</tfoot>
							<tbody class="list" id="attr-list">
								<?php 
								for($i=0;$i<count($options['attr']);++$i):?>
								<tr <?php if($i%2==0) echo 'class="alternate" '?>
									id="attr-<?php echo $i;?>">
									<td><input type="text" name="attr[<?php echo $i;?>][label]"
										value="<?php echo $options['attr'][$i]['label']?>"></td>
									<td><input type="text" name="attr[<?php echo $i;?>][content]"
										value="<?php echo $options['attr'][$i]['content']?>"></td>
									<td><input type="text" name="attr[<?php echo $i;?>][title]"
										value="<?php echo $options['attr'][$i]['title']?>"></td>
									<td><span> <input type="checkbox"
											name="attr[<?php echo $i;?>][et]" value="true"
											<?php if($options['attr'][$i]['et']=='true')echo 'checked';?>><?php _e('启用标题','my-tips');?>
									</span></td>
									<td><input type="button" value="<?php _e('删除','my-tips')?>" class="button-primary"
										onclick="deleteRow('attr-'+<?php echo $i;?>);" /></td>
								</tr>
								<?php endfor;
								?>
							</tbody>
						</table> <input type="button" class="button-primary" value="<?php _e('添加','my-tips')?>"
						onclick="addRow();" />
						<p class="description"><?php _e('自动参数中的每一行中的标签名即为将启用Tips的标签名，内容属性即为作为Tip内容的属性，标题属性即为作为标题的属性。','my-tips');?></p>
					</td>
				</tr>
				<script>
				<!-- 
				var newid=0;
				function deleteRow(i)
				{
					var row=document.getElementById(i);
					var tbody=row.parentNode;
					tbody.deleteRow(row.rowIndex-1);
				}
				function allchecked(id)
				{
					var ck=document.getElementById(id);
					document.getElementById('checkallh').checked=ck.checked;
					document.getElementById('checkallf').checked=ck.checked;
					var cks=getCheckboxs("attr[[][^'\s]*][[]et]");
					for(var i=0;i<cks.length;++i)
					{
						cks[i].checked=ck.checked;
					}
				}
				function getCheckboxs(pattern)
				{
					var es=document.getElementsByTagName('input');
					var mtag=[];
					var p=new RegExp(pattern);
					for(var i=0;i<es.length;++i)
					{
						if(p.test(es[i].name))mtag.push(es[i]);
					}
					return mtag;
				}
				function addRow()
				{
					var tbody=document.getElementById("attr-list");
					//var newid=tbody.rows.length;
					var newtr=tbody.insertRow(tbody.rows.length);
					newtr.id="new-attr-"+newid;
					if(newtr.rowIndex%2==1)
						newtr.className='alternate';
					//alert(newtr.className);
					newtr.innerHTML='<td></td><td></td><td></td><td></td><td></td>';
					newtr.cells[0].innerHTML='<input type="text" name="attr['+newtr.id+'][label]'+' value="" />';
					newtr.cells[1].innerHTML='<input type="text" name="attr['+newtr.id+'][content]'+' value="" />';
					newtr.cells[2].innerHTML='<input type="text" name="attr['+newtr.id+'][title]'+' value="" />';
					newtr.cells[3].innerHTML='<span><input type="checkbox" name="attr['+newtr.id+'][et]" value="true" checked /><?php _e('启用标题','my-tips');?></span>';
					newtr.cells[4].innerHTML='<input type="button" value="<?php _e('删除','my-tips');?>" class="button-primary" onclick="deleteRow(\''+newtr.id+'\');" />';
					++newid;
				}
				//-->
				</script>
				<tr valign="top">
					<th scope="row"><label><?php _e('箭头位置','my-tips');?></label>
					</th>
					<?php $opts=unserialize(MyTips::MYTIPS_POSITIONS);?>
					<td><select name="arrow">
							<?php 
							foreach ($opts as $top)
							{
								echo '<option value="'.$top.'" '.($options['arrow']==$top?'selected="selected"':'').'>'.__($top,'my-tips').'</option>
								';
							}
							?>
					</select>
						<p class="description"><?php _e('My Tips箭头位置。','my-tips');?></p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label><?php _e('主体位置','my-tips');?></label>
					</th>
					<td><select name="position">
							<?php 
							foreach ($opts as $top)
							{
								echo '<option value="'.$top.'" '.($options['position']==$top?'selected="selected"':'').'>'.__($top,'my-tips').'</option>
								';
							}
							?>
					</select>
						<p class="description"><?php _e('My Tips主体位置','my-tips');?>。</p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label><?php _e('外观样式','my-tips');?></label>
					</th>
					<td><select name="style">
							<?php 
							$opts=unserialize(MyTips::MYTIPS_STYLES);
							foreach ($opts as $optsck=>$optscv)
							{
								echo '<option value="'.$optsck.'" '.(isset($options['style'])&&$options['style']==$optsck?'selected="selected"':'').'>'.__($optscv,'my-tips').'</option>
								';
							}
							?>
					</select>
						<p class="description"><?php _e('My Tips外观样式。','my-tips');?></p>
					</td>
				</tr>
			</tbody>
		</table>
		<p>
			<input type="hidden" name="mytips-options" value="mytips-options"> <input
				type="submit" value="<?php _e('更新配置','my-tips');?>" class="button-primary">
		</p>
	</form>
</div>
<?php
	}
	/**
	 * 前台工作函数
	 */
	public function mytips_hook_mytips() {
		if(!is_admin()):

		endif;
	}

	/**
	 * 初始化函数
	 */
	public function mytips_init()
	{	load_plugin_textdomain('my-tips',false,'mytips/languages');
		//前台
		if(!is_admin())
		{
			//注册CSS
			MyTips::mytips_load_css();
			//注册jquery
			if(!wp_script_is('jquery'))wp_enqueue_script('jquery');
			//注册qTip2
			if(!wp_script_is('qtip2js'))wp_enqueue_script('qtip2js',plugins_url('jquery.qtip.js',__FILE__),array('jquery'),false,true);
			//注册JS
			if(!wp_script_is('mytips-js'))wp_enqueue_script('mytips-js',plugins_url('jquery.mytips.php?load='.urlencode_deep(serialize(MyTips::mytips_get_options())),__FILE__),array('qtip2js'),false,true);
			//echo serialize(MyTips::mytips_get_options());
		}
		//hook管理菜单
		add_action('admin_menu','MyTips::mytips_add_menu');
	}

	/**
	 * 安装函数
	 */
	public function install()
	{
		$installed_options='a:4:{s:4:"attr";a:1:{i:0;a:4:{s:5:"label";s:1:"a";s:7:"content";s:5:"title";s:5:"title";s:0:"";s:2:"et";s:5:"false";}}s:5:"arrow";s:11:"left center";s:5:"style";s:16:"ui-tooltip-tipsy";s:8:"position";s:12:"right center";}';
		add_option(MyTips::MYTIPS_OPTIONS_NAME,unserialized($installed_options));
	}

	/**
	 * 卸载函数
	 */
	public function uninstall()
	{
		delete_option(MyTips::MYTIPS_OPTIONS_NAME);
	}
	/**
	 * 附加css样式表
	 */
	private function mytips_load_css()
	{
		if(!wp_style_is('qtip2css'))
			wp_enqueue_style('qtip2css',plugins_url('jquery.qtip.css',__FILE__));
	}
	/**
	 * 校验页面的配置
	 * @return string 检验结果如果错误则返回失败串成功则更新配置并返回成功串，未配置则返回空串
	 */
	private function mytips_verify_options()
	{
		//updated  / updated settings-error
		$str='<div id="message" class="%s"><p>%s</p></div>';
		if(isset($_POST['mytips-options']))
		{
			if(isset($_POST['mytips-nonce'])&&wp_verify_nonce($_POST['mytips-nonce'],'mytips-nonce'))
			{
				$options=MyTips::mytips_get_options();
				$options['attr']=array();
				if(isset($_POST['attr']))
				{
					foreach ($_POST['attr'] as $attrc)
					{
						//如果label没有设置
						if(!isset($attrc['label'])||strlen($attrc['label'])<1)continue;

						//如果content没有设置则跳过
						if(!isset($attrc['content'])||strlen($attrc['content'])<1)continue;

						//如果et没有设置则为false
						if(!isset($attrc['et'])||$attrc['et']!='true')$attrc['et']='false';

						//如果title为空则不启用
						if(!isset($attrc['title']))$attrc['et']='false';


						$attrc['label']=esc_attr($attrc['label']);
						$attrc['content']=esc_attr($attrc['content']);
						$attrc['et']=esc_attr($attrc['et']);
						$attrc['title']=esc_attr($attrc['title']);

						//如果label没有设置
						if(!isset($attrc['label'])||strlen($attrc['label'])<1)continue;
						//如果content没有设置则跳过
						if(!isset($attrc['content'])||strlen($attrc['content'])<1)continue;

						//如果et没有设置则为false
						if(!isset($attrc['et'])||$attrc['et']!='true')$attrc['et']='false';

						//如果title为空则不启用
						if(!isset($attrc['title']))$attrc['et']='false';
						//添加
						array_push($options['attr'],$attrc);

					}
				}
				if(isset($_POST['arrow']))
				{
					$options['arrow']=esc_attr($_POST['arrow']);
				}
				if(isset($_POST['position']))
				{
					$options['position']=esc_attr($_POST['position']);
				}
				if(isset($_POST['style']))$options['style']=$_POST['style'];
				MyTips::mytips_update_options($options);
				$str=sprintf($str,'updated',__('配置更新成功。','my-tips'));
			}
			else
			{
				$str=sprintf($str,'updated setting-error','<strong>'.__('配置更新失败：不可信的请求。','my-tips').'</strong>');
			}
		}
		else
			return '';
		return $str;
	}

}
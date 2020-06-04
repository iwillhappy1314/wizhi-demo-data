<?php
/**
 * 文章
 */

// 多段文章
$post_normal = [
	'post_title'   => '测试从文件中读取数据',
	'post_name'   => 'post-normal',
	'post_content' => file_get_contents( WIZHI_DEMO_DATA . 'data/post-normal.html', true ),
	'post_status'  => 'publish',
];

// 带链接的文章
$post_link = [
	'post_title'   => '谷歌专利使无人驾驶汽车安全得多',
	'post_name'   => 'post-link',
	'post_content' => file_get_contents( WIZHI_DEMO_DATA . 'data/post-link.html', true ),
	'post_status'  => 'publish',
];

// 带图片的文章
$post_image = [
	'post_title'   => '亚马逊收到了一个好消息：它的会员留存率惊人',
	'post_name'   => 'post-image',
	'post_content' => file_get_contents( WIZHI_DEMO_DATA . 'data/post-image.html', true ),
	'post_status'  => 'publish',
];

// 带列表的文章
$post_list = [
	'post_title'   => 'Adobe研发Win10通用应用程序 手机电脑都能用',
	'post_name'   => 'post-list',
	'post_content' => file_get_contents( WIZHI_DEMO_DATA . 'data/post-list.html', true ),
	'post_status'  => 'publish',
];

// 带引用的文章
$post_quote = [
	'post_title'   => '薛定谔猫能同时同处两地',
	'post_name'   => 'post-quote',
	'post_content' => file_get_contents( WIZHI_DEMO_DATA . 'data/post-quote.html', true ),
	'post_status'  => 'publish',
];

// 带表格的文章
$post_table = [
	'post_title'   => '优步的动态定价策略是抢钱吗？',
	'post_name'   => 'post-table',
	'post_content' => file_get_contents( WIZHI_DEMO_DATA . 'data/post-table.html', true ),
	'post_status'  => 'publish',
];


/**
 * 页面
 */

// 关于我们及子页面
$parent_about = [
	'post_title'   => '关于我们',
	'post_name'    => 'about',
	'post_content' => file_get_contents( WIZHI_DEMO_DATA . 'data/about.html', true ),
	'post_type'    => 'page',
	'post_status'  => 'publish',
];

$child_about_about = [
	'post_title'   => '公司简介',
	'post_name'    => 'profile',
	'post_content' => file_get_contents( WIZHI_DEMO_DATA . 'data/about-about.html', true ),
	'post_type'    => 'page',
	'post_parent'  => $parent_about_id,
	'post_status'  => 'publish',
];

$child_about_culture = [
	'post_title'   => '公司文化',
	'post_name'    => 'culture',
	'post_content' => file_get_contents( WIZHI_DEMO_DATA . 'data/about-culture.html', true ),
	'post_type'    => 'page',
	'post_parent'  => $parent_about_id,
	'post_status'  => 'publish',
];

$child_about_honor = [
	'post_title'   => '资质荣誉',
	'post_name'    => 'hornor',
	'post_content' => file_get_contents( WIZHI_DEMO_DATA . 'data/about-honor.html', true ),
	'post_type'    => 'page',
	'post_parent'  => $parent_about_id,
	'post_status'  => 'publish',
];

// 添加文章数组
$add_pages_array = [
	$parent_about,
];

$add_posts_array = [

	// 文章
	$post_normal,
	$post_link,
	$post_image,
	$post_list,
	$post_quote,
	$post_table,
];

// 移除文章数组
$remove_posts_array = [
	// 文章
	$post_normal,
	$post_link,
	$post_image,
	$post_list,
	$post_quote,
	$post_table,

	$parent_about,
	$child_about_about,
	$child_about_culture,
	$child_about_honor,
];

?>

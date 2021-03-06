<?php
/**
 * 文章
 */

// 多段文章
$post_normal = [
	'post_title'   => '我们可以直接从文本文件中获取数据来进行一些测试',
	'post_name'   => 'we-can-read-content-from-files',
	'post_content' => file_get_contents( WIZHI_DEMO_DATA . 'data/post-normal.html', true ),
	'post_status'  => 'publish',
];

// 带链接的文章
$post_link = [
	'post_title'   => '谷歌专利使无人驾驶汽车安全得多，如果能普及，无人驾驶将比人类驾驶安全很多',
	'post_name'   => 'goolge-make-dirve-more-safely',
	'post_content' => file_get_contents( WIZHI_DEMO_DATA . 'data/post-link.html', true ),
	'post_status'  => 'publish',
];

// 带图片的文章
$post_image = [
	'post_title'   => '亚马逊收到了一个好消息：它的会员留存率惊人',
	'post_name'   => 'amazon-get-an-amazon-message',
	'post_content' => file_get_contents( WIZHI_DEMO_DATA . 'data/post-image.html', true ),
	'post_status'  => 'publish',
];

// 带列表的文章
$post_list = [
	'post_title'   => 'Adobe研发Win10通用应用程序，手机平板电脑都能用',
	'post_name'   => 'adobe-develop-an-universe-app',
	'post_content' => file_get_contents( WIZHI_DEMO_DATA . 'data/post-list.html', true ),
	'post_status'  => 'publish',
];

// 带引用的文章
$post_quote = [
	'post_title'   => '从多重宇宙观点解释薛定谔猫能同时同处两地',
	'post_name'   => 'explian-the-cat-of-xue-by-multi-universe',
	'post_content' => file_get_contents( WIZHI_DEMO_DATA . 'data/post-quote.html', true ),
	'post_status'  => 'publish',
];

// 带表格的文章
$post_table = [
	'post_title'   => '优步的动态定价策略是抢钱还是优化资源配置？',
	'post_name'   => 'uber-rob-money-or-opmitization-resourse-allocation',
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

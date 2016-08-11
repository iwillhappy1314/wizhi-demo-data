<?php /* 
Plugin Name: Wizhi Demo Data
Plugin URI: https://www.wpzhiku.com/
Description: 为中文 WordPress 站点提供测试数据。
Version: 1.0
Author: Amos Lee
Author URI: https://www.wpzhiku.com/
*/


define( 'WIZHI_DEMO_DATA', plugin_dir_path( __FILE__ ) );

// 添加插件菜单
add_action( 'admin_menu', 'demo_posts_menu' );
function demo_posts_menu() {
	add_submenu_page( 'tools.php', '测试数据', '测试数据', 'activate_plugins', 'wizhi-demo-data', 'demo_posts_options' );
}

// 定义插件功能页面
function demo_posts_options() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( __( '你没有权限访问这个页面' ) );
	} else {

		?>

		<div class="wrap">
			<h2 id="">添加 WordPress 测试数据</h2>

			<?php if ( $_GET[ "add_bundle" ] == true ) { ?>
				<div class="updated below-h2" id="message">
					<p>测试数据已添加</p>
				</div>
			<?php } elseif ( $_GET[ "remove_all" ] == true ) {
				; ?>
				<div class="updated below-h2" id="message">
					<p>所有测试数据已移除</p>
				</div>
			<?php }; // endif ?>

			<h3 id="">添加测试数据</h3>
			<p>目前, 我们可以添加以下几种类型的测试数据。</p>
			<ol>
				<li>多段文章</li>
				<li>带图片的文章</li>
				<li>有序列表和无序列表</li>
				<li>带引用的文章</li>
				<li>带链接的文章</li>
				<li>带有从 H1 到 H5 标题的文章</li>
			</ol>
			<a href="?page=wizhi-demo-data&amp;add_bundle=true" class="button">添加测试数据</a>
			<br><br><br>

			<h3 id="">删除测试数据</h3>
			<p>点击下面的按钮, 删除所有测试数据</p>
			<a href="?page=wizhi-demo-data&amp;remove_all=true" class="button">删除所有测试数据</a>
		</div>

		<?php

		// 添加数据
		if ( $_GET[ "add_bundle" ] == true ) {
			global $wpdb;

			// 获取所有数据,然后插入数据库
			include 'content.php';

			// 需要添加测试数据的自定义文章类型
			$post_types = [
				'post',
				'prod',
				'case',
				'corp',
				'team',
				'download',
			];

			$i = 1;

			// 插入数据到各个文章类型
			foreach ( $add_posts_array as $post ) {

				// 设置特色图像
				$file     = WIZHI_DEMO_DATA . 'data/images/' . $i . '.jpg';
				$filename = basename( $file );

				$upload_file = wp_upload_bits( $filename, null, file_get_contents( $file ) );

				if ( ! $upload_file[ 'error' ] ) {
					$wp_filetype = wp_check_filetype( $filename, null );

					$attachment = [
						'post_mime_type' => $wp_filetype[ 'type' ],
						'post_parent'    => $post_id,
						'post_title'     => preg_replace( '/\.[^.]+$/', '', $filename ),
						'post_content'   => '',
						'post_status'    => 'inherit',
					];

					$attachment_id = wp_insert_attachment( $attachment, $upload_file[ 'file' ], $post_id );

					if ( ! is_wp_error( $attachment_id ) ) {
						require_once( ABSPATH . "wp-admin" . '/includes/image.php' );
						$attachment_data = wp_generate_attachment_metadata( $attachment_id, $upload_file[ 'file' ] );
						wp_update_attachment_metadata( $attachment_id, $attachment_data );
					}
				}

				// 插入文章
				foreach ( $post_types as $post_type ) {
					$post_data = wp_parse_args( $post, [ 'post_type' => $post_type, ] );
					$post_id   = wp_insert_post( $post_data );
					set_post_thumbnail( $post_id, $attachment_id );
				}

				$i ++;

			};

			// 添加页面
			foreach ( $add_pages_array as $page ) {
				include 'content.php';
				$page_id = wp_insert_post( $page );
			};

			// 添加子页面
			$parent_about = $wpdb->get_results( "SELECT ID FROM " . $wpdb->base_prefix . "posts WHERE post_name = 'about'" );

			foreach ( $parent_about as $page_about ) {
				$parent_about_id = $page_about->ID;
				include 'content.php';
				wp_insert_post( $child_about_about );
				wp_insert_post( $child_about_culture );
				wp_insert_post( $child_about_honor );
			};

		};

		// 删除测试数据
		if ( $_GET[ "remove_all" ] == true ) {

			include 'content.php';

			foreach ( $remove_posts_array as $array ) {
				$page_name = $array[ "post_name" ];
				global $wpdb;
				$page_name_id = $wpdb->get_results( "SELECT ID FROM " . $wpdb->base_prefix . "posts WHERE post_name = '" . $page_name . "'" );
				foreach ( $page_name_id as $page_name_id ) {
					$page_name_id = $page_name_id->ID;
					wp_delete_post( $page_name_id, true );
				};
			};

		};

	}
}
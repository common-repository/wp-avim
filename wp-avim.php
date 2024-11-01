<?php
/*
Plugin Name: WP-AVIM
Plugin URI: http://onetruebrace.com/2008/12/24/wp-avim-1-cham-1/
* 
Description: This plugin quickly integrates AVIM into your blog.
Author: Quang Anh Do
Version: 1.1
Author URI: http://onetruebrace.com
*/

add_action('admin_footer', 'wpa_add_script');
add_action('wp_footer', 'wpa_add_script');
add_action('admin_menu', 'wpa_add_custom_box');
add_action('comment_form', 'wpa_options');

function wpa_add_custom_box() {
	if (function_exists('add_meta_box')) {
		add_meta_box('wpavim', 'Bộ gõ tiếng Việt AVIM', 'wpa_new_box', 'post', 'advanced');
		add_meta_box('wpavim', 'Bộ gõ tiếng Việt AVIM', 'wpa_new_box', 'page', 'advanced');
	} else {
		add_action("dbx_post_sidebar", 'wpa_old_box');
		add_action("dbx_page_sidebar", 'wpa_old_box');
	}
}


function wpa_add_script() {
    $url = get_bloginfo('wpurl').'/wp-content/plugins/wp-avim/avim.js';
	echo "<!-- Start Of Script Generated By WP-AVIM 1.1 -->";
    echo "<script type='text/javascript' src='{$url}' mce_src='{$url}'></script>";
	echo "<!-- End Of Script Generated By WP-AVIM 1.1 -->";
}

function wpa_new_box() {
?>
<ul style="list-style-type:none">
	<li><input id="him_auto" onclick="setMethod(0);" type="radio" name="viet_method">Tự động</li>
	<li><input id="him_telex" onclick="setMethod(1);" type="radio" name="viet_method">TELEX</li>
	<li><input id="him_vni" onclick="setMethod(2);" type="radio" name="viet_method">VNI</li>
	<!-- <li><input id="him_viqr" onclick="setMethod(3);" type="radio" name="viet_method">VIQR</li>
	<li><input id="him_viqr2" onclick="setMethod(4);" type="radio" name="viet_method">VIQR*</li> -->
	<li><input id="him_off" onclick="setMethod(-1);" type="radio" name="viet_method">Tắt</li>
	<li><input id="him_ckspell" onclick="setSpell(this);" type="checkbox" name="viet_method">Kiểm tra chính tả</li>
	<li><input id="him_daucu" onclick="setDauCu(this);" type="checkbox" name="viet_method">Bỏ dấu kiểu cũ</li>
</ul>
<?php
}

function wpa_old_box() {
?>
<fieldset id="customsmileysbox" class="dbx-box">
    <h3 class="dbx-handle">Bộ gõ tiếng Việt AVIM</h3>
    <div class="dbx-content">
        <ul style="list-style-type:none">
            <li><input id="him_auto" onclick="setMethod(0);" type="radio" name="viet_method">Tự động</li>
            <li><input id="him_telex" onclick="setMethod(1);" type="radio" name="viet_method">TELEX</li>
            <li><input id="him_vni" onclick="setMethod(2);" type="radio" name="viet_method">VNI</li>
            <!-- <li><input id="him_viqr" onclick="setMethod(3);" type="radio" name="viet_method">VIQR</li>
            <li><input id="him_viqr2" onclick="setMethod(4);" type="radio" name="viet_method">VIQR*</li> -->
            <li><input id="him_off" onclick="setMethod(-1);" type="radio" name="viet_method">Tắt</li>
            <li><input id="him_ckspell" onclick="setSpell(this);" type="checkbox" name="viet_method">Kiểm tra chính tả</li>
            <li><input id="him_daucu" onclick="setDauCu(this);" type="checkbox" name="viet_method">Bỏ dấu kiểu cũ</li>
        </ul>
    </div>
</fieldset>
<?php
}

function wpa_options() {
?>
<p class="wp-avim-options">
	Chọn kiểu gõ: 
    <input id="him_auto" onclick="setMethod(0);" type="radio" name="viet_method" />Tự động
    <input id="him_telex" onclick="setMethod(1);" type="radio" name="viet_method" />TELEX
    <input id="him_vni" onclick="setMethod(2);" type="radio" name="viet_method" />VNI
    <!-- <input id="him_viqr" onclick="setMethod(3);" type="radio" name="viet_method" />VIQR
    <input id="him_viqr2" onclick="setMethod(4);" type="radio" name="viet_method" />VIQR* -->
    <input id="him_off" onclick="setMethod(-1);" type="radio" name="viet_method" />Tắt
    <!-- <input id="him_ckspell" onclick="setSpell(this);" type="checkbox" name="viet_method" />Kiểm tra chính tả
    <input id="him_daucu" onclick="setDauCu(this);" type="checkbox" name="viet_method" />Bỏ dấu kiểu cũ -->
</p>
<?php
}

function wpa_print_options() {
	// deprecated
	// do nothing
}

?>
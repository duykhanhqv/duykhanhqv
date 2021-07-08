<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define( 'DB_NAME', 'khanhmoc_wordpress' );

/** Username của database */
define( 'DB_USER', 'root' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', '' );

/** Hostname của database */
define( 'DB_HOST', 'localhost' );

/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '_a%@mfOO,C$b|gh+1-vlo#<_G9fgE e(c_j?9lxE&RDUFOrvT9hcM:8NGN3N-8uC' );
define( 'SECURE_AUTH_KEY',  '#7MeI^UI~:cZbMCi0b.4jQhz^iZ^3Zf(6.Wy;DJV1j4e>WX=OrA*p`]4o*9ei5o7' );
define( 'LOGGED_IN_KEY',    'B<.5!|i3lo^brY<YI0k]ScUG!-Vyt|VhHi)QwQK@i,qM$zf`F|^%hkAiMH:o<UI?' );
define( 'NONCE_KEY',        'E03TN=h=CZ=0crBj50j/3cOi.*PwM]2U@0oamtXpC?k6~TyRJmT|H67p8?NqY}%D' );
define( 'AUTH_SALT',        'F5dR+RA5BpR$I[)P~6+M4Y!s4)+aS-7k,<h5B?aK~wG:x&DX6ABd;8(FSlnCYEy5' );
define( 'SECURE_AUTH_SALT', '*7l<g<<hC^: )<tzDKuj[KwHU02hxQmt}.^*w6_@*Z^h6|Cs,MAEP&yq8d}s)ApG' );
define( 'LOGGED_IN_SALT',   'h?}]h=T2kb3+qqhv8XW*g/b^Sw&`R^cJFkY8LT{-EZ,RS0rRpc.;m@|I)YW,_%9|' );
define( 'NONCE_SALT',       'LIffOhR3~iFyD*}T*(<1)H.yHqBSGU=&%Rs$D]hYiXb#D3@W,ngCzQE,>&-O~9v6' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');

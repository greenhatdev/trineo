<?php
# Database Configuration
define( 'DB_NAME', 'trineo' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', 'root' );
define( 'DB_HOST', 'localhost' );
define( 'DB_HOST_SLAVE', '127.0.0.1' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
define('DB_COLLATE', '');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         'Y $^.<x4:7ISy>.YcdVT%E1Orx)#;wyQOM>x$~l4-1,!F-5z][I;wb*cR4j-+CXU');
define('SECURE_AUTH_KEY',  'RT.TTMzwkyX1 ];8_]NeO2tCUdT n3xZ? ~]+gzx}2NeDfh#wo9YobC(B0=l,|%=');
define('LOGGED_IN_KEY',    'pn3-<hkL~YiA)]NQ+T/}O>J#f*se<l^YQS8f&l*lPM5LdX;fpH.+Ccu`(#YfYe+=');
define('NONCE_KEY',        '0LNQ]0YKul&rwc^::[gYZMf$}kd5!f}G# n2_~,Ath7U9ju.R}j+|qNN$etZ|1^`');
define('AUTH_SALT',        'D0e*X=_D(Z@:k$3qtYB1TuSRWU)Xi#^jW;-e]IF/n_<|vR7X5:VRD.Mi.sZGgC94');
define('SECURE_AUTH_SALT', '.fkO-&09k9J.CEx9i(L+M%di*<tmyOvgYcKBWcJ8y-b$!>g}s ~E1IQEhxM]ez?2');
define('LOGGED_IN_SALT',   'S|N-8_0zsU1Um3S5^Gj;I!n1-]<y5i|NGwDbgHS+)#w~C1v-r- ciQXywy+Pe_h,');
define('NONCE_SALT',       'w+,$^7$7|[oN>?d|zr_Zr(54fr+s->UL-|R>gW1wK.cr4MQIz3vIFUN3zIT0RACC');









# That's It. Pencils down
if ( !defined('ABSPATH') )
    define('ABSPATH', __DIR__ . '/');
require_once(ABSPATH . 'wp-settings.php');















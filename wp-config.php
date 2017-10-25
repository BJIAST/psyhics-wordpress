<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'mydb');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '+L0j_+zn5Q)U<`V?BJd#bCxp}7hO&%G?rAp[^~.fR5bi*,S{O4qBH-D.do3Q87ex');
define('SECURE_AUTH_KEY',  'Q`tOD%@d+:XhJJ*~>I:;/[fp }dK/D4Yh^Qb.G4K3g`_;Q7OSxs9WFMi-=+(F~KN');
define('LOGGED_IN_KEY',    '=@0fu;,1.xu.$4swmL?/v@w^XwQ#]uR E8AlYhKD{gg))ne)yrt0KCwKb-Z9<JrB');
define('NONCE_KEY',        'k^z?^Q^#cVrGo6v3D(cQqha=@FEdFaMsVX8atD/d!0DH|ss[lpr%Gpjd;]&Fln6}');
define('AUTH_SALT',        '%R;>,G`D42D}{p$Du.Cxvox(!*zvY{;WvnD6X+[QShl-.=Zl(,1{fI.yWL],n z3');
define('SECURE_AUTH_SALT', '[Y&-{_NwJ0],(pP,1)/,hJVHt/in#I=QV<p()Tt[a1~R@FR<zOyJ3[8+=(0G)OER');
define('LOGGED_IN_SALT',   'u]ji+zk0F&~%$:X$FRZ$CD42DM;#%:[.7i~Bg1X*NBb+nEF-ko7c~p7IzIE&wDPI');
define('NONCE_SALT',       '3/d%3:3GH_)VbF#ZS|i5M`9DS[(ryYR@(4F?{o?e,*~G^By(0-i*vVx;bC!lqQla');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

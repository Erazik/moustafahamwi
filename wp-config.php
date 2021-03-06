<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'PIeXUcu0pO');

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
define('AUTH_KEY',         'Z6}>|h!4+&~01*4WYXel|k@bPM+;bCe!w$FC21la[~)_o&!#|.DXbbSUo?8`d>6n');
define('SECURE_AUTH_KEY',  '@gs;;];E9;PW:1ps^FD*KfUy2&z9aOLqj?|8~~{*}aZO]x*E$nn1^/<AG/!-,dG0');
define('LOGGED_IN_KEY',    'b)4:17RR|0uCCG$E/_O2GwQEli()(4|.xF< W#wuH=!OO~5n|dGTub@r{#3t%O`E');
define('NONCE_KEY',        'ead$Y.L:5+3+,Na/s<CNQru0:jI5#s.u=p!.5RN.*nnv|NN<P(gPQmK)^!q$bF`7');
define('AUTH_SALT',        'T<]~qFEDc;uXlbVC-}%&B^PndR+>dE3yp-+2^#,%TM-;!^J/$jMJ~N+E!Wnqn9-3');
define('SECURE_AUTH_SALT', '0e=z8-DBR/QWqF}Ms4expl6h# lojuQwGL_o~y%c1%4 nXc(?{ifo1.YBgG|!/NQ');
define('LOGGED_IN_SALT',   'U8O{-=Y@{Q`+[|e4Nn#|#zg$[IN-+I4+BMv:D.y+y=1,>3+MpLFRjL[Qs$F0SWPB');
define('NONCE_SALT',       'QCod5L8GOADK2th{2+d:Tw.jNrNClpJ42v_a*N#2S(|j^tu LJGZl54;5Drs$kSq');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

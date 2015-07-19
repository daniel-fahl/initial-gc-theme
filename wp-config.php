<?php
/**
 * In dieser Datei werden die Grundeinstellungen für WordPress vorgenommen.
 *
 * Zu diesen Einstellungen gehören: MySQL-Zugangsdaten, Tabellenpräfix,
 * Secret-Keys, Sprache und ABSPATH. Mehr Informationen zur wp-config.php gibt es
 * auf der {@link https://codex.wordpress.org/Editing_wp-config.php wp-config.php editieren}
 * Seite im Codex. Die Informationen für die MySQL-Datenbank bekommst du von deinem Webhoster.
 *
 * Diese Datei wird von der wp-config.php-Erzeugungsroutine verwendet. Sie wird ausgeführt,
 * wenn noch keine wp-config.php (aber eine wp-config-sample.php) vorhanden ist,
 * und die Installationsroutine (/wp-admin/install.php) aufgerufen wird.
 * Man kann aber auch diese Datei nach "wp-config.php" kopieren, alle fehlenden Werte
 * ergänzen und die Installation anschließend starten.
 *
 * @package WordPress
 */

// ** MySQL Einstellungen - diese Angaben bekommst du von deinem Webhoster. ** //
/** Ersetze database_name_here mit dem Namen der Datenbank, die du verwenden möchtest. */
define('DB_NAME', 'usr_p228414_1');

/** Ersetze username_here mit deinem MySQL-Datenbank-Benutzernamen */
define('DB_USER', 'p228414');

/** Ersetze password_here mit deinem MySQL-Passwort */
define('DB_PASSWORD', 'VC8uQjgY');

/** Ersetze localhost mit der MySQL-Serveradresse */
define('DB_HOST', 'db1154.mydbserver.com');

/** Der Datenbankzeichensatz der beim Erstellen der Datenbanktabellen verwendet werden soll */
define('DB_CHARSET', 'utf8');

/** Der collate type sollte nicht geändert werden */
define('DB_COLLATE', 'utf8_general_ci');

/**#@+
 * Sicherheitsschlüssel
 *
 * Ändere jeden KEY in eine beliebige, möglichst einzigartige Phrase.
 * Auf der Seite {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * kannst du dir alle KEYS generieren lassen.
 * Bitte trage für jeden KEY eine eigene Phrase ein. Du kannst die Schlüssel jederzeit wieder ändern,
 * alle angemeldeten Benutzer müssen sich danach erneut anmelden.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ZSaVNaaqtgcbvIR+Ol8GvNYbCIs/VyXQ');
define('SECURE_AUTH_KEY',  '2ZHwYHY+pxwevpzszAGKUGCHRuF7Uv1j');
define('LOGGED_IN_KEY',    'UpBt3zkTGBwye29V5DcPEqeq531jMyC8');
define('NONCE_KEY',        'eiSqHFqV0u3lzk68cjv1RVL3+mCEPx96');
define('AUTH_SALT',        'w7UeQildsYVWDVn0QdP5FLOcI6wcZXRD');
define('SECURE_AUTH_SALT', 'Oc5DKAEkRsA8z7PgOVtHPEjlMKpxMXIz');
define('LOGGED_IN_SALT',   'PsxDNn57NB1mxW9MaXA+0Emb8prkeEUf');
define('NONCE_SALT',       'U8Zx8na8HMGDoWlyY8cpMSTrwJd2Lbc/');

/**#@-*/

/**
 * WordPress Datenbanktabellen-Präfix
 *
 * Wenn du verschiedene Präfixe benutzt, kannst du innerhalb einer Datenbank
 * verschiedene WordPress-Installationen betreiben. Nur Zahlen, Buchstaben und Unterstriche bitte!
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

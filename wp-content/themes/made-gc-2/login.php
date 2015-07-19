<?php
/**
 * Everything pulled from wp-login.php.
 * Version 2.8.1
 * Template Name: Login
 */
 
/** Make sure that the WordPress bootstrap has run before continuing. */
require( 'wp-load.php' );

// Redirect to https login if forced to use SSL
if ( force_ssl_admin() && !is_ssl() ) {
	if ( 0 === strpos($_SERVER['REQUEST_URI'], 'http') ) {
		wp_redirect(preg_replace('|^http://|', 'https://', $_SERVER['REQUEST_URI']));
		exit();
	} else {
		wp_redirect('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
		exit();
	}
}
function login_header($title = 'Log In', $message = '', $wp_error = '') {
	global $error, $is_iphone;

	// Don't index any of these forms
	add_filter( 'pre_option_blog_public', create_function( '$a', 'return 0;' ) );
	add_action( 'login_head', 'noindex' );
	
	
	get_header();
	
	
	if ( empty($wp_error) )
		$wp_error = new WP_Error();

	do_action('login_head'); ?>
	
<div class="hide-responsive"><?php oswc_get_template_part('sharebox'); // show the sharebox ?></div>  

<div class="main-content">

    <div class="page-content normal-margin">
        
        <div class="content-panel">


<?php
	$message = apply_filters('login_message', $message);
	if ( !empty( $message ) ) echo $message . "\n";

	// Incase a plugin uses $error rather than the $errors object
	if ( !empty( $error ) ) {
		$wp_error->add('error', $error);
		unset($error);
	}

	if ( $wp_error->get_error_code() ) {
		$errors = '';
		$messages = '';
		foreach ( $wp_error->get_error_codes() as $code ) {
			$severity = $wp_error->get_error_data($code);
			foreach ( $wp_error->get_error_messages($code) as $error ) {
				if ( 'message' == $severity )
					$messages .= '	' . $error . "<br />\n";
				else
					$errors .= '	' . $error . "<br />\n";
			}
		}
		if ( !empty($errors) )
			echo '<div id="login_error">' . apply_filters('login_errors', $errors) . "</div>\n";
		if ( !empty($messages) )
			echo '<p class="message">' . apply_filters('login_messages', $messages) . "</p>\n";
	}
} // End of login_header()

/**
 * Handles sending password retrieval email to user.
 *
 * @uses $wpdb WordPress Database object
 *
 * @return bool|WP_Error True: when finish. WP_Error on error
 */
function retrieve_password() {
	global $wpdb;

	$errors = new WP_Error();

	if ( empty( $_POST['user_login'] ) && empty( $_POST['user_email'] ) )
		$errors->add('empty_username', __('<strong>ERROR</strong>: Enter a username or e-mail address.'));

	if ( strpos($_POST['user_login'], '@') ) {
		$user_data = get_user_by_email(trim($_POST['user_login']));
		if ( empty($user_data) )
			$errors->add('invalid_email', __('<strong>ERROR</strong>: There is no user registered with that email address.'));
	} else {
		$login = trim($_POST['user_login']);
		$user_data = get_userdatabylogin($login);
	}

	do_action('lostpassword_post');

	if ( $errors->get_error_code() )
		return $errors;

	if ( !$user_data ) {
		$errors->add('invalidcombo', __('<strong>ERROR</strong>: Invalid username or e-mail.'));
		return $errors;
	}

	// redefining user_login ensures we return the right case in the email
	$user_login = $user_data->user_login;
	$user_email = $user_data->user_email;

	do_action('retrieve_password', $user_login);

	$allow = apply_filters('allow_password_reset', true, $user_data->ID);

	if ( ! $allow )
		return new WP_Error('no_password_reset', __('Password reset is not allowed for this user'));
	else if ( is_wp_error($allow) )
		return $allow;

	$key = $wpdb->get_var($wpdb->prepare("SELECT user_activation_key FROM $wpdb->users WHERE user_login = %s", $user_login));
	if ( empty($key) ) {
		// Generate something random for a key...
		$key = wp_generate_password(20, false);
		do_action('retrieve_password_key', $user_login, $key);
		// Now insert the new md5 key into the db
		$wpdb->update($wpdb->users, array('user_activation_key' => $key), array('user_login' => $user_login));
	}

	$message  = __('Did you forget your member password for Second Site?') . "\r\n\r\n";
	$message .= __('If you did, proceed with a password reset by visiting the following address.') . "\r\n";
	$message .= site_url("member/login?action=rp&key=$key", 'login') . "\r\n\r\n";
	$message .= __('If not, just ignore this email and nothing will happen.') . "\r\n\r\n";
	$message .= __('See you soon,') . "\r\n";
	$message .= __('The Second Site Team') . "\r\n";
	$message .= get_option('siteurl') . "\r\n\r\n";

	$title = sprintf(__('%s - Password Reset?'), get_option('blogname'));

	$title = apply_filters('retrieve_password_title', $title);
	$message = apply_filters('retrieve_password_message', $message, $key);

	if ( $message && !wp_mail($user_email, $title, $message) )
		die('<p>' . __('The e-mail could not be sent.') . "<br />\n" . __('Possible reason: your host may have disabled the mail() function...') . '</p>');

	return true;
}

/**
 * Handles resetting the user's password.
 *
 * @uses $wpdb WordPress Database object
 *
 * @param string $key Hash to validate sending user's password
 * @return bool|WP_Error
 */
function reset_password($key) {
	global $wpdb;

	$key = preg_replace('/[^a-z0-9]/i', '', $key);

	if ( empty( $key ) || is_array( $key ) )
		return new WP_Error('invalid_key', __('Invalid key'));

	$user = $wpdb->get_row($wpdb->prepare("SELECT * FROM $wpdb->users WHERE user_activation_key = %s", $key));
	if ( empty( $user ) )
		return new WP_Error('invalid_key', __('Invalid key'));

	// Generate something random for a password...
	$new_pass = wp_generate_password();

	do_action('password_reset', $user, $new_pass);

	wp_set_password($new_pass, $user->ID);
	update_usermeta($user->ID, 'default_password_nag', true); //Set up the Password change nag.

	$message  = __('Looks like you did lose your password. Not to worry. We have taken care of resetting it for you.') . "\r\n\r\n";
	$message .= sprintf(__('Username: %s'), $user->user_login) . "\r\n";
	$message .= sprintf(__('New Password: %s'), $new_pass) . "\r\n\r\n";
	$message .= __('Be sure to make note of this new password; you can’t participate without it. Then, once you are logged in, you can select your own new password by visiting your profile page.') . "\r\n\r\n"; 
	//$message .= __('Click this link to return to the login page: ') .site_url('/member/login', 'login') . "\r\n\r\n";
	$message .= __('See you soon,') . "\r\n";
	$message .= __('The Second Site Team') . "\r\n";
	$message .= get_option('siteurl') . "\r\n\r\n";
	$title = sprintf(__('%s - Your new password'), get_option('blogname'));

	$title = apply_filters('password_reset_title', $title);
	$message = apply_filters('password_reset_message', $message, $new_pass);

	if ( $message && !wp_mail($user->user_email, $title, $message) )
  		die('<p>' . __('The e-mail could not be sent.') . "<br />\n" . __('Possible reason: your host may have disabled the mail() function...') . '</p>');

	wp_password_change_notification($user);

	return true;
}

/**
 * Handles registering a new user.
 *
 * @param string $user_login User's username for logging in
 * @param string $user_email User's email address to send password and add
 * @return int|WP_Error Either user's ID or error on failure.
 */
function register_new_user($user_login, $user_email) {
	$errors = new WP_Error();

	$user_login = sanitize_user( $user_login );
	$user_email = apply_filters( 'user_registration_email', $user_email );

	// Check the username
	if ( $user_login == '' )
		$errors->add('empty_username', __('<strong>ERROR</strong>: Please enter a username.'));
	elseif ( !validate_username( $user_login ) ) {
		$errors->add('invalid_username', __('<strong>ERROR</strong>: This username is invalid.  Please enter a valid username.'));
		$user_login = '';
	} elseif ( username_exists( $user_login ) )
		$errors->add('username_exists', __('<strong>ERROR</strong>: This username is already registered, please choose another one.'));

	// Check the e-mail address
	if ($user_email == '') {
		$errors->add('empty_email', __('<strong>ERROR</strong>: Please type your e-mail address.'));
	} elseif ( !is_email( $user_email ) ) {
		$errors->add('invalid_email', __('<strong>ERROR</strong>: The email address isn&#8217;t correct.'));
		$user_email = '';
	} elseif ( email_exists( $user_email ) )
		$errors->add('email_exists', __('<strong>ERROR</strong>: This email is already registered, please choose another one.'));

	do_action('register_post', $user_login, $user_email, $errors);

	$errors = apply_filters( 'registration_errors', $errors );

	if ( $errors->get_error_code() )
		return $errors;

	$user_pass = wp_generate_password();
	$user_id = wp_create_user( $user_login, $user_pass, $user_email );
	if ( !$user_id ) {
		$errors->add('registerfail', sprintf(__('<strong>ERROR</strong>: Couldn&#8217;t register you... please contact the <a href="mailto:%s">webmaster</a> !'), get_option('admin_email')));
		return $errors;
	}

	//sp_new_user_notification($user_id, $user_pass);

	return $user_id;
}

//
// Main
//

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'login';
$errors = new WP_Error();

if ( isset($_GET['key']) )
	$action = 'resetpass';

// validate action so as to default to the login screen
if ( !in_array($action, array('logout', 'lostpassword', 'retrievepassword', 'resetpass', 'rp', 'register', 'login')) && false === has_filter('login_form_' . $action) )
	$action = 'login';

nocache_headers();

header('Content-Type: '.get_bloginfo('html_type').'; charset='.get_bloginfo('charset'));

if ( defined('RELOCATE') ) { // Move flag is set
	if ( isset( $_SERVER['PATH_INFO'] ) && ($_SERVER['PATH_INFO'] != $_SERVER['PHP_SELF']) )
		$_SERVER['PHP_SELF'] = str_replace( $_SERVER['PATH_INFO'], '', $_SERVER['PHP_SELF'] );

	$schema = ( isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on' ) ? 'https://' : 'http://';
	if ( dirname($schema . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']) != get_option('siteurl') )
		update_option('siteurl', dirname($schema . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']) );
}

//Set a cookie now to see if they are supported by the browser.
setcookie(TEST_COOKIE, 'WP Cookie check', 0, COOKIEPATH, COOKIE_DOMAIN);
if ( SITECOOKIEPATH != COOKIEPATH )
	setcookie(TEST_COOKIE, 'WP Cookie check', 0, SITECOOKIEPATH, COOKIE_DOMAIN);

// allow plugins to override the default actions, and to add extra actions if they want
do_action('login_form_' . $action);

$http_post = ('POST' == $_SERVER['REQUEST_METHOD']);
switch ($action) {

case 'logout' :
	check_admin_referer('log-out');
	wp_logout();

	$redirect_to = '/login?loggedout=true';
	if ( isset( $_REQUEST['redirect_to'] ) )
		$redirect_to = $_REQUEST['redirect_to'];

	wp_safe_redirect($redirect_to);
	exit();

break;

case 'lostpassword' :
case 'retrievepassword' :
	if ( $http_post ) {
		$errors = retrieve_password();
		if ( !is_wp_error($errors) ) {
			wp_redirect('/login?checkemail=confirm');
			exit();
		}
	}

	if ( isset($_GET['error']) && 'invalidkey' == $_GET['error'] ) $errors->add('invalidkey', __('Sorry, that key does not appear to be valid.'));

	do_action('lost_password');
		login_header(__('Lost Password'), '
			<div id="sub_header" class="clearfix">
				<h2 class="pagetitle">
					Reset Your Password
				</h2>
			</div>', $errors);

	$user_login = isset($_POST['user_login']) ? stripslashes($_POST['user_login']) : '';

?>

	<div id="login_page">	
		<div id="password-recovery" class="login-form clearfix">
			<p class="login-subtitle">Please enter the e-mail address or username you used to sign-up. Your password will be sent to the corresponding address.</p>
			<form name="lostpasswordform" id="lostpasswordform" action="<?php echo site_url('/login?action=lostpassword', 'login_post') ?>" method="post">
					
					<span class="recover_field clearfix">
						<input tabindex="21" type="text" name="user_login" id="user_login" class="input" value="<?php echo esc_attr($user_login); ?>" size="20" />
						<?php do_action('lostpassword_form'); ?>
					</span>
					<div class="login_submit">
						<input tabindex="22" type="submit" name="wp-submit" id="wp-submit" class="login alt button" value="<?php esc_attr_e('Send my password'); ?>" tabindex="100" />
					</div>
			</form>
		</div>
	</div>
	</div>
</div>

<script type="text/javascript">
try{document.getElementById('user_login').focus();}catch(e){}
</script>

<?php
break;

case 'resetpass' :
case 'rp' :
	$errors = reset_password($_GET['key']);

	if ( ! is_wp_error($errors) ) {
		wp_redirect('/login?checkemail=newpass');
		exit();
	}

	wp_redirect('/login?action=lostpassword&error=invalidkey');
	exit();

break;

case 'register' :
	if ( !get_option('users_can_register') ) {
		wp_redirect('/login?registration=disabled');
		exit();
	}

	$user_login = '';
	$user_email = '';
	if ( $http_post ) {
		require_once( ABSPATH . WPINC . '/registration.php');

		$user_login = $_POST['user_login'];
		$user_email = $_POST['user_email'];
		$errors = register_new_user($user_login, $user_email);
		if ( !is_wp_error($errors) ) {
			wp_redirect('/login');
			// MOD
			//wp_redirect('/member/login?checkemail=registered');
			exit();
		}
	}

	login_header(__('Registration Form'), '
	<div class="utility-header clearfix">
		<h2>Register for Second Site</h2>
	</div>'
	, $errors);
?>

			<div id="login-page-register" class="login-form clearfix">
				<form class="registerform" name="registerform" id="registerform" action="<?php echo site_url('/login?action=register', 'login_post') ?>" method="post" class="clearfix">

					<span class="field clearfix">
						<label><?php _e('Username') ?>:<span>Your real name or nickname. <br/>Important: this is permanent.</span></label>
						<input tabindex="11" type="text" name="user_login" id="user_login" class="input" value="<?php echo attribute_escape(stripslashes($user_login)); ?>" size="20" />
					</span>
					<span class="field clearfix">
						<label for="user_email" id="user_email"><?php _e('E-mail') ?>:<span>We'll send the activation email here.</span></label>
						<input tabindex="12" type="text" name="user_email" id="user_email" class="input" value="<?php echo attribute_escape(stripslashes($user_email)); ?>" size="25" />
					</span>
					<?php do_action('register_form'); ?>
					
					<input tabindex="13" type="submit" name="wp-submit" id="wp-submit" value="Register"  class="login alt button" />

				</form>
				<p class="login-footer sub">Already registered? <a href="<?php echo get_option('home'); ?>/login" title="Login">Login</a>.</p>
			</div>

	</div>
</div>
<script type="text/javascript">
try{document.getElementById('user_login').focus();}catch(e){}
</script>


<?php
break;

case 'login' :
default:
	$secure_cookie = '';

	// If the user wants ssl but the session is not ssl, force a secure cookie.
	if ( !empty($_POST['log']) && !force_ssl_admin() ) {
		$user_name = sanitize_user($_POST['log']);
		if ( $user = get_userdatabylogin($user_name) ) {
			if ( get_user_option('use_ssl', $user->ID) ) {
				$secure_cookie = true;
				force_ssl_admin(true);
			}
		}
	}

	if ( isset( $_REQUEST['redirect_to'] ) ) {
		$redirect_to = $_REQUEST['redirect_to'];
		// Redirect to https if user wants ssl
		if ( $secure_cookie && false !== strpos($redirect_to, 'members/') )
			$redirect_to = preg_replace('|^http://|', 'https://', $redirect_to);
	} else {
		$redirect_to = admin_url();
	}

	if ( !$secure_cookie && is_ssl() && force_ssl_login() && !force_ssl_admin() && ( 0 !== strpos($redirect_to, 'https') ) && ( 0 === strpos($redirect_to, 'http') ) )
		$secure_cookie = false;

	$user = wp_signon('', $secure_cookie);

	$redirect_to = apply_filters('login_redirect', $redirect_to, isset( $_REQUEST['redirect_to'] ) ? $_REQUEST['redirect_to'] : '', $user);

	if ( !is_wp_error($user) ) {
		// If the user can't edit posts, send them to their profile.
		if ( !$user->has_cap('edit_posts') && ( empty( $redirect_to ) || $redirect_to == 'members/' || $redirect_to == admin_url() ) )
		$redirect_to = admin_url('members/');
		wp_safe_redirect($redirect_to);
		exit();
	}

	$errors = $user;
	// Clear errors if loggedout is set.
	if ( !empty($_GET['loggedout']) )
		$errors = new WP_Error();

	// If cookies are disabled we can't log in even with a valid user+pass
	if ( isset($_POST['testcookie']) && empty($_COOKIE[TEST_COOKIE]) )
		$errors->add('test_cookie', __("<strong>ERROR</strong>: Cookies are blocked or not supported by your browser. You must <a href='http://www.google.com/cookies.html'>enable cookies</a> to use WordPress."));

	// Some parts of this script use the main login form to display a message
	if		( isset($_GET['loggedout']) && TRUE == $_GET['loggedout'] )			$errors->add('loggedout', __('You are now logged out.'), 'message');
	elseif	( isset($_GET['registration']) && 'disabled' == $_GET['registration'] )	$errors->add('registerdisabled', __('Uh Oh! Registrations are currently not allowed.'));
	elseif	( isset($_GET['checkemail']) && 'confirm' == $_GET['checkemail'] )	$errors->add('confirm', __('<strong>Forgotten Password:</strong> Check your e-mail for the confirmation link.'), 'message');
	elseif	( isset($_GET['checkemail']) && 'newpass' == $_GET['checkemail'] )	$errors->add('newpass', __('<strong>Forgotten Password:</strong> Your new password has been sent to your email member.'), 'message');
	elseif	( isset($_GET['checkemail']) && 'registered' == $_GET['checkemail'] )	$errors->add('registered', __('
	
	<strong>Registration complete.</strong>')
	
	, 'message');

	if ( !in_array( $_GET['checkemail'], array('registered') ) ) :
		login_header(__('Log In'), '	
			<div id="sub_header" class="clearfix">
				<h1 class="pagetitle">
					Login to Gamechurch
				</h1>
			</div>
			', $errors);
	endif;

	if ( isset($_POST['log']) )
		$user_login = ( 'incorrect_password' == $errors->get_error_code() || 'empty_password' == $errors->get_error_code() ) ? esc_attr(stripslashes($_POST['log'])) : '';
?>

<?php if ( isset($_GET['checkemail']) && 'registered' == $_GET['checkemail'] ) : 
	
	login_header(__('Log In'), '	
		<div class="utility-header clearfix">
			<h2>Almost done</h2>
		</div>
	');
			
?>
			<div id="login-page-login" class="login-form-2 clearfix">
				<p class="login-subtitle almost-done">We just sent an activation email. It might take a while to arrive&mdash;please be patent. Once it arrives, use the information to <a href="login">login</a> to your brand new member.</p>
				<p class="login-reached almost-done">Email hasn’t reached you? No worries&mdash;<a href="<?php echo get_option('home'); ?>/about/contact-us/" title="Contact Support">contact support</a>.</p>
			</div>
			
<?php else : ?>

		<div id="login_page">
			<div id="login-page-login" class="login-form clearfix">
				<p class="login-subtitle">You can login with either your email or your display name</p>
				<form action="<?php echo get_option('home'); ?>/login" method="post" class="clearfix">
					<span class="field clearfix">
					<label>Username:</label><br>
						<input tabindex="11" type="text" name="log" id="log" class="login-input" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" size="20" />
					</span>
					<span class="field clearfix">
						<label>Password:</label><br>
						<input tabindex="12" type="password" name="pwd" id="pwd" size="20" class="login-input" />
					</span>
					<div class="login_submit">
						<input type="submit" name="submit" value="Login" class="login alt button" />
						<span id="remember-me">
							<label for="rememberme"><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> keep me signed in</label>
							<?php 
							if( empty( $_GET[ 'redirect' ] ) ) {
								$redirectUrl = site_url( '/' );
							} else {
								$redirectUrl = site_url( '/' );
							}
							?>
							<input type="hidden" name="redirect_to" value="<?php echo $redirectUrl; ?>" />
						</span>
					</div>	
				</form>
			</div>
		</div>	
		


<?php endif; ?>


<script type="text/javascript">
<?php if ( $user_login ) { ?>
setTimeout( function(){ try{
d = document.getElementById('user_pass');
d.value = '';
d.focus();
} catch(e){}
}, 200);
<?php } else { ?>
try{document.getElementById('user_login').focus();}catch(e){}
<?php } ?>
</script>

<?php

break;
} // end action switch
?>

</div><!-- #content -->
</div>
</div>



<?php get_footer(); ?>
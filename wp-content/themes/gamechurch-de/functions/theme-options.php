<?php  

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' ); 

function theme_options_init(){
 register_setting( 'sample_options', 'sample_theme_options');
} 

function theme_options_add_page() {
 add_theme_page( __( 'Theme Options', 'Gamechurch' ), __( 'Theme Options', 'Gamechurch' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}  

function theme_options_do_page() { global $select_options; if ( ! isset( $_REQUEST['settings-updated'] ) ) $_REQUEST['settings-updated'] = false; ?>

	<div>
	
		<?php screen_icon(); echo "<h1>". __( 'Custom Theme Options', 'customtheme' ) . "</h1>"; ?>
		
	</div>	
	
	<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
	<div>
	<p><strong><?php _e( 'Options saved', 'customtheme' ); ?></strong></p></div>
	<?php endif; ?> 
	
	<form method="post" action="options.php">
	<?php settings_fields( 'sample_options' ); ?>  
	
	<?php $options = get_option( 'sample_theme_options' ); ?>
	
	<h3>Theme Week</h3>
	
	<table>
	
		<tr valign="top">
			<th scope="row" align="left">
				<?php _e( 'Display Graphic?', 'customtheme' ); ?>
			</th>
			<td>
				<input id="sample_theme_options[dispimg]" name="sample_theme_options[dispimg]" type="checkbox" value="1" <?php checked( '1', $options['dispimg'] ); ?>>
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row" align="left">
				<?php _e( 'Image URL', 'customtheme' ); ?>
			</th>
			<td>
				<input id="sample_theme_options[twurl]" type="text" name="sample_theme_options[twurl]" value="<?php esc_attr_e( $options['twurl'] ); ?>" />
			</td>
		</tr> 
		
	</table>
	
	<p>
	<input type="submit" value="<?php _e( 'Save Options', 'customtheme' ); ?>" />
	</p>
	</form>
	</div>	
		
		
		
<?php } ?>
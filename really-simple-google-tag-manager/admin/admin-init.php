<?php
namespace RealySimleGoogleTag\Admin;

if( ! defined( 'ABSPATH' ) ) exit(); // Exit if accessed directly

/**
 * Input Opiton for Google Tag Manager Container ID.
*/
class Simple_Googletag_Admin_Setting{
	
	function __construct(){
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'admin_init', array( $this, 'admin_init' ) );
		add_action('init', array( $this, 'plugin_recommendations' ) );
	}

	function admin_menu() {
        add_menu_page(
			__('Google Tag Manager','simple-googletag'), 
			__('Google Tag Manager','simple-googletag'),
			'manage_options',
			'simple-googletag-setting-page',
			array( $this, 'plugin_page' ),
			SIMPLE_GOOGLE_TAG_URL.'admin/assets/images/s-penrose-square.png',
			66
		);
	}

	/**
     * [plugin_recommendations]
     * @return [void]
     */
    public function plugin_recommendations(){

        $get_instance = Recommended_Plugins::instance( 
            array( 
                'text_domain'       => 'simple-googletag', 
                'parent_menu_slug'  => 'simple-googletag-setting-page', 
                'menu_capability'   => 'manage_options', 
                'menu_page_slug'    => 'simple-tag-recommendations',
                'priority'          => 24,
                'assets_url'        => SIMPLE_GOOGLE_TAG_URL.'admin/assets',
                'hook_suffix'       => 'google-tag-manager_page_simple-tag-recommendations'
            )
        );

        // ShopLentor is a WooCommerce plugin — only worth featuring in the
        // primary "Recommended Plugins" tab when WooCommerce is actually
        // active; otherwise it stays discoverable under the "WooCommerce" tab.
        $woocommerce_active = class_exists( 'WooCommerce' );
        $shoplentor_entry   = array(
            'slug'      => 'woolentor-addons',
            'location'  => 'woolentor_addons_elementor.php',
            'name'      => esc_html__( 'ShopLentor – All-in-One WooCommerce Growth & Store Enhancement Plugin', 'simple-googletag' )
        );

        $get_instance->add_new_tab( array(

        'title' => esc_html__( 'Recommended Plugins', 'simple-googletag' ),
        'active' => true,
        'plugins' => array_merge(
            $woocommerce_active ? array( $shoplentor_entry ) : array(),
            array(
                array(
                    'slug'      => 'support-genix-lite',
                    'location'  => 'support-genix-lite.php',
                    'name'      => esc_html__( 'Support Genix – Helpdesk, AI Chatbot, Knowledge Base & Customer Support Ticketing System', 'simple-googletag' )
                ),
                array(
                    'slug'      => 'hashbar-wp-notification-bar',
                    'location'  => 'init.php',
                    'name'      => esc_html__( 'HashBar – Announcement, Notification Bar & Popup Campaign', 'simple-googletag' )
                ),
                array(
                    'slug'      => 'wp-plugin-manager',
                    'location'  => 'plugin-main.php',
                    'name'      => esc_html__( 'WP Plugin Manager – Deactivate plugins per page', 'simple-googletag' )
                ),
                array(
                    'slug'      => 'ht-contactform',
                    'location'  => 'contact-form-widget-elementor.php',
                    'name'      => esc_html__( 'HT Contact Form – Drag & Drop Form Builder for WordPress', 'simple-googletag' )
                ),
                array(
                    'slug'      => 'cookieray',
                    'location'  => 'cookieray.php',
                    'name'      => esc_html__( 'CookieRay – Cookie Banner for Cookie Consent (GDPR/CCPA Compliant)', 'simple-googletag' )
                ),
                array(
                    'slug'      => 'kelune-crm',
                    'location'  => 'kelune-crm.php',
                    'name'      => esc_html__( 'Kelune CRM – Contact Management, Email Marketing, Newsletter & Marketing Automation', 'simple-googletag' )
                ),
            )
        )

    ) );

    $get_instance->add_new_tab( array(
        'title' => esc_html__( 'WooCommerce', 'simple-googletag' ),
        'plugins' => array_merge(
            $woocommerce_active ? array() : array( $shoplentor_entry ),
            array(
                array(
                    'slug'      => 'whols',
                    'location'  => 'whols.php',
                    'name'      => esc_html__( 'Whols – Wholesale Prices and B2B Store Solution for WooCommerce', 'simple-googletag' )
                ),
                array(
                    'slug'      => 'recurio',
                    'location'  => 'recurio.php',
                    'name'      => esc_html__( 'Recurio – Ultimate Subscription for WooCommerce', 'simple-googletag' )
                ),
            )
        )
    ) );

    $get_instance->add_new_tab(array(
        'title' => esc_html__( 'Popular', 'simple-googletag' ),
        'plugins' => array(
            array(
                'slug'      => 'ht-mega-for-elementor',
                'location'  => 'htmega_addons_elementor.php',
                'name'      => esc_html__( 'HT Mega Addons for Elementor – Elementor Widgets & Template Builder', 'simple-googletag' )
            ),
            array(
                'slug'      => 'wp-plugin-manager',
                'location'  => 'plugin-main.php',
                'name'      => esc_html__( 'WP Plugin Manager – Deactivate plugins per page', 'simple-googletag' )
            ),
            array(
                'slug'      => 'ht-easy-google-analytics',
                'location'  => 'ht-easy-google-analytics.php',
                'name'      => esc_html__( 'HT Easy GA4 – Google Analytics WordPress Plugin', 'simple-googletag' )
            ),
            array(
                'slug'      => 'cookieray',
                'location'  => 'cookieray.php',
                'name'      => esc_html__( 'CookieRay – Cookie Banner for Cookie Consent (GDPR/CCPA Compliant)', 'simple-googletag' )
            ),
            array(
                'slug'      => 'insert-headers-and-footers-script',
                'location'  => 'init.php',
                'name'      => esc_html__( 'Insert Headers and Footers Code – HT Script', 'simple-googletag' )
            ),
            array(
                'slug'      => 'pixelavo',
                'location'  => 'pixelavo.php',
                'name'      => esc_html__( 'Pixelavo – Server Side Tracking & Pixel + AI Ads Tools', 'simple-googletag' )
            ),
            array(
                'slug'      => 'courseglade-lms',
                'location'  => 'courseglade-lms.php',
                'name'      => esc_html__( 'CourseGlade LMS – Online Course & eLearning Platform', 'simple-googletag' )
            ),
        )
    ));

    }

	function admin_init(){
		register_setting( 'simple-googletag-settings-option', 'google_tag_manager_id' );
	}

	function plugin_page() {
		?>
	        <div class="wrap">
	            <h2><?php echo esc_html__( 'Really Simple Google Tag Manager Option','simple-googletag' ); ?></h2>
	            <form action='options.php' method='post'>
		            <?php
		            	$this->save_message();
		            	settings_fields( 'simple-googletag-settings-option' );
						do_settings_sections( 'simple-googletag-setting-page' ); 
		            ?>
		            <table class="form-table" role="presentation">
						<tbody>
							<tr>
								<?php $google_tag_manager_id = get_option( 'google_tag_manager_id' )?get_option( 'google_tag_manager_id' ): ''; ?>
								<th scope="row" style="width: 20%;"><?php echo esc_html__('Google Tag Manager Container ID : ','simple-googletag'); ?></th>
								<td>
									<input type="text" id="google_tag_manager_id" placeholder="GTM-XXXXXXX" name="google_tag_manager_id" value="<?php echo esc_attr( $google_tag_manager_id ); ?>"/>
									<p class="description"><?php echo esc_html__( 'Sample Container ID:  GTM-P6TJ764','simple-googletag'); ?></p>
								</td>
							</tr>
						</tbody>
					</table>
					<div>
						<?php submit_button(); ?>
					</div>
	        	</form>
	        	<P><strong><?php echo esc_html__("Find your container ID from ",'simple-googletag') ?><a href="<?php echo esc_url('https://tagmanager.google.com/#/home');?>" target="_blank"><?php echo esc_html__('Google Tag Manager Website.','simple-googletag');?></a></strong></P>
	        </div>
        <?php 
    }

    function save_message() {
    	$google_tag_manager_id = get_option( 'google_tag_manager_id' )?get_option( 'google_tag_manager_id' ):'';
        if( isset($_GET['settings-updated'])) { 
        	if($google_tag_manager_id):
			?>
	            <div class="updated notice is-dismissible"> 
	                <p><strong><?php echo esc_html__('Successfully Settings Saved.','simple-googletag') ?></strong></p>
	            </div>
	        <?php else: ?>
	        	<div class="notice notice-error is-dismissible"> 
	                <p><strong><?php echo esc_html__('Please Enter a Valid Container ID. Google Tag Manager Container ID Field is Empty.','simple-googletag') ?></strong></p>
	            </div>
            <?php
        	endif;
        }
    }
}

new Simple_Googletag_Admin_Setting();

?>

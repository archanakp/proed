<?php
/**
 * BuilderPress Siteorigin Heading widget
 *
 * @version     1.0.0
 * @author      ThimPress
 * @package     BuilderPress/Classes
 * @category    Classes
 * @author      Thimpress, leehld
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'BuilderPress_SO_Heading' ) ) {
	/**
	 * Class BuilderPress_SO_Heading
	 */
	class BuilderPress_SO_Heading extends BuilderPress_SO_Widget {

		/**
		 * BuilderPress_SO_Heading constructor.
		 */
		public function __construct() {
			// set config class
			$this->config_class = 'BuilderPress_Config_Heading';

			parent::__construct();
		}
	}
}

add_action( 'widgets_init', 'builder_press_so_register_widget_heading' );

if ( ! function_exists( 'builder_press_so_register_widget_heading' ) ) {
	/**
	 * Register widget
	 */
	function builder_press_so_register_widget_heading() {
		register_widget( 'BuilderPress_SO_Heading' );
	}
}

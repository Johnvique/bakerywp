<?php
/**
 * Batch Processing
 *
 * @package Astra Sites
 * @since 1.2.14
 */

if ( ! class_exists( 'Astra_Sites_Batch_Processing_Brizy' ) ) :

	/**
	 * Astra Sites Batch Processing Brizy
	 *
	 * @since 1.2.14
	 */
	class Astra_Sites_Batch_Processing_Brizy {

		/**
		 * Instance
		 *
		 * @since 1.2.14
		 * @access private
		 * @var object Class object.
		 */
		private static $instance;

		/**
		 * Initiator
		 *
		 * @since 1.2.14
		 * @return object initialized object of class.
		 */
		public static function get_instance() {

			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 *
		 * @since 1.2.14
		 */
		public function __construct() {}

		/**
		 * Import
		 *
		 * @since 1.2.14
		 * @return void
		 */
		public function import() {

			Astra_Sites_Importer_Log::add( '---- Processing WordPress Posts / Pages - for "Brizy" ----' );
			if ( ! is_callable( 'Brizy_Editor_Storage_Common::instance' ) ) {
				return;
			}

			$post_types = Brizy_Editor_Storage_Common::instance()->get( 'post-types' );
			if ( empty( $post_types ) && ! is_array( $post_types ) ) {
				return;
			}

			$post_ids = Astra_Sites_Batch_Processing::get_pages( $post_types );
			if ( empty( $post_ids ) && ! is_array( $post_ids ) ) {
				return;
			}

			foreach ( $post_ids as $post_id ) {
				$is_brizy_post = get_post_meta( $post_id, 'brizy_post_uid', true );
				if ( $is_brizy_post ) {
					$this->import_single_post( $post_id );
				}
			}
		}

		/**
		 * Update post meta.
		 *
		 * @param  integer $post_id Post ID.
		 * @return void
		 */
		public function import_single_post( $post_id = 0 ) {

			$ids_mapping = get_option( 'astra_sites_wpforms_ids_mapping', array() );

			// Empty mapping? Then return.
			if ( empty( $ids_mapping ) ) {
				return;
			}

			$json_value = null;

			$post = Brizy_Editor_Post::get( (int) $post_id );
			$data = $post->storage()->get( Brizy_Editor_Post::BRIZY_POST, false );

			// Decode current data.
			$json_value = base64_decode( $data['editor_data'] );

			// Update WPForm IDs.
			foreach ( $ids_mapping as $old_id => $new_id ) {
				$json_value = str_replace( '[wpforms id=\"' . $old_id, '[wpforms id=\"' . $new_id, $json_value );
			}

			// Encode modified data.
			$data['editor_data'] = base64_encode( $json_value );

			$post->set_editor_data( $json_value );

			$post->storage()->set( Brizy_Editor_Post::BRIZY_POST, $data );

			$post->compile_page();
			$post->save();
		}

	}

	/**
	 * Kicking this off by calling 'get_instance()' method
	 */
	Astra_Sites_Batch_Processing_Brizy::get_instance();

endif;

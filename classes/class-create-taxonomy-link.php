<?php
/**
 * ---------------------------------------------------------------------------------------------
 * @package Taxonomy Link Class
 * @author webbmakerr
 * @link https://webbmakerr.info
 */

if( ! class_exists( 'omCreateTaxonomyLink' ) ) {
    /**
     * Create taxonomy link by "omCreateTaxonomyLink" class.
     */
    class omCreateTaxonomyLink
    {
        // Properties
        private $taxonomy_name;
        private $post_type;
        private $link;
        private $post;
        // Methods
        /**
         * Hook into the appropriate action(s) when the class constructed by "__construct" function.
         * 
         * @access public
         * @param string $taxonomy_name
         * @param string $post_type
         * @return void
         */
        function __construct( $taxonomy_name, $post_type ) {
            $this->post_type = $post_type;
            $this->lower_taxonomy_name = strtolower( $taxonomy_name );
            // Add filter custom post type link to taxonomy
            add_filter( 'post_type_link', array( $this, 'om_filter_custom_post_type_link_taxonomy' ), 10, 2 );
        }
        /**
         * Adds filter custom post type link taxonomy by "om_filter_custom_post_type_link_taxonomy" function.
         * 
         * @access public
         * @param url $link The post url.
         * @param WP_Post $post The post object.
         * @return url $new_link The new post url.
         */
        function om_filter_custom_post_type_link_taxonomy( $link, $post ) {
            $this->link = $link;
            $this->post = $post;
            $this->taxonomy_type = $this->post_type . '_' . $this->lower_taxonomy_name;
            $this->categories = get_the_terms( $this->post->ID, $this->taxonomy_type );
            if ( $this->post->post_type !== $this->post_type ) { return $this->link; }
            if ( $this->categories ) {
                $this->replace = '%' . $this->post_type . '_' . $this->lower_taxonomy_name . '%';
                $this->link = str_replace( $this->replace, array_pop( $this->categories )->slug, $this->link );
            }
            return $this->link;
        }
    }
}

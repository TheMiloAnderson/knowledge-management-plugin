<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Knowledge_Management_Taxonomies {
    public function subjects() {
        $labels = array(
            'name'              => 'Subjects',
            'singular_name'     => 'Subject',
            'search_items'      => 'Search Subjects',
            'all_items'         => 'All Subjects',
            'parent_item'       => null,
            'parent_item_colon' => null,
            'edit_item'         => 'Edit Subject',
            'update_item'       => 'Update Subject',
            'add_new_item'      => 'Add New Subject',
            'new_item_name'     => 'New Subject Name',
            'menu_name'         => 'Subjects',
        );
        $args = array(
            'hierarchical'          => false,
            'labels'                => $labels,
            'public'                => true,
            'show_ui'               => true,
            'show_in_quick_edit'    => true,
            'show_admin_column'     => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var'             => true,
            'rewrite'               => array( 'slug' => 'subjects' ),
        );
        register_taxonomy('subjects', 'post', $args);
    }
    public function teams() {
        $labels = array(
            'name'              => 'Teams',
            'singular_name'     => 'Team',
            'search_items'      => 'Search Teams',
            'all_items'         => 'All Teams',
            'parent_item'       => 'Parent Team',
            'parent_item_colon' => 'Parent Team:',
            'edit_item'         => 'Edit Team',
            'update_item'       => 'Update Team',
            'add_new_item'      => 'Add New Team',
            'new_item_name'     => 'New Team Name',
            'menu_name'         => 'Teams',
        );
        $args = array(
            'hierarchical'          => true,
            'labels'                => $labels,
            'public'                => true,
            'show_ui'               => true,
            'show_in_quick_edit'    => true,
            'show_admin_column'     => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var'             => true,
            'rewrite'               => array( 'slug' => 'teams' ),
        );
        register_taxonomy('teams', 'post', $args);
    }
    public function unregister() {
        unregister_taxonomy_for_object_type('post_tag', 'post');
    }
}
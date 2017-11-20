<?php

class KM_Widget extends WP_Widget {
    
    function __construct() {
        parent::__construct(false, 'Knowledge Management Widget');
    }
    
    public function add_assets() {
        $path = plugins_url('', __FILE__);
        wp_enqueue_script('jquery-ui-autocomplete', '', ['jquery-ui-widget', 'jquery-ui-position'], '1.8.6');
        wp_enqueue_style('km-widget', $path . '/css/km-widget.css');
        wp_enqueue_script('km-widget', $path . '/js/km-widget.js', array('jquery-ui-core'), false, false);
    }
    
    public function widget($args, $instance) {
        extract($args, EXTR_SKIP);
        $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
        echo $before_widget;
		if (!empty($title)) {
			echo "<div><div style='display: inline-block;'>";
            echo $before_title . $title . $after_title;
            echo "</div></div>";
        }
        ?>
<div class="ui-widget">
    <h3>Search:</h3>
    <?php get_search_form(); ?>
    <h3>Channels:</h3>
    <input type="text" id="tags" onkeyup="if (event.keyCode == 13) {document.getElementById('postTagAdd').click();}" style="width:196px;" tabindex="2"/>
    <input type="button" class="button" id="postTagAdd" value="Add" tabindex="3"/>
    <div id="tagFilterHideShow">
        <br />
        <p id="postTagList">
        </p>
    </div>
    <br />
    <h3 id="tagListTitle" style="cursor:pointer;">
        Channel List&nbsp;<span id="caret" class="caretRight"></span>
    </h3>
    <p id="tagListContent" style="margin-left:20px;display:none;">
        <span class="channel-item" id="subjectListTitle" style="cursor:pointer; font-weight:bold; display: inline-block; margin-top:15px;">
            Subjects&nbsp;<span id="caret" class="caret"></span>
        </span>
        <br />
        <span id="subjectListContent">
            <!-- HTML updated by JavaScript: getCategoryTagsAjaxRequest() -->
        </span>
        <span class="channel-item" id="projectListTitle" style="cursor:pointer; font-weight:bold; display: inline-block; margin-top:15px;">
            Projects&nbsp;<span id="caret" class="caret"></span>
        </span>
        <br />
        <span id="projectListContent">
            <!-- HTML updated by JavaScript: getCategoryTagsAjaxRequest() -->
        </span>
    </p>
    <h3 id="deptListTitle" style="cursor:pointer;">
        Departments&nbsp;<span id="caret" class="caretRight"></span>
    </h3>
        <?php
    }
    
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		return $instance;
    }
    
    public function form($instance) {
        $instance = wp_parse_args($instance, [
            'title' => '',
        ]);
        $title = $instance['title'];
        ?>
        <p>
            <label for="<?= $this->get_field_id('title'); ?>">Title: 
            <input class="widefat" 
                id="<?= $this->get_field_id('title'); ?>" 
                name="<?= $this->get_field_name('title'); ?>" 
                type="text" 
                value="<?= esc_attr($title); ?>" />
            </label>
        </p>
        <?php
    }
    
    public function register_km_widgets() {
        register_widget(get_class($this));
    }
}
<?php

class Knowledge_Management_Posts {
    public function posts($template) {
        $path = explode('/', $template);
        $file = $path[count($path) - 2] . '/' . $path[(count($path) - 1)];
        if (!file_exists(plugin_dir_path(__FILE__) . 'generated/' . $file)) {
            $code = file_get_contents($template);
            $subject_code = 'get_the_term_list(the_ID(), "subjects", "", ", ")';
            $team_code = 'get_the_term_list(the_ID(), "subjects", "", ", ")';
            $code = preg_filter('/the_tags\((.*)\)/', $subject_code, $code);
            $code = preg_filter('/the_category\((.*)\)/', $team_code, $code);
            //file_put_contents(plugin_dir_path(__FILE__) . 'generated/' . $file, $code);
        }
        die($template);
    }
}


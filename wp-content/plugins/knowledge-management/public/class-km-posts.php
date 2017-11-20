<?php

class Knowledge_Management_Posts {
    public function posts($template) {
        $path = explode('/', $template);
        $theme = $path[count($path) - 2];
        $file = $path[(count($path) - 1)];
        $newPath = wp_normalize_path(plugin_dir_path(__FILE__) . 'generated/' . $theme);
        if (!file_exists($newPath . '/' . $file)) {
            if (!file_exists($newPath)) {
                mkdir($newPath);
            }
            $code = file_get_contents($template);
            $subject_code = 'echo get_the_term_list($post->id, "subjects", "", ", ")';
            $team_code = 'echo get_the_term_list($post->id, "teams", "", ", ")';
            $code = preg_filter('/the_tags\((.*)\)/', $subject_code, $code);
            $code = preg_filter('/the_category\((.*)\)/', $team_code, $code);
            file_put_contents($newPath . '/' . $file, $code);
        }
        return $newPath . '/' . $file;
    }
}


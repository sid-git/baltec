<?php
global $themebucket_firebrick;
$sections = $themebucket_firebrick['firebrick_sections_order'];
if (!is_array($sections)) {
    $sections = firebrick_get_enabled_sections();
}
if (empty($sections)) {
    $sections = firebrick_get_all_sections();
}
foreach ($sections as $section_id => $name) {
    $section_id = str_replace("_", "-", $section_id);
    if (file_exists(__DIR__ . "/sections/{$section_id}.php")){
        get_template_part("sections/{$section_id}");
    }
}
?>








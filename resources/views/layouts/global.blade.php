@php

    $color_var = ':root{';
    // Start Color Variable
    $color_var .='--primary_color:' . (empty(setting("PRIMARY_COLOR")) ? "#108b3a" : setting("PRIMARY_COLOR")) .';';
    $color_var .='--primary_bg_color_text:' . (empty(setting("PRIMARY_BG_TEXT_COLOR")) ? "#ffffff" : setting("PRIMARY_BG_TEXT_COLOR")) .';';
    $color_var .='--secondary_color:' . (empty(setting("SECONDARY_COLOR")) ? "#000000" : setting("SECONDARY_COLOR")) .';';
    $color_var .='--optional_color:' . (empty(setting("OPTIONAL_COLOR")) ? "#00aa3a" : setting("OPTIONAL_COLOR")) .';';
    $color_var .='--optional_bg_color_text:' . (empty(setting("OPTIONAL_BG_TEXT_COLOR")) ? "#ffffff" : setting("OPTIONAL_BG_TEXT_COLOR")) .';';

    $color_var .='--MAIN_MENU_BG:' . (empty(setting("MAIN_MENU_BG")) ? "var(--primary_color)" : setting("MAIN_MENU_BG")) .';';
    $color_var .='--MAIN_MENU_ul_li_color:' . (empty(setting("MAIN_MENU_ul_li_color")) ? "var(--primary_bg_color_text)" : setting("MAIN_MENU_ul_li_color")) .';';

    
    // End Color Variable
    $color_var .= '}';
@endphp
<!-- GLOBAL BLADE -->
<style>
    a,i:hover{text-decoration:none !important;}
    {{ $color_var }}
</style>


<style>
a,i:hover{text-decoration:none !important;}
</style>
@php
    $color_var = '<style>:root{';
        // Start Color Variable
        $color_var .='--primary_color:' . env("PRIMARY_COLOR").';';
        $color_var .='--primary_bg_color_text:' . env("PRIMARY_BG_COLOR_TEXT").';';
        $color_var .='--secondary_color:' . env("SECONDARY_COLOR").';';
        $color_var .='--optional_color:' . env("OPTIONAL_COLOR").';';
        // End Color Variable
    $color_var .= '}</style>';
    echo $color_var;
@endphp
@php




    $color_var = ':root{';
    // Start Color Variable
    $color_var .='--primary_color:' . setting('PRIMARY_COLOR') .';';
    $color_var .='--primary_bg_color_text:' . setting('PRIMARY_BG_TEXT_COLOR') .';';
    $color_var .='--secondary_color:' . setting("SECONDARY_COLOR").';';
    $color_var .='--optional_color:' . setting("OPTIONAL_COLOR").';';
    $color_var .='--optional_bg_color_text:' . setting("OPTIONAL_BG_TEXT_COLOR").';';
    // End Color Variable
    $color_var .= '}';
@endphp
<!-- GLOBAL BLADE -->
<style>
    a,i:hover{text-decoration:none !important;}
    {{ $color_var }}
</style>


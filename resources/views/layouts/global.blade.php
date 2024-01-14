@php
    $color_var = ':root{';
    // Start Color Variable
    $color_var .='--primary_color:' . setting('PRIMARY_COLOR') .';';
    $color_var .='--primary_bg_color_text:' . env("PRIMARY_BG_COLOR_TEXT").';';
    $color_var .='--secondary_color:' . env("SECONDARY_COLOR").';';
    $color_var .='--optional_color:' . env("OPTIONAL_COLOR").';';
    $color_var .='--optional_bg_color_text:' . env("OPTIONAL_BG_COLOR_TEXT").';';
    // End Color Variable
    $color_var .= '}';
@endphp
<!-- GLOBAL BLADE -->
<style>
    a,i:hover{text-decoration:none !important;}
    {{ $color_var }}
    .sidebar>nav>ul>li>a>p,.sidebar>nav>ul>li>a>i,.sidebar .user-panel .info a{color:var(--optional_bg_color_text);}
</style>


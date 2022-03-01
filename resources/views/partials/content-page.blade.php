@php the_content() @endphp
{!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}

@php

/* retrieve fieldvalues from acf backend */

//dancer group array 
$content = get_field('dancer_module');

//single field values from the grouparray (gets displayed for both single and group dancer)
$group_dancer = $content['group_dancer'];
$dancer_image = $content['dancer_image'];
$dancers_name = $content['dancers_name'];
$dancer_mail = $content['dancer_mail'];

//groupdancer conditional content
$groupdancer_name = $content['groupdancer_name'];
$dancer_participants = $content['dancer_participants'];


//taxonomity dancer country array
$dancer_country = $content['dancer_country'];

//custom post type relation dance_styles
$dance_styles = $content['dance_styles'];
@endphp



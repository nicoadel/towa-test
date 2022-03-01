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


<div class="container dancer-container">
    <div class="row">
        <div class="col-4">
            <div class="dancer-card">
                @if ($dancer_image)
                <div class="dancer-card-image">
                    {!! wp_get_attachment_image($dancer_image) !!}
                </div>
                @endif
                <div class="dancer-card-textcontent">
                    <div class="dancer-card-textcontent-name">
                        @if ($group_dancer && $groupdancer_name)
                            <h2>{!! $groupdancer_name !!}</h2>
                        @elseif($dancers_name)
                            <h2>{!! $dancers_name !!}</h2>
                        @endif
                    </div>
                    <div class="dancer-card-textcontent-infos">

                        @if ($dancer_mail)
                        <div class="textcontent-infos-mail">
                            <a href="mail:{!! $dancer_mail !!}">{!! $dancer_mail !!}</a>
                        </div>  
                        @endif
                        
                        @if ($dancer_country)
                        <div class="textcontent-infos-country">
                            @foreach ($dancer_country as $country)
                                @php $country_name = get_term($country)->name; @endphp
                                <span>{!! $country_name !!}</span>
                            @endforeach
                        </div>
                        @endif

                        @if ($group_dancer && $dancer_participants)
                        <div class="textcontent-infos-participants">
                            <p>{!! $dancer_participants !!}</p>
                        </div>
                        @endif

                        @if ($dance_styles)
                        <div class="textcontent-infos-dancestyles">
                            @foreach ($dance_styles as $dance_style)

                            @php
                            //looping over the post relation and retrieving the post url and name
                                $dance_post = get_post($dance_style);
                                $post_title = $dance_post->post_title;
                            @endphp

                            <a href="{!! $dance_post->guid !!}">{!! $dance_post->post_name !!}</a>
                        
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
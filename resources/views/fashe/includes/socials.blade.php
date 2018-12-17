@foreach ($socials as $social)

    @if ($social->active)
        <a href="{{ $social->url }}" target="_blank" class="topbar-social-item fa {{ $social->icon }}"></a>
    @endif

@endforeach

{{-- <a href="#" class="topbar-social-item fa fa-facebook"></a>
<a href="#" class="topbar-social-item fa fa-instagram"></a>
<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
<a href="#" class="topbar-social-item fa fa-youtube-play"></a> --}}



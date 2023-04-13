<section class="red-color clients-section">
    <div class="outer-container">
        <div class="clients-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
            @foreach($partners as $partner)
                <figure class="clients-logo-box">
                    <a href="{!! $partner->url ? $partner->url : '#'  !!}" target="_blank">
                        <img src="{{asset('adminBoard/uploadedImages/partners/'.$partner->photo)}}"
                             alt="{!! $partner->{'name_'.Lang()} !!}">
                    </a>
                </figure>
            @endforeach
        </div>
    </div>
</section>

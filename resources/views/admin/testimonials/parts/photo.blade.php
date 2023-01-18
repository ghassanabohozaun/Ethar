@if($testimonial->photo == null)
    @if($testimonial->gender == __('general.male'))
        <img src="{{asset('site/assets/images/male.jpeg')}}"
             width="100" height="80"
             class="img-fluid img-thumbnail"/>
    @elseif($testimonial->gender == __('general.female'))
        <img src="{{asset('site/assets/images/female.jpeg')}}"
             width="100" height="80"
             class="img-fluid img-thumbnail"/>
    @elseif($testimonial->gender == __('general.others'))
        <img src="{{asset('site/assets/images/others.png')}}"
             width="100" height="80"
             class="img-fluid img-thumbnail"/>
    @endif
@else
    <img src="{{asset('adminBoard/uploadedImages/testimonials/'.$testimonial->photo)}}"
         width="100" height="80"
         class="img-fluid img-thumbnail"/>
@endif





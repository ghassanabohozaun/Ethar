<a href="{{route('admin.testimonials.edit',$testimonial->id)}}" class="btn btn-hover-primary btn-icon btn-pill "
   title="{{trans('general.edit')}}">
    <i class="fa fa-edit fa-1x"></i>
</a>


<a href="#" class="btn btn-hover-danger btn-icon btn-pill delete_opinion_btn" data-id="{{$testimonial->id}}"
   title="{{trans('general.delete')}}">
    <i class="fa fa-trash fa-1x"></i>
</a>



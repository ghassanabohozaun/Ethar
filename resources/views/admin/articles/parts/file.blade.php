@if($instance->file == null)
{{trans('articles.no_file')}}
@else
    <a href="{{Storage::url($instance->file) }}" target="_blank">
        {{trans('articles.file')}}
    </a>
@endif



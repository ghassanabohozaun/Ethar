@foreach(config('global.permissions') as $name=>$value)
    {{ in_array($name,$instance->permissions) ? __(config('global.permissions.',$value)).' | ' :''}}
    @endforeach






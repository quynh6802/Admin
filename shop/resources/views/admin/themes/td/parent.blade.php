@php
    $list = $field['model']::get();
@endphp

@foreach ($list as $i)
    @if ($i->id == $item->{$field['name']})
        {{ $i->name }}
    @endif
@endforeach

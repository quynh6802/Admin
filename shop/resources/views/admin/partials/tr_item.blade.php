<tr>
    <td>
        #
    </td>
    @foreach ($module['list'] as $field)
        <td data-field="{{ $field['name'] }}">
            @if ($field['type'] == 'custom')
                @include($field['td'])
            @else
                @include('admin.themes.td.' . $field['type'])
            @endif
        </td>
    @endforeach
    <td class="project-actions text-right" width="20%">
        <a class="btn btn-primary btn-sm" href="{{ $item->id }}">
            <i class="fas fa-folder">
            </i>
            View
        </a>
        <a class="btn btn-info btn-sm" href="/admin/{{ $module['code'] }}/edit/{{ $item->id }}">
            <i class="fas fa-pencil-alt">
            </i>
            Edit
        </a>
        <a class="btn btn-danger btn-sm" href="/admin/{{ $module['code'] }}/delete/{{ $item->id }}">
            <i class="fas fa-trash">
            </i>
            Delete
        </a>
    </td>
</tr>

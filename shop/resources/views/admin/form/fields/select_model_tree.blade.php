<?php
$modelClassName = $field['model'];
$model = new $modelClassName();
if (isset($field['where'])) {
    $model = $model->whereRaw($field['where']);
}
$model = $model->select(['id', 'name'])->where('parent', 0);
$level1 = $model->get();
?>
<label for="inputCategory">{{ $field['label'] }}</label>
<div class="col-xs-12">
    <?php $value[] = old($field['name']) != null ? old($field['name']) : @$field['value'];
    ?>
    <select name="{{ $field['name'] }}" class="form-control custom-select" id="{{ $field['name'] }}">
        <option value="0">------</option>
        @foreach ($level1 as $k => $lv1)
            <option value="{{ $lv1['id'] }}" {{ in_array($lv1->id, $value) ? 'selected ' : '' }}>
                {{ $lv1['name'] }}
            </option>
            @php
                $level2 = $lv1->childs;
            @endphp
            @if (count($level2) > 0)
                @foreach ($level2 as $k => $lv2)
                    <option value='{{ $lv2->id }}' {{ in_array($lv2->id, $value) ? 'selected ' : '' }}>
                        ---{{ $lv2->name }}</option>
                    @php $level3 = $lv2->childs; @endphp
                    @if (count($level3) > 0)
                        @foreach ($level3 as $k => $lv3)
                            <option value='{{ $lv3->id }}' {{ in_array($lv3->id, $value) ? 'selected ' : '' }}>
                                ------{{ $lv3->name }}
                            </option>
                        @endforeach
                    @endif
                @endforeach
            @endif
        @endforeach
    </select>
</div>

<!-- 'Boolean {{ $fieldTitle }} Field' checked by default -->
<div class="form-group col-sm-6 mb-3">
    @if($config->options->localized)
        @{!! Form::label('{{ $fieldName }}', __('models/{{ $config->modelNames->camelPlural }}.fields.{{ $fieldName }}').':') !!}
    @else
        @{!! Form::label('{{ $fieldName }}', '{{ $fieldTitle }}:') !!}
    @endif
    <label class="checkbox-inline">
    @{!! Form::checkbox('{{ $fieldName }}', 1, true) !!}
    <!-- remove {, true} to make it unchecked by default -->
    </label>
</div>
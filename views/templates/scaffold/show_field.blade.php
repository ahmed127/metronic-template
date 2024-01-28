<!-- {{ $fieldTitle }} Field -->
<div class="col-sm-12 row">
    <div class="col-4 my-auto">
        <p class="fs-5 ">
            @if($config->options->localized)
                @@lang('models/{{ $config->modelNames->camelPlural }}.fields.{{ $fieldName }}')
            @else
                @{{ $fieldTitle }}
            @endif
        </p>
    </div>

    <div class="col-8">
        <b class="form-control">@{{ ${!! $config->modelNames->camel !!}->{!! $fieldName !!} }}</b>
    </div>
</div>
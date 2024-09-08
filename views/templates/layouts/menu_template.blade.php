<div class="menu-item">
        <a class="menu-link @{{ Route::is('{!! $config->prefixes->getViewPrefixForInclude() !!}{!! $config->modelNames->camelPlural !!}.index') ? 'active' : '' }}"
                href="@{{ route('{!! $config->prefixes->getViewPrefixForInclude() !!}{!! $config->modelNames->camelPlural !!}.index') }}">
                <span class="menu-bullet">
                        <i class="nav-icon fas fa-home"></i>
                </span>
                @if($config->options->localized)
                <span class="menu-title">@@lang('models/{{ $config->modelNames->camelPlural }}.plural')</span>
                @else
                <span class="menu-title">{{ $config->modelNames->humanPlural }}</span>
                @endif
        </a>
</div>
@@extends('layouts.app')

@@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                    @if($config->options->localized)
                    @@lang('crud.create') @@lang('models/{!! $config->modelNames->camelPlural !!}.singular')
                    @else
                    Create {{ $config->modelNames->humanPlural }}
                    @endif
                </h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('{{ $config->prefixes->getRoutePrefixWith('.') }}dashboard') }}"
                            class="text-muted text-hover-primary">@lang('lang.dashboard')</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-500 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('{{ $config->prefixes->getRoutePrefixWith('.') }}{{ $config->modelNames->camelPlural }}.index') }}"
                            class="text-muted text-hover-primary">
                            @@lang('models/{{ $config->modelNames->camelPlural }}.plural')
                        </a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-500 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        @lang('crud.create')
                    </li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="{{ route('{{ $config->prefixes->getRoutePrefixWith('.') }}{{ $config->modelNames->camelPlural }}.index') }}"
                    class="btn btn-sm btn-secondary">
                    @@lang('crud.cancel')
                </a>
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            @@include('adminlte-templates::common.errors')
            <div class="clearfix"></div>
            <div class="card">

                @{!! Form::open(['route' => '{{ $config->prefixes->getRoutePrefixWith('.') }}{{
                $config->modelNames->camelPlural}}.store']) !!}

                <div class="card-body">

                    <div class="row">
                        @@include('{{ $config->prefixes->getViewPrefixForInclude() }}{{
                        $config->modelNames->snakePlural}}.fields')
                    </div>

                </div>

                <div class="card-footer py-4 text-end">
                    <a href="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->camelPlural !!}.index') }}"
                        class="btn btn-sm btn-secondary">@if($config->options->localized) @@lang('crud.cancel') @else
                        Cancel @endif</a>
                    @{!! Form::submit('Save', ['class' => 'btn btn-sm btn-primary']) !!}
                </div>

                @{!! Form::close() !!}

            </div>
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
</div>
@@endsection
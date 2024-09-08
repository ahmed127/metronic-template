@@extends('{{ $config->prefixes->getViewPrefixForInclude() }}layouts.app')

@@section('title', __('models/{{ $config->modelNames->camelPlural }}.plural'))

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
                    <h1>@@lang('models/{{ $config->modelNames->camelPlural }}.plural')</h1>
                    @else
                    <h1>{{ $config->modelNames->humanPlural }}</h1>
                    @endif
                </h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="@{{ route('{!! $config->prefixes->getViewPrefixForInclude() !!}dashboard') }}" class="text-muted
                            text-hover-primary">
                            @@lang('lang.dashboard')
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
                        @if($config->options->localized)
                        @@lang('models/{{ $config->modelNames->camelPlural }}.plural')
                        @else
                        {{ $config->modelNames->humanPlural }}
                        @endif
                    </li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                @@can('{!! $config->prefixes->getViewPrefixForInclude() !!}{!! $config->modelNames->camelPlural !!}.create')
                <a class="btn btn-sm btn-primary float-right"
                    href="@{{ route('{!! $config->prefixes->getViewPrefixForInclude() !!}{!! $config->modelNames->camelPlural !!}.create') }}">
                    <i class="fa-solid fa-plus"></i>
                    @@lang('crud.add_new')
                </a>
                @@endcan
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            @include('flash::message')

            <div class="clearfix"></div>
            @@if(true)
            <div class="card shadow-sm my-3 ">
                <div class="card-header collapsible cursor-pointer rotate collapsed" data-bs-toggle="collapse"
                    data-bs-target="#kt_docs_card_collapsible" aria-expanded="false">
                    <h3 class="card-title">
                        <i class="fa-solid fa-filter fs-2 me-2"></i>
                        @@lang('crud.search')
                    </h3>
                    <div class="card-toolbar rotate-180">
                        <i class="ki-duotone ki-down fs-1"></i>
                    </div>
                </div>
                <div id="kt_docs_card_collapsible" class="collapse">
                    @{!! Form::open(['route' => '{{ $config->prefixes->getViewPrefixForInclude() }}{{
                    $config->modelNames->camelPlural}}.index', 'method' => 'GET']) !!}
                    <div class="card-body">
                        <div class="row">
                            <!-- pagination Field -->
                            <div class="form-group col-sm-4">
                                @{!! Form::label('pagination', __('crud.pagination') . ':') !!}
                                @{!! Form::select('pagination', config('statusSystem.pagination'), request('pagination') ??
                                null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="card-footer py-4">
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            @@lang('crud.search')
                        </button>
                        @if (count(request()->all())>0)
                        <a class="btn btn-sm btn-danger float-right"
                            href="@{{ route('{!! $config->prefixes->getViewPrefixForInclude() !!}{!! $config->modelNames->camelPlural !!}.index') }}">
                            <i class="fa-solid fa-circle-xmark"></i>
                            @@lang('crud.reset')
                        </a>
                        @endif
                    </div>
                    @{!! Form::close() !!}
                </div>
            </div>
            @@endif
            <div class="card">
                {!! $table !!}
            </div>
        </div>
    </div>
    <!--end::Content-->
</div>
@@endsection
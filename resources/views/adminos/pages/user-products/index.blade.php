@extends('adminos.layouts.account')
@section('title')
    Products
@endsection
@section('content')
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <!--Page Content-->
                    <div class="wrapper wrapper-content">
                        @include('adminos.partials.breadcrumbs')
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Shopping cart start -->
                                <div class="panel-box">
                                    <div class="panel-box-title">
                                        <h5>
                                            @if(canEditLang() && checkRequestOnEdit())
                                                <editor_block data-name='Мои покупки' contenteditable="true">{{ __('Мои покупки') }}</editor_block>
                                            @else
                                                {{ __('Мои покупки') }}
                                            @endif
                                        </h5>
                                    </div>
                                    <div class="panel-box-content">
                                        <form id="example-advanced-form" action="#" class="wizard-big">
                                            <fieldset>
                                                <table class="table table-responsive table-striped dt-responsive nowrap dataTable no-footer dtr-inline cart-page" role="grid" style="width: 100%;">
                                                    <thead>
                                                    <tr>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 125px;">
                                                            @if(canEditLang() && checkRequestOnEdit())
                                                                <editor_block data-name='Image' contenteditable="true">{{ __('Image') }}</editor_block>
                                                            @else
                                                                {{ __('Image') }}
                                                            @endif
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 1023px;">
                                                            @if(canEditLang() && checkRequestOnEdit())
                                                                <editor_block data-name='Product Name' contenteditable="true">{{ __('Product Name') }}</editor_block>
                                                            @else
                                                                {{ __('Product Name') }}
                                                            @endif
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 153px;">
                                                            @if(canEditLang() && checkRequestOnEdit())
                                                                <editor_block data-name='Amount' contenteditable="true">{{ __('Amount') }}</editor_block>
                                                            @else
                                                                {{ __('Amount') }}
                                                            @endif
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @forelse($products as $product)
                                                        <tr class="{{ $loop->iteration % 2 == 0 ? 'even' : 'odd' }} p-2">
                                                            <td class="pro-list-img" tabindex="0">
                                                                <img src="{{ $product->image ? \Illuminate\Support\Facades\Storage::disk('do_spaces')->url($product->image) : asset('images/product-default.png') }}" class="img-fluid" alt="tbl">
                                                            </td>
                                                            <td class="pro-name">
                                                                <h6>{!! $product->title !!}</h6>
                                                                <span>{!! $product->short_description !!}</span>
                                                            </td>
                                                            <td>${{ $product->price }}</td>
                                                        </tr>
                                                    @empty

                                                    @endforelse
                                                    </tbody>
                                                </table>
                                                {{ $products->links() }}
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                                <!-- Shopping cart start -->
                            </div>
                        </div>
                    </div>
                    @include('adminos.partials.footer')
                </div>
            </div>
        </div>

@endsection

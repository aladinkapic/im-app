@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="far fa-file-alt"></i> @endsection
@section('ph-main') {{__('Narudžba broj ')}} {{$order->id}} @endsection
@section('ph-short')
    {{__('Narudžba kreirana ')}} {{$order->dateCreated()}} ( {{ $order->orderStatusRel->title ?? '' }} )
    <!-- If order is canceled, do not allow any more actions -->
    @if($order->order_status != 'canceled')
        <!-- Only root users can edit order status -->
        @if($loggedUser->role == 'Root') | <a href="{{route('system.ordering-system.edit-order', ['id' => $order->id])}}">Uredite nardužbu</a> @endif
        | <a href="{{route('system.ordering-system.preview-order-pdf', ['id' => $order->id])}}" target="_blank">{{__('Preuzmite PDF')}}</a>
    @endif
@endsection

@section('ph-navigation')
    / <a href="{{route('system.ordering-system.my-orders')}}">{{__('Historija kupovanja')}}</a>
    / <a href="{{route('system.ordering-system.preview-order', ['id' => $order->id])}}">{{ $order->id }}</a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->

@section('right-menu') @include('system.app.products.includes.right-click-menu') @endsection

@section('content')
    <div class="content-wrapper content-wrapper-bs cart-wrapper">
        <div class="cart-items cart-items-100">
            @foreach($items as $item)
                @php $item->getItemProperties(); @endphp
                <div class="cart-item">
                    <div class="ci-image">
                        <img src="{{asset(($item->productRel->mainImgRel->path ?? '').($item->productRel->mainImgRel->file ?? ''))}}" alt="">
                    </div>
                    <div class="ci-text ci-text-checkout">
                        <h4><a href="{{route('public-part.shop.preview-article', ['id' => $item->product_id])}}" target="_blank">{{$item->productRel->title ?? ''}}</a> </h4>
                        <p>
                            {{$item->productRel->short_description ?? ''}}
                        </p>
                        <div class="ci-text-properties">
                            <p>{{__('Dodatne informacije o uređaju:')}}</p>
                            <ul>
                                @foreach($item->getProperties() as $property)
                                    <li>{{$property['module']}} : {{$property['value']}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <h5> {{$item->quantity ?? ''}} x {{$item->getSystemPrice() ?? ''}} {{$order->currency ?? ''}} </h5>

                        @if($loggedUser->role == 'Root' and $order->order_status != 'canceled')
                            <a href="{{route('system.ordering-system.edit-cart-item', ['id' => $item->id ?? ''])}}" title="{{__('Uredite informacije o artiklu u košarici')}}">
                                <div class="edit-info">
                                    <i class="fas fa-edit"></i>
                                </div>
                            </a>
                        @endif
                        <div class="ci-more-details">
                            <i class="fas fa-angle-down"></i>
                            <i class="fas fa-angle-up"></i>
                        </div>
                    </div>
                </div>
                @php $totalMoney += ($item->quantity * $item->getSystemPrice()); @endphp
            @endforeach

            <div class="show-total">
                <div class="st-elements">
                    <div class="st-e-element">
                        <div class="st-e-e-key">
                            <p>{{__('Ukupno bez PDV-a')}}:</p>
                        </div>
                        <div class="st-e-e-value">
                            <p>{{ number_format((float)(($totalMoney ?? '0') * 0.83), 2, '.', '') }} {{$order->currency ?? ''}}</p>
                        </div>
                    </div>
                    <div class="st-e-element">
                        <div class="st-e-e-key">
                            <p>{{__('PDV (17%)')}}:</p>
                        </div>
                        <div class="st-e-e-value">
                            <p>{{ number_format((float)(($totalMoney ?? '0') * 0.17), 2, '.', '') }} {{$order->currency ?? ''}}</p>
                        </div>
                    </div>
                    <div class="st-e-element">
                        <div class="st-e-e-key">
                            <p>{{__('Dostava')}}:</p>
                        </div>
                        <div class="st-e-e-value">
                            <p>{{ number_format((float)(($order->shipping ?? '0')), 2, '.', '') }} {{$order->currency ?? ''}}</p>
                        </div>
                    </div>
                    <div class="st-e-element">
                        <div class="st-e-e-key">
                            <b><p>{{__('UKUPNO')}}:</p></b>
                        </div>
                        <div class="st-e-e-value">
                            <b><p>{{ number_format((float)(($totalMoney + $order->shipping)), 2, '.', '') }} {{$order->currency ?? ''}}</p></b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

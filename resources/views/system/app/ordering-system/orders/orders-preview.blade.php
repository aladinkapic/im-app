@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="far fa-file-alt"></i> @endsection
@section('ph-main') {{__('Historija kupovanja')}} @endsection
@section('ph-short') {{__('Pregledajte historiju svih narudžbi na sistemu Svjetiljke.BA')}}  @endsection

@section('ph-navigation')
    / <a href="{{route('system.ordering-system.my-orders')}}">{{__('Historija kupovanja')}}</a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->

@section('right-menu') @include('system.app.products.includes.right-click-menu') @endsection

@section('content')
    <div class="content-wrapper content-wrapper-bs">
        @include('system.template.snippets.filters', ['var' => $orders])
        <table class="table table-bordered" id="filtering">
            <thead>
            <tr>
                <th scope="col" style="text-align:center;">#</th>
                @include('system.template.snippets.filters_header')
                <th width="120px" class="akcije text-center w-120">{{__('Akcije')}}</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1; @endphp
            @foreach($orders as $order)
                <tr>
                    <td class="text-center">{{ $i++}}</td>
                    @if($loggedUser->role == 'Root')
                        <td> {{ $order->userRel->name ?? '' }} </td>
                    @endif
                    <td> {{ $order->id ?? '' }} </td>
                    <td> {{ $order->total_price ?? ''}} {{ $order->currency ?? '' }} </td>
                    <td> {{ $order->shipping ?? ''}} {{ $order->currency ?? '' }} </td>
                    <td>
                        {{ $order->orderStatusRel->title ?? '' }}
                        @if(!$admin and $order->status == 'in-transit')
                            <a href="{{route('system.ordering-system.confirm-delivery', ['id' => $order->id])}}" class="text-success" title="{{__('Na ovaj način potvrđujete da ste uspješno zaprimili narudžbu')}}">
                                ( Potvrdite dostavu )
                            </a>
                        @endif
                    </td>

                    <td class="text-center">
                        <a href="{{route('system.ordering-system.preview-order', ['id' => $order->id])}}" title="Pregled instanci šifarnika">
                            <button class="btn-dark btn-xs">Pregled</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>Svjetiljke.BA :: Narudžba broj {{$order->id ?? ''}}</title>
        <link rel="stylesheet" href="{{asset('css/system/system.css')}}">
    </head>
    <body>
        <div class="invoice-preview">
            <div class="invoice-header">
                <div class="invoice-logo">
                    <h1>Svjetiljke.BA</h1>
                </div>
                <div class="invoice-details">
                    <div class="id-row"> <p>Svjetljke.BA d.o.o</p> </div>
                    <div class="id-row"> <p> Muhameda ef. Pandže 55 </p> </div>
                    <div class="id-row"> <p> 71000, Sarajevo BiH </p> </div>
                    <div class="id-row"> <p> Tel: (00387) 61 683 449 </p> </div>
                    <div class="id-row"> <p> svjetiljkeba@gmail.com </p> </div>
                    <div class="id-row"> <p> info@svjetiljke.ba </p> </div>
                </div>
            </div>

            <div class="invoice-order-details">
                <div class="iod-row"> <div class="iod-r-key"> Broj Racuna: </div> <div class="iod-r-value"> {{$order->id ?? ''}} </div> </div>
                <div class="iod-row"> <div class="iod-r-key"> Datum izdavanja : </div> <div class="iod-r-value"> {{$order->dateCreated()}} </div> </div>
                <div class="iod-row"> <div class="iod-r-key"> Datum isporuke robe : </div> <div class="iod-r-value"> {{$order->dateCreated()}} </div> </div>
                <div class="iod-row"> <div class="iod-r-key"> Mjesto izdavanja : </div> <div class="iod-r-value"> Sarajevo, Bosna i Hercegovina </div> </div>
                <div class="iod-row"> <div class="iod-r-key"> Nacin placanja : </div> <div class="iod-r-value"> Plaćanje pri pouzeću </div> </div>
            </div>

            <div class="invoice-content">
                <table>
                    <tr>
                        <td>RB.</td>
                        <td>Naziv robe</td>
                        <td>Cijena (bez PDV-a)</td>
                        <td class="width-120">Količina</td>
                        <td>Popust (%) </td>
                        <td>PDV (17%) </td>
                        <td>Ukupno bez PDV-a</td>
                    </tr>

                    @php $counter = 1; @endphp
                    @foreach($items as $item)
                        @php $totalMoney += ($item->quantity * $item->getSystemPrice()); @endphp

                        <tr>
                            <td> {{ $counter++ }} </td>
                            <td> {{ $item->productRel->title ?? '' }} </td>
                            <td> {{ $item->getCustomPrice(0.83) ?? '' }} </td>
                            <td> {{ $item->quantity ?? '' }} </td>
                            <td> 0% </td>
                            <td> {{ $item->getCustomPrice(0.17) }} {{$order->currency ?? ''}} </td>
                            <td> {{ $item->getCustomPrice(0.83, true) }} {{$order->currency ?? ''}} </td>
                        </tr>

                    @endforeach
                </table>
            </div>

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
    </body>
</html>

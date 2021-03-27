@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-home"></i> @endsection
@section('ph-main') Dashboard @endsection
@section('ph-short') Pregled svih uređaja i informacija na jednom mjestu  @endsection

@section('ph-navigation')

@endsection

<!--------------------------------------------------------------------------------------------------------------------->

@section('content')
    <div class="homepage">
        <div class="homepage-main">

            <div class="home-row home-row-top">
                <div class="home-row-header">
                    <h4>OSNOVNE AKTIVNOSTI</h4>
                </div>

                <div class="home-row-body">
                    <div class="home-row-items">
                        <div class="home-icon" title="{{__('Ukupan broj narudžbi')}}">
                            <h1>{{$totalOrders ?? ''}}</h1>
                            <p>{{__('Ukupno narudžbi')}}</p>
                        </div>
                        <div class="home-icon" title="{{__('Broj narudžbi u tranzitu')}}">
                            <h1>{{$inTransit ?? ''}}</h1>
                            <p>{{__('U tranzitu')}}</p>
                        </div>
                        <div class="home-icon" title="{{__('Broj artikala u košarici')}}">
                            <h1>{{$inCart ?? ''}}</h1>
                            <p>{{__('Artikala u košarici')}}</p>
                        </div>
                        <div class="home-icon" title="{{__('Ukupno potrošeno novaca')}}">
                            <h1>{{$spentMoney ?? ''}}</h1>
                            <p>{{__('BAM')}}</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="home-row">
                <div class="home-row-header">
                    <h4>OSTALO</h4>
                </div>

                <div class="home-row-body">
                    <div class="home-row-items">
                        <div class="home-icon" link="{{route('system.ordering-system.my-orders')}}" title="{{__('Pregled svih narudžbi')}}">
                            <i class="fas fa-history"></i>
                            <p>Historija kupovanja</p>
                        </div>
                        <div class="home-icon" link="">
                            <i class="fas fa-cogs"></i>
                            <p>Popravka uređaja</p>
                        </div>
                        <div class="home-icon" link="">
                            <i class="fas fa-info-circle"></i>
                            <p>Uputstva za korištenje</p>
                        </div>
                        <div class="home-icon" link="">
                            <i class="far fa-lightbulb"></i>
                            <p>Novi uređaji</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="homepage-side">
            <div class="reminders home-right-wrapper">
                <div class="home-right-header">
                    <p>Napomene</p>
                </div>
                <div class="home-right-element">
                    Danas, 11. Januar 2021 - Ponedjeljak, potrebno je da završim ovaj desni dio aplikacije !
                </div>
                <div class="home-right-element">
                    Ovdje upisujemo drugu napomenu !
                </div>
            </div>

            <div class="reminders home-right-wrapper">
                <div class="home-right-header">
                    <p>Brzi linkovi</p>
                </div>
                <div class="home-right-element">
                    Podrška
                </div>
                <div class="home-right-element">
                    Dodaj novi uređaj
                </div>
            </div>
        </div>
    </div>

@endsection

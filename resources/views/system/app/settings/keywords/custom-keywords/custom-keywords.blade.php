@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-key"></i> @endsection
@section('ph-main') Pregled dodatnih šifarnika @endsection
@section('ph-short')
    Pregled dodatnih šifarnika. Odaberite željeni te unesite / izmijenite instance
@endsection

@section('ph-navigation')
    / <a href="{{route('system.settings.keywords.custom-keywords')}}"> Dodatni šifarnici </a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')

    <div class="content-wrapper content-wrapper-bs">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col" class="text-center td-w-60">#</th>
                <th scope="col">Šifarnik</th>
                <th scope="col" class="text-center td-w-120">Akcije</th>
            </tr>
            </thead>

            <tbody>
            @php $counter = 1; @endphp
            @foreach($keywords as $key => $val)
                <tr>
                    <th scope="row" class="text-center td-w-60" >{{$counter++}}</th>
                    <td>{{$val ?? ''}}</td>
                    <td class="text-center td-w-120">
                        <a href="{{route('system.settings.keywords.preview-custom-keywords', ['key' => $key])}}" title="Pregled instanci šifarnika">
                            <button class="btn-dark btn-xs">Pregled</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

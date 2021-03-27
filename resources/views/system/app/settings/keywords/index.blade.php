@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-key"></i> @endsection
@section('ph-main') Pregled svih šifarnika @endsection
@section('ph-short')
    Pregled svih šifarnika. Odaberite željeni te unesite / izmijenite instance
    | <a href="{{route('system.settings.keywords.insert-keyword-module')}}">Unesite novi šifarnik</a>
@endsection

@section('ph-navigation')
    / <a href="{{route('system.settings.keywords.index')}}"> Pregled svih šifarnika</a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')

    <div class="content-wrapper content-wrapper-bs">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" width="60px" class="text-center">#</th>
                    <th scope="col">Šifarnik</th>
                    <th scope="col">Broj instanci</th>
                    <th scope="col" width="120px" class="text-center">Akcije</th>
                </tr>
            </thead>

            <tbody>
                @php $counter = 1; @endphp
                    @foreach($keywords as $keyword)
                        <tr>
                            <th scope="row" class="text-center">{{$counter++}}</th>
                            <td>{{$keyword->title ?? ''}}</td>
                            <td>{{$keyword->numberOfInstances->count() ?? ''}}</td>
                            <td class="text-center">
                                <a href="{{route('system.settings.keywords.preview-keywords', ['id' => $keyword->id ?? ''])}}" title="Pregled instanci šifarnika">
                                    <button class="btn-dark btn-xs">Pregled</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
@endsection

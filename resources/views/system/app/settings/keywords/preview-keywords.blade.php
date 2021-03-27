@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-key"></i> @endsection
@section('ph-main') Pregled šifarnika @endsection
@section('ph-short')
    Pregled svih šifarnika. Odaberite željeni te unesite / izmijenite instance

    <a href="{{route('system.settings.keywords.insert-keywords', ['id' => $km->id])}}" title="Unesite novu instancu šifarnika">- Unesite novi</a>
@endsection

@section('ph-navigation')
    / <a href="{{route('system.settings.keywords.index')}}"> Pregled svih šifarnika</a>
    / <a href="{{route('system.settings.keywords.preview-keywords', ['id' => $km->id])}}"> Šifarnici </a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->

@section('content')

    <div class="content-wrapper content-wrapper-bs">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col" width="60px" class="text-center">#</th>
                <th scope="col">Naslov</th>
                <th scope="col">Kratki opis</th>
                <th scope="col" width="120px" class="text-center">Akcije</th>
            </tr>
            </thead>

            <tbody>
            @php $counter = 1; @endphp
            @foreach($keywords as $value)
                <tr>
                    <th scope="row" class="text-center">{{$counter++}}</th>
                    <td>{{$value->title ?? ''}}</td>
                    <td>{{$value->description ?? ''}}</td>
                    <td class="text-center">
                        <a href="{{route('system.settings.keywords.edit-keyword', ['keyword' => $km->id ?? '', 'id' => $value->id ?? ''])}}" title="Uredite instancu">
                            <button class="btn-info btn-xs"><i class="far fa-edit"></i></button>
                        </a>
                        <a href="{{route('system.settings.keywords.delete-keyword', ['keyword' => $km->id ?? '', 'id' => $value->id ?? ''])}}" title="Obrišite instancu">
                            <button class="btn-danger btn-xs"><i class="far fa-trash-alt"></i></button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-blog"></i> @endsection
@section('ph-main') Kategorije postova @endsection
@section('ph-short')
    Pregledajte i pretražite sve osnovne kategorije za blog sekciju
    | <a href="{{route('system.blog.categories.create')}}"><strong>Unesite novu</strong></a>
@endsection

@section('ph-navigation')
    / <a href="{{route('system.blog.categories.index')}}"> Kategorije postova </a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->

@section('content')
    <div class="content-wrapper content-wrapper-bs">
        @include('system.template.snippets.filters', ['var' => $categories])
        <table class="table table-bordered" id="filtering">
            <thead>
            <tr>
                <th scope="col" style="text-align:center;">#</th>
                @include('system.template.snippets.filters_header')
                <th width="120p" class="akcije text-center">{{__('Akcije')}}</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1; @endphp
            @foreach($categories as $category)
                <tr>
                    <td class="text-center">{{ $i++}}</td>
                    <td> {{ $category->title ?? ''}} </td>
                    <td> {{ $category->title_en ?? ''}} </td>

                    <td class="text-center">
                        <a href="{{route('system.blog.categories.edit', ['id' => $category->id])}}" title="Pregled instanci šifarnika">
                            <button class="btn-dark btn-xs">Pregled</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

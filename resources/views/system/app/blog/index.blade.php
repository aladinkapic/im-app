@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-blog"></i> @endsection
@section('ph-main') Pregled svih postova @endsection
@section('ph-short') Pregledajte i pretražite postove iz sekcije blog. @endsection

@section('ph-navigation')
    / <a href="{{route('system.blog.index')}}">Svi Postovi</a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->

@section('content')
    <div class="content-wrapper content-wrapper-bs">
        <table class="table table-bordered" id="filtering">
            <thead>
            <tr>
                <th scope="col" class="text-center">#</th>
                <th width="120p" class="akcije text-center">{{__('Akcije')}}</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1; @endphp
            @foreach($posts as $post)
                <tr>
                    <td class="text-center">{{ $i++}}</td>
                    <td> {{ $post->title ?? ''}} </td>
                    <td> {{ $post->categoryRel->title ?? '' }} </td>
                    <td> {{ $post->short_description ?? ''}} </td>

                    <td class="text-center">
                        <a href="{{route('system.blog.preview-post', ['id' => $post->id])}}" title="Pregledajte post">
                            <button class="btn-dark btn-xs">Pregled</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

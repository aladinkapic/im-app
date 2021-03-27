@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="far fa-lightbulb"></i> @endsection
@section('ph-main') Pregled svih fotografija @endsection
@section('ph-short')
    Pregledajte sve fotografije proizvoda sa njihovim dodatnim informacijama
    - <a href="{{route('system.products.files.gallery.insert-image', ['id' => $product->id ?? ''])}}">Unesite novu fotografiju</a>
@endsection

@section('ph-navigation')
    / <a href="{{route('system.products.all-products')}}">Svi proizvodi</a>
    / <a href="{{route('system.products.preview-product', ['id' => $product->id ?? ''])}}">{{$product->title ?? ''}}</a>
    / <a href="{{route('system.products.files.gallery.preview-images', ['id' => $product->id ?? ''])}}">Pregledajte fotografije</a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->

@section('content')
    <div class="content-wrapper content-wrapper-bs">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col" width="60px" class="text-center">#</th>
                <th scope="col">Fotografija</th>
                <th scope="col">Boja</th>
                <th scope="col">Opis</th>
                <th scope="col" width="120px" class="text-center">Akcije</th>
            </tr>
            </thead>

            <tbody>
            @php $counter = 1; @endphp
            @foreach($images as $image)
                <tr>
                    <th scope="row" class="text-center">{{$counter++}}</th>
                    <td class="force-inline-text">
                        <a href="#">Pregled fotografije</a>
                    </td>
                    <td class="force-inline-text">{{$image->colorRel->title ?? ''}}</td>
                    <td>{{$image->description ?? ''}}</td>
                    <td class="text-center">
                        <a href="{{route('system.products.files.gallery.delete-image', ['id' => $image->id ?? ''])}}" title="Obrišite fotografiju">
                            <button class="btn-danger btn-xs"><b>Obrišite</b></button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

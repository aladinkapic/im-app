@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-blog"></i> @endsection
@section('ph-main') Naslov posta @endsection
@section('ph-short')
    Unesite / pregledajte naslov posta
    @if(isset($edit))
    | <a href="{{route('system.blog.delete-header',['id' => $header->id ?? '0'] )}}">Obrišite</a>
    @endif
@endsection

@section('ph-navigation')
    / <a href="{{route('system.blog.index')}}">Svi Postovi</a>
    /   <a href="{{route('system.blog.preview-post', ['id' => $post->id])}}"> {{$post->title ?? ''}} </a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper p-3 product-wrapper">
        <div class="row">
            <div class="col-md-12">
                @if(isset($edit))
                    {!! Form::open(array('route' => 'system.blog.header.update-header', 'action' => 'BlogController@updateHeader')) !!}
                    {!! Form::hidden('id', $header->id, ['class' => 'form-control']) !!}
                @else
                    {!! Form::open(array('route' => 'system.blog.header.save-header', 'action' => 'BlogController@saveHeader')) !!}
                    {!! Form::hidden('post_id', $post->id, ['class' => 'form-control']) !!}
                @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Naslov Posta</label>
                                {!! Form::text('title', $header->title ?? '', ['class' => 'form-control', 'id' => 'titleHelp', 'aria-describedby'=>'titleHelp', 'required' => 'required', 'maxlength' => 100, isset($preview) ? 'readonly' : '']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-sm btn-secondary">Ažurirajte informacije</button>
                        </div>
                    </div>
                {!! Form::close(); !!}
            </div>
        </div>
    </div>
@endsection

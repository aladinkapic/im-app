@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-blog"></i> @endsection
@section('ph-main') Kreirajte novi paragraf @endsection
@section('ph-short')
    Unesite / pregledajte paragraf posta
    @if(isset($edit))
        | <a href="{{route('system.blog.delete-paragraph',['id' => $paragraph->id ?? '0'] )}}">Obrišite</a>
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
                    {!! Form::open(array('route' => 'system.blog.header.update-paragraph', 'action' => 'BlogController@updateParagraph')) !!}
                    {!! Form::hidden('id', $paragraph->id, ['class' => 'form-control']) !!}
                @else
                    {!! Form::open(array('route' => 'system.blog.paragraph.save-paragraph', 'action' => 'BlogController@saveParagraph')) !!}
                    {!! Form::hidden('post_id', $post->id, ['class' => 'form-control']) !!}
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="paragraph">Paragraf Posta</label>
                            {!! Form::textarea('paragraph', $paragraph->paragraph ?? '-', ['class' => 'form-control', 'id' => 'paragraphHelp', 'aria-describedby'=>'paragraphHelp', 'required' => 'required', isset($preview) ? 'readonly' : '']) !!}
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

@extends("system.template.layout")

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-blog"></i> @endsection
@section('ph-main') Kreirajte post @endsection
@section('ph-short') Unesite / pregledajte blog postove  @endsection

@section('ph-navigation')
    / <a href="#">Svi postovi</a>
    / <a href="#">Kreirajte post</a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper p-3 product-wrapper">

        <div class="row">
            <div class="col-md-12">

                {!! Form::open(array('route' => 'system.blog.update-post', 'action' => 'BlogController@updatePost')) !!}
                {!! Form::hidden('id', $post->id ?? '', ['class' => 'form-control']) !!}


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">Naslov Posta</label>
                            {!! Form::text('title', $post->title ?? '', ['class' => 'form-control', 'id' => 'titleHelp', 'aria-describedby'=>'titleHelp', 'required' => 'required', 'maxlength' => 100, isset($preview) ? 'readonly' : '']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title_en">Naslov Posta (EN)</label>
                            {!! Form::text('title_en',  '', ['class' => 'form-control', 'id' => 'title_enHelp', 'aria-describedby'=>'title_enHelp', 'required' => 'required', 'maxlength' => 100, isset($preview) ? 'readonly' : '']) !!}
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="short_description">Kratki opis</label>
                            {!! Form::text('short_description', $post->short_description ?? '', ['class' => 'form-control', 'id' => 'short_description', 'aria-describedby'=>'short_descriptionHelp', 'required' => 'required', 'maxlength' => 250, isset($preview) ? 'readonly' : '']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="short_description_en">Kratki opis (EN)</label>
                            {!! Form::text('short_description_en',  '', ['class' => 'form-control', 'id' => 'short_description_en', 'aria-describedby'=>'short_description_enHelp', 'required' => 'required', 'maxlength' => 250, isset($preview) ? 'readonly' : '']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category">Kategorije posta</label>
                            {!! Form::text('category', '', ['class' => 'form-control', 'id' => 'category', 'aria-describedby'=>'categoryHelp', 'required' => 'required', 'maxlength' => 250, isset($preview) ? 'readonly' : '']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="publish_date">Datum objave</label>
                            {!! Form::date('publish_date',  '', ['class' => 'form-control', 'id' => 'publish_date', 'aria-describedby'=>'publish_dateHelp', 'required' => 'required', 'maxlength' => 250, isset($preview) ? 'readonly' : '']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image-one">Double Images: Image Left</label>
                            <input type="file" class="form-control" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image-two">Double Images: Image Right</label>
                            <input type="file" class="form-control" value="Odaberite fajl">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="post_content">Sadrzaj posta</label>
                            {!! Form::textarea('post_content',  '', ['class' => 'form-control fc-t-160', 'id' => 'post_content', 'aria-describedby'=>'post_contentHelp', isset($preview) ? 'readonly' : '']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="post_content_en">Sadrzaj posta (EN)</label>
                            {!! Form::textarea('post_content_en',  '', ['class' => 'form-control fc-t-160', 'id' => 'post_content_en', 'aria-describedby'=>'post_content_enHelp', isset($preview) ? 'readonly' : '']) !!}
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

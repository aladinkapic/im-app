<div class="main_wrapper">
    <div class="resized_wrapper">
        <div class="our_services">
            <div class="header header-2">
                <div class="header_row">
                    <h1> {{__('NEUESTEN NACHRICHTEN')}} </h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main_wrapper">
    <div class="resized_wrapper h-latest-news">

        @foreach($posts as $post)

            <div class="h-ln-preview t-3">
                <div class="h-lnp-img-part">
                    <img src="{{isset($post) ? '/'.($post->homeImageRel->path ?? '').'/'.($post->homeImageRel->file ?? '') : ''}}" alt="">
                    <div class="h-lnp-published t-3" title="{{$post->created_at->format('d.M.Y H:i') }}">
                        <span class="s-digit t-3">{{$post->created_at->format('d')}}</span>
                        <div class="h-lnp-p-line t-3"></div>
                        <span class="s-text t-3">{{$post->created_at->format('M')}}</span>
                    </div>
                </div>
                <div class="h-lnp-rest">
                    <h5>{{ $post->categoryRel->title ?? '' }}</h5>
                    <h3>{{$post->title}}</h3>
                    <p>
                        {{ $post->short_description ?? '' }}
                    </p>

                    <a href="{{route('public-part.blog.preview', ['id' => $post->id ?? ''])}}">
                        <p>MEHR SEHEN</p>
                    </a>
                </div>
            </div>

        @endforeach

        <!-- <div class="h-ln-preview t-3">
            <div class="h-lnp-img-part">
                <img src="{{asset('images/latest-news/2.png')}}" alt="">
                <div class="h-lnp-published t-3" title="Objavljeno 29. Oktobra 2020 godine">
                    <span class="s-digit t-3">29</span>
                    <div class="h-lnp-p-line t-3"></div>
                    <span class="s-text t-3">OCT</span>
                </div>
            </div>
            <div class="h-lnp-rest">
                <h5>KITCHEN DECORATION</h5>
                <h3>MAKE YOUR KITCHEN BRIGHT</h3>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled ..
                </p>
                <a href="">
                    <p>Više informacija</p>
                </a>
            </div>
        </div> -->
    </div>
</div>

<div class="m-container m-container-f ">

    <!-- Img should be 450x300px -->


</div>

<div class="s-top-menu">
    <div class="app-name">
        <h1> Alkaris d.o.o </h1>
    </div>
    <div class="top-menu-links">
        <!-- Left top icons -->
        <div class="left-icons">
            <div class="single-li">
                <a href="" target="_blank" title="">
                    <i class="fas fa-shopping-cart"></i>
                    <div class="number-of"><p>{{$inCart ?? '0'}}</p></div>
                </a>
            </div>
            <div class="single-li" title="Odaberite jezik">
                <i class="fas fa-globe-americas"></i>
                <div class="number-of"><p>3</p></div>
            </div>

            <!-- <div class="single-li">
                <p>Novosti</p>
            </div> -->

            <a href="" target="_blank">
                <div class="single-li">
                    <p>Blog</p>
                </div>
            </a>

            <a href="">
                <div class="single-li">
                    <p>WebShop</p>
                </div>
            </a>
        </div>

        <!-- Right top icons -->
        <div class="right-icons">
            <a href="">
                <div class="single-li">
                    <p><b>Root Admin</b></p>
                </div>
            </a>
        </div>
    </div>
</div>

<!--------------------------------------------------------------------------------------------------------------------->

<div class="s-left-menu">
    <!-- user Info -->
    <div class="user-info">
        <div class="user-image">
            <img src="{{asset('images/user.png')}}" alt="">
        </div>
        <div class="user-desc">
            <h4>{{$loggedUser->name ?? ''}}</h4>
            <p>{{$loggedUser->role ?? ''}}</p>
            <p>
                <i class="fas fa-circle"></i>
                Online
            </p>
        </div>
    </div>
    <hr>

    <!-- Menu subsection -->
    <div class="s-lm-subsection">
        <!-- Root blog -->
        <a href="#" class="menu-a-link">
            <div class="s-lm-wrapper">
                <div class="s-lm-s-elements">
                    <div class="s-lms-e-img">
                        <i class="fas fa-blog"></i>
                    </div>
                    <p>Blog</p>
                    <div class="extra-elements">
                        <div class="rotate-element"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
                <div class="inside-links active-links">
                    <a href="{{route('system.blog.create-post')}}">
                        <div class="inside-lm-link">
                            <div class="ilm-l"></div><div class="ilm-c"></div>
                            <p>Unesite novi post</p>
                            <div class="additional-icon ai-grey">
                                <i class="fas fa-plus"></i>
                            </div>
                        </div>
                    </a>
                    <a href="{{route('system.blog.index')}}">
                        <div class="inside-lm-link">
                            <div class="ilm-l"></div><div class="ilm-c"></div>
                            <p>Pregled svih postova</p>
                        </div>
                    </a>
                    <a href="{{route('system.blog.categories.index')}}">
                        <div class="inside-lm-link">
                            <div class="ilm-l"></div><div class="ilm-c"></div>
                            <p> Kategorije postova </p>
                        </div>
                    </a>
                </div>
            </div>
        </a>
    </div>

    <div class="bottom-icons">
        <div class="bottom-icon" title="Dodatne opcije">
            <i class="fas fa-cog"></i>
        </div>
        <div class="bottom-icon">
            <i class="fas fa-envelope-open-text"></i>
        </div>
        <div class="bottom-icon">
            <i class="fas fa-file-csv"></i>
        </div>
        <a href="">
            <div class="bottom-icon" title="Odjavite se">
                <i class="fas fa-power-off"></i>
            </div>
        </a>
    </div>
</div>

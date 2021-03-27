<div id="top-menu">
    <div id="menu-links">
        <a href="{{route('public.home')}}">
            <div class="logo-wrapper">
                <h2> Firma D.O.O </h2>
            </div>
        </a>
        <div class="links-part">
            <div class="single-link">
                <a href="{{route('public.home')}}">{{__('Startseite')}}</a>
            </div>
            <div class="single-link">
                <a href="#">{{__('Über uns')}}</a>
            </div>
            <div class="single-link">
                <a href="#">{{__('Blog')}}</a>
            </div>
            <div class="single-link">
                <a href="{{route('public.contact-us')}}">{{__('Kontaktiere uns')}}</a>
            </div>
        </div>
        <div class="sign-up">
            <a href="{{route('login')}}">
                {{__('Einloggen')}}
                <i class="fas fa-sign-in-alt"></i>
            </a>
            <div class="mobile-menu-icon exit_menu">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </div>
</div>

<!------------------------------------------------  Left menu  -------------------------------------------------------->
<div id="left_menu">
    <div class="exit_menu" title="Close menu">
        <i class="fas fa-times"></i>
    </div>
    <div class="languages">
        <div class="single_language">
            <p>ENG</p>
        </div>
        <div class="single_language single_language2">
            <p>GER</p>
        </div>
    </div>

    <!-- menu links -->
    <div class="menu_links">
        <div class="menu_link">
            <a href="/">STARTSEITE</a>
        </div>
        <div class="menu_link left_with_sublinks" index="0">
            <a href="#">BLOG</a>
        </div>
        <div class="menu_sublinks">
            <div class="menu_sublink">
                <a href="#">
                    <p># Erste Blog-Kategorie</p>
                </a>
            </div>
            <div class="menu_sublink">
                <a href="#">
                    <p># Zweite Blog-Kategorie</p>
                </a>
            </div>
            <div class="menu_sublink">
                <a href="#">
                    <p># Dritte Blog-Kategorie</p>
                </a>
            </div>
        </div>
        <div class="menu_link">
            <a href="#">ÜBER UNS</a>
        </div>
        <div class="menu_link">
            <a href="#">KONTAKTIERE UNS</a>
        </div>
    </div>


    <div class="copyrights">
        <a href="/login">
            <p>	&copy; Copyright <span>Dudler & Co.</span> </p>
        </a>
    </div>
</div>

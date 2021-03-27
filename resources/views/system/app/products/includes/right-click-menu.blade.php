<div class="right-click-menu">
    <div class="right-click-menu-header">
        <p id="options-title">OPCIJE</p>
        <i class="fas fa-times close-right-menu"></i>
    </div>

    <div class="right-click-menu-body">
        <div class="right-click-row">
            <a class="rm-href" route="{{route('system.products.edit-product', ['id' => '-u'])}}" href="">Uredite informacije</a>
        </div>

        <div class="right-click-row">
            <a class="rm-href" route="{{route('system.products.products-items.add-item', ['id' => '-u'])}}" href="">Unesite uređaj</a>
        </div>

        <div class="right-click-row">
            <a class="rm-href" route="{{route('system.products.products-items.index', ['id' => '-u'])}}" href="">Pregled uređaja</a>
        </div>

        <!-- Keywords :: Affiliation of product depending on category -->
        <div class="right-click-row">
            <b><a href="#">Povezanost sa šifarnicima</a></b>
            <i class="fas fa-caret-right"></i>

            <div class="side-menu">
                <div class="side-menu-row">
                    <a class="rm-href" route="{{route('system.products.products-connections.add-affiliation', ['id' => '-u'])}}" href=""> Kreirajte povezanost </a>
                </div>
                <div class="side-menu-row">
                    <a class="rm-href" route="{{route('system.products.products-connections.index', ['id' => '-u'])}}" href=""> Pregled svih povezanosti </a>
                </div>

            </div>
        </div>

        <!-- Images :: Product images -->

        <div class="right-click-row">
            <b><a href="#">Fotografije proizvoda</a></b>
            <i class="fas fa-caret-right"></i>

            <div class="side-menu">
                <div class="side-menu-row">
                    <a class="rm-href" route="{{route('system.products.files.edit-images', ['id' => '-u'])}}" href="">Osnovne fotografije</a>
                </div>
                <div class="side-menu-row">
                    <a href="#">Ostale fotografije</a>
                    <i class="fas fa-caret-right"></i>

                    <div class="inside-side-menu">
                        <div class="inside-side-menu-row">
                            <a class="rm-href" route="{{route('system.products.files.gallery.preview-images', ['id' => '-u'])}}" href="">Pregled svih fotografija</a>
                        </div>
                        <div class="inside-side-menu-row" title="Unesite fotografiju proizvoda -- Galerija fotografija">
                            <a class="rm-href" route="{{route('system.products.files.gallery.insert-image', ['id' => '-u'])}}" href="">Unesite novu fotografiju</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="right-click-row">
            <b><a href="#">Ostale informacije</a></b>
            <i class="fas fa-caret-right"></i>

            <div class="side-menu">
                <div class="side-menu-row">
                    <a href="#">Ostale cijene</a>
                    <i class="fas fa-caret-right"></i>

                    <div class="inside-side-menu">
                        <div class="inside-side-menu-row">
                            <a class="rm-href" route="{{route('system.products.products-prices.index', ['id' => '-u'])}}" href="">Pregled cijena</a>
                        </div>
                        <div class="inside-side-menu-row" title="Grupni unos cijena - unesite cijene za sve podproizvode sa dodatnom cijenom od 0BAM">
                            <a class="rm-href" route="{{route('system.products.products-prices.mass-insert', ['id' => '-u'])}}" href="">Grupni unos</a>
                        </div>
                    </div>
                </div>

                <!-- Product shipping -- Won't be used at this time -- DEPRECATED -->
                {{--<div class="side-menu-row">--}}
                {{--    <a href="#"> Dostava / isporuka </a>--}}
                {{--    <i class="fas fa-caret-right"></i>--}}

                {{--    <div class="inside-side-menu">--}}
                {{--        <div class="inside-side-menu-row">--}}
                {{--            <a class="rm-href" route="{{route('system.products.product-shipping.index', ['id' => '-u'])}}" href=""> Pregled dostupnih dostava </a>--}}
                {{--        </div>--}}
                {{--        <div class="inside-side-menu-row">--}}
                {{--            <a class="rm-href" route="{{route('system.products.product-shipping.create', ['id' => '-u'])}}" href=""> Unesite novu isporuku </a>--}}
                {{--        </div>--}}
                {{--    </div>--}}
                {{--</div>--}}

            </div>
        </div>

        <div class="right-click-row">
            <a class="rm-href" route="" href="">Historija kupovanja</a>
        </div>

        <div class="line"></div>
        <div class="right-click-row">
            <b><a href="#">Sniženja na artiklu</a></b>
            <i class="fas fa-caret-right"></i>

            <div class="side-menu">
                <div class="side-menu-row">
                    <a href="#">Sniženje na boju artikla</a>
                    <i class="fas fa-caret-right"></i>

                    <div class="inside-side-menu">
                        <div class="inside-side-menu-row">
                            <a class="rm-href" route="" href="">#</a>
                        </div>
                        <div class="inside-side-menu-row">
                            <a class="rm-href" route="" href="">#</a>
                        </div>
                    </div>
                </div>

                <div class="side-menu-row">
                    <a href="#">Sniženje na boju svjetla</a>
                    <i class="fas fa-caret-right"></i>

                    <div class="inside-side-menu">
                        <div class="inside-side-menu-row">
                            <a class="rm-href" route="" href="">#</a>
                        </div>
                        <div class="inside-side-menu-row">
                            <a class="rm-href" route="" href="">#</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="line"></div>

        <div class="right-click-row">
            <a class="rm-href" route="{{route('system.products.files.preview-files', ['id' => '-u'])}}" href="">Dokumentacija</a>
        </div>

        <div class="line"></div>

        <div class="right-click-row">
            <a class="rm-href" route="" href="">Recenzije artikla</a>
        </div>
    </div>
</div>

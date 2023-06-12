<footer class="axil-footer-area footer-style-2">
    <!-- Start Footer Top Area  -->
    <div class="footer-top separator-top">
        <div class="container">
            <div class="row">
                <!-- Start Single Widget  -->
                <div class="col-lg-4 col-sm-4">
                    <div class="axil-footer-widget">
                        <h5 class="widget-title">Support</h5>
                        <!-- <div class="logo mb--30">
                        <a href="index.html">
                            <img class="light-logo" src="assets/images/logo/logo.png" alt="Logo Images">
                        </a>
                    </div> -->
                        <div class="inner">
                            <p>Mahdia Hiboun, <br>
                                Mahdia,5111 <br>
                                Tunisie.
                            </p>
                            <ul class="support-list-item">
                                <li><a href="mailto:example@domain.com"><i
                                            class="fal fa-envelope-open"></i>PrintUp@Laravel.com</a></li>
                                <li><a href="tel:(+01)850-315-5862"><i class="fal fa-phone-alt"></i> (+216)
                                        00-000-000</a></li>
                                <!-- <li><i class="fal fa-map-marker-alt"></i> 685 Market Street,  <br> Las Vegas, LA 95820, <br> United States.</li> -->
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Widget  -->
                <!-- Start Single Widget  -->
                <div class="col-lg-4 col-sm-4">
                    <div class="axil-footer-widget">
                        <h5 class="widget-title">Compte</h5>
                        <div class="inner">
                            <ul>
                                <li>
                                    @if (auth()->user())
                                        @if (Auth::user()->role == 'admin')
                                            <a href="{{ route('donnes.profil') }}">Profile</a>
                                        @else
                                            <a href="{{ route('account') }}">Profile</a>
                                        @endif
                                    @else
                                        <a href="{{ route('register') }}">Profile</a>
                                    @endif
                                </li>
                                <li><a href="{{ route('cart') }}">Panier</a></li>
                                <li><a href="{{ route('product.wishlist') }}">Favoris</a></li>
                                <li><a href="/">Acceuil</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Widget  -->
                <!-- Start Single Widget  -->
                <div class="col-lg-4 col-sm-4">
                    <div class="axil-footer-widget">
                        <h5 class="widget-title">Lien Rapide</h5>
                        <div class="inner">
                            <ul>
                                <li><a href="{{ route('boutiques') }}">Boutiques</a></li>
                                <li><a href="#">A propos</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Widget  -->

            </div>
        </div>
    </div>
    <!-- End Footer Top Area  -->
    <!-- Start Copyright Area  -->
    <div class="copyright-area copyright-default separator-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-12">
                    <div class="social-share">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-discord"></i></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12">
                    <div
                        class="copyright-right d-flex flex-wrap justify-content-xl-end justify-content-center align-items-center">
                        <ul class="quick-link">
                            <li>© 2023. Tous droits réservés <a target="_blank" href="/">PrintUp</a>.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Copyright Area  -->
</footer>

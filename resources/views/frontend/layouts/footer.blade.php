<div class="block-footer">
    <div class="pt-3">
        @include('frontend.layouts.parts.ads')
    </div>
    <div class="footer-widgets">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-4">
                    <div data-toggle="collapse" data-target="#ServicesMenuList">
                        <h4>Our Services </h4>
                    </div>

                    <ul id="ServicesMenuList">
                        <li><a target="_blank" href="https://myanmarictsolutions.pro/web-development.php"
                                class="text-mute">Website Development</a></li>
                        <li><a target="_blank" href="https://myanmarictsolutions.pro/software-development.php">Software
                                Development</a></li>
                        <li><a target="_blank" href="https://myanmarictsolutions.pro/e-commerce-solution.php">E-Commerce
                                Solutions</a></li>
                        <li><a target="_blank" href="https://myanmarictsolutions.pro/cctv-access-control.php">CCTV and
                                Access Control</a></li>
                        <li><a target="_blank" href="https://myanmarictsolutions.pro/server-networking.php">Server and
                                Networking</a></li>
                        <li><a target="_blank" href="https://myanmarictsolutions.pro/iot-development.php">IoT
                                Development</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-4">
                    <div data-toggle="collapse" data-target="#SupportMenuList">
                        <h4>Support </h4>
                    </div>
                    <ul id="SupportMenuList">
                        <li><a target="_blank" href="https://myanmarictsolutions.pro/submitticket.php">Open Ticket</a>
                        </li>
                        <li><a target="_blank" href="https://myanmarictsolutions.pro/serverstatus.php">Network
                                Status</a></li>
                        <li><a target="_blank"
                                href="https://myanmarictsolutions.pro/knowledgebase.php">Knowledgebase</a></li>
                        <li><a target="_blank" href="https://myanmarictsolutions.pro/downloads.php">Downloads</a></li>
                        <li><a target="_blank" href="https://myanmarictsolutions.pro/announcements">News and
                                Announcements</a></li>

                    </ul>
                </div>

                <div class="col-12 col-md-4 hidden-sm hidden-xs social">
                    <h4>Contact Us</h4>
                    <p class="bigger-130"><i class="fas fa-map-marker-alt"></i> 42 (Ground Floor), Zatila Street,Tamwe
                        Township, Yangon, Myanmar.</p>
                    <p class="bigger-130"><i class="fas fa-mobile-alt"></i> (+95.9) 765101660</p>
                    <p class="bigger-130"><i class="fas fa-phone-volume"></i> (+95.1) 8430980</p>
                    <p class="bigger-130"><i class="far fa-envelope"></i> <a
                            href="mailto:info@myanmarictsolutions.pro">info@myanmarictsolutions.pro</a></p>
                    <ul class="list-inline">
                        <li><a href="https://www.facebook.com/MyanmarICTSolutions/" target="blank"
                                class="btn-social btn-facebook"><i class="fab fa-facebook icon-only"></i></a></li>
                        <li><a href="https://g.page/MyanmarICTSolutions" target="blank"
                                class="btn-social btn-googleplus"><i class="fab fa-google-plus icon-only"></i></a></li>
                        <li><a href="https://twitter.com/misl_pro" target="blank" class="btn-social btn-twitter"><i
                                    class="fab fa-twitter icon-only"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="container-fluid">
            <div class="">
                <ul class="d-flex list-unstyled justify-content-center">
                    <li><a href="https://myanmarictsolutions.pro/terms-of-services.php" target="_blank"
                            class="text-mute me-2 text-decoration-none">Terms of Services</a></li>
                    <li><a href="https://myanmarictsolutions.pro/privacy-policy.php" target="_blank"
                            class="text-mute text-decoration-none">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="footer-copyright">
        <div class="container">
            <p>Copyright &copy; {{ date('Y') }} {{ generalSetting('Website Name') }} <span class="hidden-xs">All
                    Rights Reserved.</span></p>
        </div>
    </div>
</div>

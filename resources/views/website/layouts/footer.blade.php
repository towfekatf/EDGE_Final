<!-- Footer -->
<footer class="text-center text-lg-start text-white" style="background-color: #1c2331">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-between p-3 social" style="background-color: #6351ce;">
        <div>
            <span class="pl-3">Get connected with us on social networks:</span>
        </div>
        <div class="d-flex">
            <a href="#" class="text-white me-4 pr-4"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-white me-4 pr-4"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-white me-4 pr-4"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-white me-4 pr-4"><i class="fab fa-linkedin"></i></a>
        </div>
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="bg-dark text-white">
        <div class="container pt-4">
            <div class="row">
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <img src="{{ asset('storage/uploads/' . $settings['SETTING_SITE_LOGO']) }}"
                         class="img-fluid"
                         alt="{{ $settings['SETTING_SITE_LOGO'] }}"
                         style="max-height: 50px;">

                    <p>
                        Here you can use rows and columns to organize your footer
                        content. Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit.
                    </p>
                </div>

                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h3 class="text-uppercase fw-bold">COMPANY</h3>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px">
                    <p><a class="text-white" href="{{route('website.home')}}">Home</a></p>
                    <p><a class="text-white" href="{{route('website.menu')}}">Menu</a></p>
                    <p><a class="text-white" href="{{route('website.about')}}">About</a></p>
                    <p><a class="text-white" href="{{route('website.contact')}}">Contact</a></p>
                </div>

                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h3 class="text-uppercase fw-bold">Useful links</h3>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px">
                    <p><a href="#!" class="text-white">Your Account</a></p>
                    <p><a href="#!" class="text-white">Become an Affiliate</a></p>
                    <p><a href="#!" class="text-white">Shipping Rates</a></p>
                    <p><a href="#!" class="text-white">Help</a></p>
                </div>

                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-4">
                    <h3 class="text-uppercase fw-bold">Contact</h3>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px">
                    <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
                    <p><i class="fas fa-envelope me-3"></i> info@example.com</p>
                    <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                    <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Footer -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
     <a href="#" class="text-white">Towfeka Benta</a>
     <a href="#" class="text-white">01877017767</a>
    </div>
    <!-- Footer -->
</footer>
<!-- Footer -->

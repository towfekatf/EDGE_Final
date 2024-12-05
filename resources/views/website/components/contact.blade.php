<div class="contact3 py-5">
    <div class="row no-gutters">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-box ml-3">
                        <h1 class="font-weight-light mt-2">Quick Contact</h1>
                        <form action="#" method="post" class="mt-4">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mt-2">
                                        <input type="text" name="name" class="form-control mb-4" id="name" placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mt-2">
                                        <input type="text" name="email" class="form-control mb-4" id="name" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mt-2">
                                        <input type="text" name="subject" class="form-control mb-4" id="name" placeholder="Subject">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group mt-2">
                                        <textarea class="form-control" rows="3" name="description" id="description" placeholder="Message..."></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-danger-gradiant mt-3 text-white border-0 px-3 py-2"><span> SUBMIT</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-box ml-3">
                        <h1 class="font-weight-light mt-2">Contact Information</h1>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mt-2">
                                        <b>Email Address</b>
                                        <p>{!! $settings["CONTACT_EMAIL"] !!}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mt-2">
                                        <b>Phone Number</b>
                                        <p>{!! $settings["CONTACT_PHONE"] !!}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mt-2">
                                        <b>Address</b>
                                        <p>{!! $settings["CONTACT_ADDRESS"] !!}</p>
                                    </div>
                                </div>

                            </div>

                    </div>
                    <div class="mb-4 p-4 rounded-2">
                        <div class="d-flex justify-content-between">
                            @if (!empty($settings["SETTING_SOCIAL_FACEBOOK"]))
                                <a href="{{ $settings["SETTING_SOCIAL_FACEBOOK"] }}" class="text-decoration-none">
                                    <i class="fa-brands fa-facebook fa-2x"></i>
                                </a>
                            @endif

                            @if (!empty($settings["SETTING_SOCIAL_YOUTUBE"]))
                                <a href="{{ $settings["SETTING_SOCIAL_YOUTUBE"] }}" class="text-decoration-none">
                                    <i class="fa-brands fa-youtube fa-2x" style="color: #ed302f;"></i>
                                </a>
                            @endif

                            @if (!empty($settings["SETTING_SOCIAL_INSTAGRAM"]))
                                <a href="{{ $settings["SETTING_SOCIAL_INSTAGRAM"] }}" class="text-decoration-none">
                                    <i class="fa-brands fa-instagram fa-2x" style="color: #ac2bac;"></i>
                                </a>
                            @endif

                            @if (!empty($settings["SETTING_SOCIAL_LINKEDIN"]))
                                <a href="{{ $settings["SETTING_SOCIAL_LINKEDIN"] }}" class="text-decoration-none">
                                    <i class="fa-brands fa-linkedin fa-2x" style="color: #0082ca;"></i>
                                </a>
                            @endif

                            @if (!empty($settings["SETTING_SOCIAL_TWITTER"]))
                                <a href="{{ $settings["SETTING_SOCIAL_TWITTER"] }}" class="text-decoration-none">
                                    <i class="fa-brands fa-twitter fa-2x" style="color: #55acee;"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="map_container ">
                        {!! $settings["CONTACT_GOOGLE_MAP"] !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


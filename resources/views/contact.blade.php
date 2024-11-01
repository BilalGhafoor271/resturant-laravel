@extends('layout.masterlayout')

@section('content')
            <!-- Page Header -->
            <section class="page_header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="text-uppercase">Contact</h2>
                            <p>Tomato is a delicious restaurant website template</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Contact Form / Info -->
            <section class="main-content contact-content">
                <div class="container">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="text-left no-margin-top">Address</h3>
                                <div class="footer-address contact-info">
                                    <p><i class="fa fa-map-marker"></i>28 Seventh Avenue, Neew York, 10014</p>
                                    <p><i class="fa fa-phone"></i>Phone: (415) 124-5678</p>
                                    <p><i class="fa fa-envelope-o"></i>support@restaurant.com</p>
                                </div>
                                <br>

                                <h3 class="text-left no-margin-top">Working hours</h3>
                                <div class="contact-info text-muted">
                                    <p>10:00 am to 11:00 pm on Weekdays</p>
                                    <p>11:00 am to 11:30 pm on Weekends</p>
                                </div>
                                <br>

                                <h3 class="text-left no-margin-top">Follow Us</h3>
                                <div class="contact-social">
                                    <a href="http://www.facebook.com"><i class="fa fa-facebook"></i></a>
                                    <a href="http://www.twitter.com"><i class="fa fa-twitter"></i></a>
                                    <a href="http://www.dribbble.com"><i class="fa fa-dribbble"></i></a>
                                    <a href="http://www.instagram.com"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <form class="contact-form" id="contactForm" action="php/contact.php" method="post">
                                    <div class="form-group">
                                        <input class="form-control" name="name" id="name" placeholder="Full Name" type="text" required="required" />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="email" name="email" id="email" placeholder="Email Address" required="required" />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Subject" type="text" id="subject" name="subject">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" id="message" placeholder="Message" rows="5"></textarea>
                                    </div>
                                    <button class="btn btn-default btn-lg btn-block" id="js-contact-btn">Send message</button>
                                </form>
                                <div id="js-contact-result" data-success-msg="Form submitted successfully." data-error-msg="Oops. Something went wrong."></div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Google Map -->
            <!-- Set latitude and Longitude (Get it from http://google.com/maps) -->
            <div id="map" data-latitude="40.6700" data-longitude="-73.9400"></div>

          
@endsection

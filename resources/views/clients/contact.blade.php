<main id="main-container" class="main-container">
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-12">
                    <div id="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d476861.257281873!2d105.37179279723776!3d20.97344498990772!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135008e13800a29%3A0x2987e416210b90d!2zSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1655002504421!5m2!1svi!2s" width="500" height="350" style="border:0;" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5">
                    <div class="contact-info-wrap gray-bg m-t-40">
                        <div class="single-contact-info">
                            <div class="contact-icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="contact-info-dec">
                                <a href="tel://+012-345-678-102">+012 345 678 102</a>
                                <a href="tel://+012-345-678-102">+012 345 678 102</a>
                            </div>
                        </div>
                        <div class="single-contact-info">
                            <div class="contact-icon">
                                <i class="fas fa-globe-asia"></i>
                            </div>
                            <div class="contact-info-dec">
                                <a href="mailto://urname@email.com">tagiang2001thi@email.com</a>
                                <a href="mailto://urwebsitenaem.com">fptshop.com</a>
                            </div>
                        </div>
                        <div class="single-contact-info">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-info-dec">
                                <span>Tây Lai Xá, Kim Chung, Hoài Đức, Hà Nội</span>
                            </div>
                        </div>
                        <div class="contact-social m-t-40">
                            <div class="section-content">
                                <h5 class="section-content__title">Theo dõi</h5>
                            </div>
                            <div class="social-link m-t-30">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-youtube"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="contact-form gray-bg m-t-40">
                        <div class="section-content">
                            <h5 class="section-content__title">Liên lạc</h5>
                        </div>
                        <form class="contact-form-style" id="contact-form" action="{{route('sendMail')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-box__single-group">
                                        <input type="text" name="name" placeholder="Họ và tên" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                   <div class="form-box__single-group">
                                        <input type="email" name="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                   <div class="form-box__single-group">
                                        <input type="text" name="title" placeholder="Vấn đề" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-box__single-group">
                                        <textarea rows="10" name="body" required></textarea>
                                    </div>
                                    <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight m-t-30" type="submit">Gửi ý kiến</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
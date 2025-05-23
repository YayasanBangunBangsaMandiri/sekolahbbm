@extends('layouts.app')

@section('title', 'Contact Us')

@section('meta_description', 'Contact SMK School - Get in touch with our admissions team, faculty, and staff.')

@section('content')
    <!-- Contact Hero Section -->
    <div class="contact-hero" style="background-image: url('{{ asset('images/contact-hero.jpg') }}');">
        <div class="container">
            <div class="contact-hero-content">
                <h1>Contact Us</h1>
                <p>We'd love to hear from you! Get in touch with our team for any inquiries about admissions, programs, or general information.</p>
            </div>
        </div>
    </div>

    <!-- Contact Info Section -->
    <div class="contact-info-section">
        <div class="container">
            <div class="contact-info-wrapper">
                <div class="contact-info-item">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3>Visit Us</h3>
                    <p>Jl. Pendidikan No. 123<br>Kota Bandung<br>Indonesia 40123</p>
                    <a href="#map-section" class="scroll-link">Get Directions</a>
                </div>

                <div class="contact-info-item">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3>Email Us</h3>
                    <p>We'll respond to your inquiry as soon as possible</p>
                    <a href="mailto:info@smkschool.ac.id">info@smkschool.ac.id</a>
                </div>

                <div class="contact-info-item">
                    <div class="contact-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h3>Call Us</h3>
                    <p>Mon-Fri from 8:00 AM to 4:00 PM</p>
                    <a href="tel:+622112345678">+62 21 1234 5678</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Form Section -->
    <div class="contact-form-section">
        <div class="container">
            <div class="contact-content-wrapper">
                <div class="contact-content">
                    <span class="section-subtitle">GET IN TOUCH</span>
                    <h2>We'd Love to Hear From You</h2>
                    <p>Whether you're a prospective student, parent, alumni, or just interested in learning more about our programs, we're here to help. Fill out the form and our team will get back to you as soon as possible.</p>
                    
                    <div class="contact-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <div class="contact-form-wrapper">
                    <form action="{{ route('contact.send') }}" method="POST" class="contact-form">
                        @csrf
                        <div class="form-title">
                            <h3>Send us a message</h3>
                            <p>We'll get back to you as soon as possible</p>
                        </div>
                        
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        <div class="form-group">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" id="subject" name="subject" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject') }}" required>
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="message" class="form-label">Message</label>
                            <textarea id="message" name="message" class="form-control @error('message') is-invalid @enderror" required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div id="map-section" class="map-section">
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253840.65294571347!2d107.43776565!3d-6.9034443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a1f93d3e815b2!2sBandung%2C%20Kota%20Bandung%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1698375245224!5m2!1sid!2sid" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="map-card">
            <h3>Our Location</h3>
            <ul class="address-list">
                <li>
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="address-text">
                        Jl. Pendidikan No. 123<br>
                        Kota Bandung<br>
                        Indonesia 40123
                    </div>
                </li>
                <li>
                    <i class="fas fa-phone"></i>
                    <div class="address-text">
                        +62 21 1234 5678
                    </div>
                </li>
                <li>
                    <i class="fas fa-envelope"></i>
                    <div class="address-text">
                        info@smkschool.ac.id
                    </div>
                </li>
            </ul>
            <a href="https://goo.gl/maps/YourSchoolLocation" target="_blank" class="btn btn-secondary">Get Directions</a>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="faq-section">
        <div class="container">
            <div class="section-title">
                <h2>Frequently Asked Questions</h2>
                <p>Find answers to our most commonly asked questions. If you don't see what you're looking for, feel free to contact us directly.</p>
            </div>
            
            <div class="faq-container">
                <div class="faq-item">
                    <div class="faq-question">How do I apply for admission?</div>
                    <div class="faq-answer">
                        <p>To apply for admission, visit our Admissions page and fill out the online application form. You'll need to submit academic records, letters of recommendation, and attend an interview. Our admissions team will guide you through the process.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">What programs do you offer?</div>
                    <div class="faq-answer">
                        <p>We offer a wide range of vocational programs including Technology & Engineering, Business & Management, Creative Arts, and Health Sciences. Each program is designed to provide hands-on skills and industry knowledge to prepare students for successful careers.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">Are there scholarships available?</div>
                    <div class="faq-answer">
                        <p>Yes, we offer merit-based and need-based scholarships to qualified students. The application process for scholarships begins after acceptance to the school. Please contact our admissions office for more information on eligibility criteria and application deadlines.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">What facilities do you have on campus?</div>
                    <div class="faq-answer">
                        <p>Our campus features state-of-the-art labs and workshops, a modern library, sports facilities, student lounges, a cafeteria, and dedicated spaces for each program area. We continuously invest in our facilities to ensure students have access to industry-standard equipment and resources.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // FAQ toggle functionality
    document.addEventListener('DOMContentLoaded', function() {
        const faqQuestions = document.querySelectorAll('.faq-question');
        
        faqQuestions.forEach(question => {
            question.addEventListener('click', function() {
                this.classList.toggle('active');
                const answer = this.nextElementSibling;
                answer.classList.toggle('active');
                
                if (answer.classList.contains('active')) {
                    answer.style.maxHeight = answer.scrollHeight + 'px';
                } else {
                    answer.style.maxHeight = 0;
                }
            });
        });
    });
</script>
@endpush 
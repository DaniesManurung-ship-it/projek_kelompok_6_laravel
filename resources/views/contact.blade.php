@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-5">
        <div class="col">
            <div class="bg-gradient-1 text-white rounded p-5">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="fw-bold display-6 mb-3">Get in Touch</h1>
                        <p class="lead mb-4">We're here to help and answer any questions you might have</p>
                        <div class="d-flex gap-3">
                            <a href="tel:+622112345678" class="btn btn-light">
                                <i class="fas fa-phone me-2"></i>Call Now
                            </a>
                            <a href="mailto:info@schoolpro.edu" class="btn btn-outline-light">
                                <i class="fas fa-envelope me-2"></i>Email Us
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <i class="fas fa-headset fa-10x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Info -->
    <div class="row mb-5">
        @php
            $contactInfo = [
                ['icon' => 'fas fa-map-marker-alt', 'title' => 'Visit Us', 'info' => 'Jl. Pendidikan No. 123, Jakarta 12345', 'button' => 'Get Directions', 'color' => 'primary'],
                ['icon' => 'fas fa-phone', 'title' => 'Call Us', 'info' => '+62 21 1234 5678<br>+62 812 3456 7890', 'button' => 'Call Now', 'color' => 'success'],
                ['icon' => 'fas fa-envelope', 'title' => 'Email Us', 'info' => 'info@schoolpro.edu<br>admissions@schoolpro.edu', 'button' => 'Send Email', 'color' => 'warning'],
                ['icon' => 'fas fa-clock', 'title' => 'Office Hours', 'info' => 'Monday - Friday: 8:00 AM - 4:00 PM<br>Saturday: 9:00 AM - 12:00 PM', 'button' => 'Schedule Visit', 'color' => 'danger'],
            ];
        @endphp
        
        @foreach ($contactInfo as $contact)
        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-sm card-hover h-100 text-center">
                <div class="card-body p-4">
                    <div class="bg-{{ $contact['color'] }} bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                        <i class="{{ $contact['icon'] }} fa-2x text-{{ $contact['color'] }}"></i>
                    </div>
                    <h5 class="fw-bold mb-3">{{ $contact['title'] }}</h5>
                    <p class="text-muted">{!! $contact['info'] !!}</p>
                    <button class="btn btn-outline-{{ $contact['color'] }} btn-sm">{{ $contact['button'] }}</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Contact Form & Map -->
    <div class="row">
        <!-- Contact Form -->
        <div class="col-md-7 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-4">Send Us a Message</h4>
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Your Name</label>
                                <input type="text" class="form-control" placeholder="Enter your name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" placeholder="Enter your email">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Subject</label>
                            <select class="form-select">
                                <option selected>Select Subject</option>
                                <option>Admissions Inquiry</option>
                                <option>Academic Information</option>
                                <option>Technical Support</option>
                                <option>General Inquiry</option>
                                <option>Feedback & Suggestions</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" rows="5" placeholder="Type your message here..."></textarea>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="newsletter">
                            <label class="form-check-label" for="newsletter">
                                Subscribe to our newsletter for updates
                            </label>
                        </div>
                        <button type="submit" class="btn btn-gradient w-100">
                            <i class="fas fa-paper-plane me-2"></i>Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Map & Departments -->
        <div class="col-md-5 mb-4">
            <!-- Map -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-0">
                    <div style="height: 300px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);" class="rounded-top">
                        <div class="d-flex align-items-center justify-content-center h-100">
                            <div class="text-center text-white">
                                <i class="fas fa-map-marked-alt fa-4x mb-3"></i>
                                <h5 class="fw-bold">School Location</h5>
                                <p>Interactive Map Available</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-3">
                        <p class="mb-0 text-center">
                            <i class="fas fa-map-pin text-danger me-2"></i>
                            Jl. Pendidikan No. 123, Jakarta 12345
                        </p>
                    </div>
                </div>
            </div>

            <!-- Departments -->
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Contact Departments</h5>
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action border-0 py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fw-bold mb-0">Admissions Office</h6>
                                    <small class="text-muted">admissions@schoolpro.edu</small>
                                </div>
                                <i class="fas fa-chevron-right text-primary"></i>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action border-0 py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fw-bold mb-0">Academic Office</h6>
                                    <small class="text-muted">academic@schoolpro.edu</small>
                                </div>
                                <i class="fas fa-chevron-right text-primary"></i>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action border-0 py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fw-bold mb-0">Student Affairs</h6>
                                    <small class="text-muted">student@schoolpro.edu</small>
                                </div>
                                <i class="fas fa-chevron-right text-primary"></i>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action border-0 py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fw-bold mb-0">Finance Department</h6>
                                    <small class="text-muted">finance@schoolpro.edu</small>
                                </div>
                                <i class="fas fa-chevron-right text-primary"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ -->
    <div class="row mt-5">
        <div class="col">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5">
                    <h3 class="fw-bold text-center mb-5">Frequently Asked Questions</h3>
                    <div class="accordion" id="faqAccordion">
                        @php
                            $faqs = [
                                ['q' => 'How do I apply for admission?', 'a' => 'You can apply online through our admissions portal or visit our admissions office during working hours.'],
                                ['q' => 'What are the school fees?', 'a' => 'School fees vary by grade level and program. Please contact our finance department for detailed information.'],
                                ['q' => 'Do you offer scholarships?', 'a' => 'Yes, we offer merit-based and need-based scholarships. Applications open in May each year.'],
                                ['q' => 'What are the school hours?', 'a' => 'School hours are from 7:30 AM to 2:30 PM, Monday to Friday. Extracurricular activities may extend beyond these hours.'],
                                ['q' => 'Is transportation provided?', 'a' => 'Yes, we provide bus transportation covering major routes. Please contact transportation services for details.'],
                            ];
                        @endphp
                        
                        @foreach ($faqs as $index => $faq)
                        <div class="accordion-item mb-3 border-0 shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#faq{{ $index }}">
                                    <i class="fas fa-question-circle me-3 text-primary"></i>
                                    {{ $faq['q'] }}
                                </button>
                            </h2>
                            <div id="faq{{ $index }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    {{ $faq['a'] }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
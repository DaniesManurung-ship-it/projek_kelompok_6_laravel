@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-5">
        <div class="col">
            <div class="bg-gradient-1 text-white rounded p-5 shadow-sm">
                <div class="row align-items-center">
                    <div class="col-md-8 text-start">
                        <h1 class="fw-bold display-6 mb-3">Get in Touch</h1>
                        <p class="lead mb-4">We're here to help and answer any questions you might have</p>
                        <div class="d-flex gap-3">
                            <a href="tel:+622112345678" class="btn btn-light shadow-sm">
                                <i class="fas fa-phone me-2"></i>Call Now
                            </a>
                            <a href="mailto:info@schoolpro.edu" class="btn btn-outline-light">
                                <i class="fas fa-envelope me-2"></i>Email Us
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 text-center d-none d-md-block">
                        <i class="fas fa-headset fa-10x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
    /* Agar warna gradasi ungunya muncul */
    .bg-gradient-1 {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
    }
    
    /* Agar ada efek sedikit terangkat saat kartu disentuh mouse */
    .card-hover:hover {
        transform: translateY(-5px);
        transition: all 0.3s ease;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }

    /* Merapikan tampilan accordion FAQ */
    .accordion-button:not(.collapsed) {
        background-color: #f8f9ff;
        color: #764ba2;
    }
    </style>

    <!-- Alert Notifikasi -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
            <i class="fas fa-check-circle me-2"></i><strong>Berhasil!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Contact Info -->
    <div class="row mb-5">
        @php
            $contactInfo = [
                ['icon' => 'fas fa-map-marker-alt', 'title' => 'Visit Us', 'info' => 'Marom. Uluan. Sumatera Utara', 'button' => 'Get Directions', 'color' => 'primary'],
                ['icon' => 'fas fa-phone', 'title' => 'Call Us', 'info' => '+62 21 6009 5549<br>+62 821 1809 8584', 'button' => 'Call Now', 'color' => 'success'],
                ['icon' => 'fas fa-envelope', 'title' => 'Email Us', 'info' => 'info@schoolpro.kelompok-6<br>admissions@schoolpro.kelompok-6', 'button' => 'Send Email', 'color' => 'warning'],
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
                    <h5 class="fw-bold mb-3 text-dark">{{ $contact['title'] }}</h5>
                    <p class="text-muted small">{!! $contact['info'] !!}</p>
                    <button class="btn btn-outline-{{ $contact['color'] }} btn-sm rounded-pill">{{ $contact['button'] }}</button>
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
                    <h4 class="fw-bold mb-4 text-dark text-start">Send Us a Message</h4>
                    
                    <form action="{{ route('contact.send') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3 text-start">
                                <label class="form-label fw-bold">Your Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                       placeholder="Enter your name" value="{{ old('name') }}" required>
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 mb-3 text-start">
                                <label class="form-label fw-bold">Email Address</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                       placeholder="Enter your email" value="{{ old('email') }}" required>
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="mb-3 text-start">
                            <label class="form-label fw-bold">Subject</label>
                            <select name="subject" class="form-select @error('subject') is-invalid @enderror" required>
                                <option value="" disabled {{ old('subject') ? '' : 'selected' }}>Select Subject</option>
                                <option value="General Inquiry" {{ old('subject') == 'General Inquiry' ? 'selected' : '' }}>General Inquiry</option>
                                <option value="Admissions Inquiry" {{ old('subject') == 'Admissions Inquiry' ? 'selected' : '' }}>Admissions Inquiry</option>
                                <option value="Technical Support" {{ old('subject') == 'Technical Support' ? 'selected' : '' }}>Technical Support</option>
                                <option value="Feedback & Suggestions" {{ old('subject') == 'Feedback & Suggestions' ? 'selected' : '' }}>Feedback & Suggestions</option>
                            </select>
                            @error('subject') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3 text-start">
                            <label class="form-label fw-bold">Message</label>
                            <textarea name="message" class="form-control @error('message') is-invalid @enderror" 
                                      rows="5" placeholder="Type your message here..." required>{{ old('message') }}</textarea>
                            @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-4 form-check text-start">
                            <input type="checkbox" name="subscribe" class="form-check-input" id="newsletter" {{ old('subscribe') ? 'checked' : '' }}>
                            <label class="form-check-label text-muted" for="newsletter">
                                Subscribe to our newsletter for updates
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2 fw-bold shadow-sm">
                            <i class="fas fa-paper-plane me-2"></i>Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Map & Departments -->
        <div class="col-md-5 mb-4">
            <!-- Map -->
            <div class="card border-0 shadow-sm mb-4 overflow-hidden">
                <div class="card-body p-0 text-start">
                    <div style="height: 300px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);" class="">
                        <div class="d-flex align-items-center justify-content-center h-100 text-white">
                            <div class="text-center">
                                <i class="fas fa-map-marked-alt fa-4x mb-3 opacity-75"></i>
                                <h5 class="fw-bold">School Location</h5>
                                <p class="mb-0">Interactive Map Available</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-3 bg-white text-center">
                        <p class="mb-0 text-muted">
                            <i class="fas fa-map-pin text-danger me-2"></i>
                            Jl. Pendidikan No. 123, Jakarta 12345
                        </p>
                    </div>
                </div>
            </div>

            <!-- Departments -->
            <div class="card border-0 shadow-sm text-start">
                <div class="card-body">
                    <h5 class="fw-bold mb-3 text-dark">Contact Departments</h5>
                    <div class="list-group list-group-flush">
                        @php
                            $deps = [
                                ['name' => 'Admissions Office', 'email' => 'admissions@schoolpro.kelompo-6'],
                                ['name' => 'Academic Office', 'email' => 'academic@schoolpro.kelompok-6'],
                                ['name' => 'Student Affairs', 'email' => 'student@schoolpro.kelompok-6'],
                                ['name' => 'Finance Department', 'email' => 'finance@schoolpro.kelompok-6'],
                            ];
                        @endphp
                        @foreach($deps as $dep)
                        <a href="mailto:{{ $dep['email'] }}" class="list-group-item list-group-item-action border-0 px-0 py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fw-bold mb-0 text-dark">{{ $dep['name'] }}</h6>
                                    <small class="text-muted">{{ $dep['email'] }}</small>
                                </div>
                                <i class="fas fa-chevron-right text-primary opacity-50"></i>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ -->
    <div class="row mt-5 mb-5">
        <div class="col">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <h3 class="fw-bold text-center mb-5 text-dark">Frequently Asked Questions</h3>
                    <div class="accordion" id="faqAccordion">
                        @php
                            $faqs = [
                                ['q' => 'How do I apply for admission?', 'a' => 'You can apply online through our admissions portal or visit our admissions office during working hours.'],
                                ['q' => 'What are the school fees?', 'a' => 'School fees vary by grade level and program. Please contact our finance department for detailed information.'],
                                ['q' => 'Do you offer scholarships?', 'a' => 'Yes, we offer merit-based and need-based scholarships. Applications open in May each year.'],
                                ['q' => 'What are the school hours?', 'a' => 'School hours are from 7:30 AM to 2:30 PM, Monday to Friday.'],
                            ];
                        @endphp
                        
                        @foreach ($faqs as $index => $faq)
                        <div class="accordion-item mb-3 border-0 shadow-sm rounded">
                            <h2 class="accordion-header">
                                <button class="accordion-button rounded {{ $index > 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#faq{{ $index }}">
                                    <i class="fas fa-question-circle me-3 text-primary"></i>
                                    {{ $faq['q'] }}
                                </button>
                            </h2>
                            <div id="faq{{ $index }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-start text-muted">
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
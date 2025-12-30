@extends('layouts.app')

@section('title', 'Biodata Teacher')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="fw-bold">
                    <i class="fas fa-user-plus me-2 text-primary"></i>Add New Teacher
                </h1>
                <a href="#" class="btn btn-outline-primary">
                    <i class="fas fa-download me-2"></i>Export Data
                </a>
            </div>
        </div>
    </div>

    <!-- Biodata Form -->
    <div class="row">
        <div class="col">
            <form>
                <!-- Personal Details -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="fw-bold mb-0">
                            <i class="fas fa-user-circle me-2 text-primary"></i>Personal Details
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="Mono" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Last Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="Hitching" readonly>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" value="Hitching@mail.com" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Phone <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" value="+1234567890" readonly>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Date of Birth <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="24 February 1997" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Place of Birth <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="Juliana, Indonesia" readonly>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Address <span class="text-danger">*</span></label>
                            <textarea class="form-control" rows="3" readonly>Loenen ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Photo</label>
                            <div class="border rounded p-5 text-center bg-light">
                                <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                                <p class="text-muted">Drag and drop or click here to select file</p>
                                <small class="text-muted">Maximum file size: 2MB</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Education -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="fw-bold mb-0">
                            <i class="fas fa-graduation-cap me-2 text-primary"></i>Education
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">University <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="University Akademi Heloino" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Degree <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="History Major" readonly>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Start & End Date <span class="text-danger">*</span></label>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" value="September 2023" readonly>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" value="September 2027" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">City <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="Yogyakarta, Indonesia" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Information -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="fw-bold mb-0">
                            <i class="fas fa-info-circle me-2 text-primary"></i>Additional Information
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Teaching Experience</label>
                                <select class="form-select">
                                    <option>Less than 1 year</option>
                                    <option>1-3 years</option>
                                    <option selected>3-5 years</option>
                                    <option>5-10 years</option>
                                    <option>More than 10 years</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Subjects</label>
                                <select class="form-select" multiple>
                                    <option selected>History</option>
                                    <option>Social Studies</option>
                                    <option>Geography</option>
                                    <option>Political Science</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Certifications</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" checked>
                                    <label class="form-check-label">Teaching License</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox">
                                    <label class="form-check-label">IELTS/TOEFL</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" checked>
                                    <label class="form-check-label">Pedagogy Training</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Bio/Cover Letter</label>
                            <textarea class="form-control" rows="4" placeholder="Tell us about yourself, teaching philosophy, etc."></textarea>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex justify-content-between">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="saveDraft">
                        <label class="form-check-label" for="saveDraft">
                            Serve as Draft
                        </label>
                    </div>
                    <div>
                        <button type="reset" class="btn btn-outline-secondary me-3">
                            <i class="fas fa-redo me-2"></i>Reset
                        </button>
                        <button type="submit" class="btn btn-gradient">
                            <i class="fas fa-paper-plane me-2"></i>Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
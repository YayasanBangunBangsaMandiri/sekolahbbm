@extends('layouts.app')

@section('title', isset($project) ? $project->title : 'Student Project')

@section('meta_description', isset($project) ? Str::limit(strip_tags($project->description), 160) : 'View student projects and innovations at SMK School')

@section('content')
    <!-- Project Hero -->
    <div class="programs-hero" style="background-image: url('{{ isset($project) && $project->image ? asset('storage/'.$project->image) : asset('images/project-default.jpg') }}');">
        <div class="container">
            <div class="programs-hero-content">
                <h1>{{ isset($project) ? $project->title : 'Student Project' }}</h1>
                <p>{{ isset($project) ? 'By ' . $project->students : 'Showcasing innovation and creativity' }}</p>
            </div>
        </div>
    </div>

    <!-- Project Details -->
    <div class="program-details">
        <div class="container">
            <!-- Project Header -->
            <div class="program-header">
                <div class="program-meta">
                    @if(isset($project))
                        <div class="meta-item">
                            <i class="fas fa-calendar"></i>
                            {{ $project->created_at->format('M d, Y') }}
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-tags"></i>
                            {{ $project->category ?? 'Innovation' }}
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-user-graduate"></i>
                            {{ $project->department ?? 'Student Project' }}
                        </div>
                    @else
                        <div class="meta-item">
                            <i class="fas fa-calendar"></i>
                            Project Date
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-tags"></i>
                            Project Category
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-user-graduate"></i>
                            Department
                        </div>
                    @endif
                </div>

                <div class="program-image">
                    <img src="{{ isset($project) && $project->image ? asset('storage/'.$project->image) : asset('images/project-default.jpg') }}" alt="{{ isset($project) ? $project->title : 'Student Project' }}">
                </div>
            </div>

            <!-- Project Content -->
            <div class="program-content-wrapper">
                <div class="program-content">
                    @if(isset($project))
                        <!-- Project Description -->
                        <div class="content-section">
                            <h2>Project Description</h2>
                            <div>{!! $project->description !!}</div>
                        </div>

                        <!-- Project Goals -->
                        @if($project->goals)
                        <div class="content-section">
                            <h2>Project Goals</h2>
                            <div>{!! $project->goals !!}</div>
                        </div>
                        @endif

                        <!-- Methodology -->
                        @if($project->methodology)
                        <div class="content-section">
                            <h2>Methodology</h2>
                            <div>{!! $project->methodology !!}</div>
                        </div>
                        @endif

                        <!-- Results & Impact -->
                        @if($project->results)
                        <div class="content-section">
                            <h2>Results & Impact</h2>
                            <div>{!! $project->results !!}</div>
                        </div>
                        @endif

                        <!-- Future Development -->
                        @if($project->future_development)
                        <div class="content-section">
                            <h2>Future Development</h2>
                            <div>{!! $project->future_development !!}</div>
                        </div>
                        @endif
                        
                    @else
                        <div class="content-section">
                            <h2>Project Not Found</h2>
                            <p>Sorry, the project you are looking for could not be found or is no longer available. Please check the URL or navigate to our <a href="{{ route('projects.index') }}">Projects page</a> to view all student projects.</p>
                        </div>
                    @endif
                </div>

                <div class="program-sidebar">
                    <!-- Project Details Widget -->
                    <div class="sidebar-widget">
                        <h4 class="widget-title">Project Details</h4>
                        <ul class="program-info-list">
                            @if(isset($project))
                                <li>
                                    <span>Students</span>
                                    <span>{{ $project->students }}</span>
                                </li>
                                <li>
                                    <span>Supervisor</span>
                                    <span>{{ $project->supervisor ?? 'N/A' }}</span>
                                </li>
                                <li>
                                    <span>Year</span>
                                    <span>{{ $project->created_at->format('Y') }}</span>
                                </li>
                                <li>
                                    <span>Awards</span>
                                    <span>{{ $project->awards ?? 'N/A' }}</span>
                                </li>
                                <li>
                                    <span>Status</span>
                                    <span>{{ $project->status ?? 'Completed' }}</span>
                                </li>
                            @else
                                <li>
                                    <span>Students</span>
                                    <span>-</span>
                                </li>
                                <li>
                                    <span>Supervisor</span>
                                    <span>-</span>
                                </li>
                                <li>
                                    <span>Year</span>
                                    <span>-</span>
                                </li>
                                <li>
                                    <span>Awards</span>
                                    <span>-</span>
                                </li>
                                <li>
                                    <span>Status</span>
                                    <span>-</span>
                                </li>
                            @endif
                        </ul>
                    </div>

                    <!-- Share Widget -->
                    <div class="sidebar-widget">
                        <h4 class="widget-title">Share This Project</h4>
                        <div class="social-share">
                            <a href="#" class="btn btn-outline-primary btn-sm mb-2"><i class="fab fa-facebook-f mr-2"></i> Facebook</a>
                            <a href="#" class="btn btn-outline-info btn-sm mb-2"><i class="fab fa-twitter mr-2"></i> Twitter</a>
                            <a href="#" class="btn btn-outline-secondary btn-sm mb-2"><i class="fab fa-linkedin-in mr-2"></i> LinkedIn</a>
                            <a href="#" class="btn btn-outline-success btn-sm mb-2"><i class="fab fa-whatsapp mr-2"></i> WhatsApp</a>
                        </div>
                    </div>

                    <!-- Contact Widget -->
                    <div class="sidebar-widget">
                        <h4 class="widget-title">Interested?</h4>
                        <p>Want to learn more about this project or our student initiatives?</p>
                        <div class="widget-cta">
                            <a href="{{ route('contact') }}" class="btn btn-primary">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Projects -->
    @if(isset($relatedProjects) && $relatedProjects->count() > 0)
    <div class="related-programs">
        <div class="container">
            <div class="section-title">
                <h2>Related Projects</h2>
                <p>Explore more innovative projects from our students</p>
            </div>
            
            <div class="programs-grid">
                @foreach($relatedProjects as $relatedProject)
                <div class="program-card">
                    <div class="program-image">
                        <img src="{{ $relatedProject->image ? asset('storage/'.$relatedProject->image) : asset('images/project-default.jpg') }}" alt="{{ $relatedProject->title }}">
                    </div>
                    @if($relatedProject->category)
                    <div class="program-badge">{{ $relatedProject->category }}</div>
                    @endif
                    <div class="program-content">
                        <h3 class="program-title">
                            <a href="{{ route('projects.show', $relatedProject->slug) }}">{{ $relatedProject->title }}</a>
                        </h3>
                        <div class="program-info">
                            <div class="info-item">
                                <i class="fas fa-user-graduate"></i>
                                {{ $relatedProject->department ?? 'Student Project' }}
                            </div>
                        </div>
                        <p class="program-text">{{ Str::limit(strip_tags($relatedProject->description), 100) }}</p>
                        <div class="program-footer">
                            <div class="program-meta">
                                By <span>{{ $relatedProject->students }}</span>
                            </div>
                            <a href="{{ route('projects.show', $relatedProject->slug) }}" class="btn-text">View Project <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
@endsection 
@extends('layouts.app')

@section('title', 'Student Projects')

@section('meta_description', 'Explore innovative student projects from SMK School, showcasing our students\' skills and accomplishments.')

@section('content')
    <!-- Projects Hero -->
    <div class="programs-hero" style="background-image: url('{{ asset('images/projects-hero.jpg') }}');">
        <div class="container">
            <div class="programs-hero-content">
                <h1>Student Projects</h1>
                <p>Discover innovative work from our talented students, showcasing their skills, creativity, and practical knowledge.</p>
            </div>
        </div>
    </div>
    
    <!-- Projects Filter -->
    <div class="program-categories">
        <div class="container">
            <div class="section-title">
                <h2>Our Student Projects</h2>
                <p>Browse through a diverse range of student projects that demonstrate practical applications of classroom learning and innovative solutions to real-world problems.</p>
            </div>
            
            <div class="category-tabs">
                <div class="category-tab active" data-filter="all">All Projects</div>
                <div class="category-tab" data-filter="technology">Technology</div>
                <div class="category-tab" data-filter="business">Business</div>
                <div class="category-tab" data-filter="arts">Creative Arts</div>
                <div class="category-tab" data-filter="environmental">Environmental</div>
            </div>
            
            <div class="programs-grid">
                @if(isset($projects) && count($projects) > 0)
                    @foreach($projects as $project)
                        <div class="program-card" data-category="{{ $project->category_slug ?? 'all' }}">
                            <div class="program-image">
                                <img src="{{ $project->image ? asset('storage/'.$project->image) : asset('images/project-default.jpg') }}" alt="{{ $project->title }}">
                            </div>
                            @if($project->category)
                                <div class="program-badge">{{ $project->category }}</div>
                            @endif
                            <div class="program-content">
                                <h3 class="program-title">
                                    <a href="{{ route('projects.show', $project->slug) }}">{{ $project->title }}</a>
                                </h3>
                                <div class="program-info">
                                    <div class="info-item">
                                        <i class="fas fa-user-graduate"></i>
                                        {{ $project->department ?? 'Student Project' }}
                                    </div>
                                </div>
                                <p class="program-text">{{ Str::limit(strip_tags($project->description), 100) }}</p>
                                <div class="program-footer">
                                    <div class="program-meta">
                                        By <span>{{ $project->students }}</span>
                                    </div>
                                    <a href="{{ route('projects.show', $project->slug) }}" class="btn-text">View Project <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Sample Projects (Remove when you have actual projects) -->
                    <div class="program-card" data-category="technology">
                        <div class="program-image">
                            <img src="{{ asset('images/project-1.jpg') }}" alt="Smart Hydroponic System">
                        </div>
                        <div class="program-badge">Technology</div>
                        <div class="program-content">
                            <h3 class="program-title">
                                <a href="#">Smart Hydroponic System</a>
                            </h3>
                            <div class="program-info">
                                <div class="info-item">
                                    <i class="fas fa-user-graduate"></i>
                                    Computer Science
                                </div>
                            </div>
                            <p class="program-text">An automated hydroponic system that uses IoT sensors to optimize growing conditions for plants, reducing water usage by 70%.</p>
                            <div class="program-footer">
                                <div class="program-meta">
                                    By <span>Ahmad & Budi</span>
                                </div>
                                <a href="#" class="btn-text">View Project <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="program-card" data-category="business">
                        <div class="program-image">
                            <img src="{{ asset('images/project-2.jpg') }}" alt="Eco-Friendly Packaging Business">
                        </div>
                        <div class="program-badge">Business</div>
                        <div class="program-content">
                            <h3 class="program-title">
                                <a href="#">Eco-Friendly Packaging Business</a>
                            </h3>
                            <div class="program-info">
                                <div class="info-item">
                                    <i class="fas fa-user-graduate"></i>
                                    Business Management
                                </div>
                            </div>
                            <p class="program-text">A comprehensive business plan for sustainable packaging solutions made from bamboo and recycled materials for local restaurants.</p>
                            <div class="program-footer">
                                <div class="program-meta">
                                    By <span>Siti & Dewi</span>
                                </div>
                                <a href="#" class="btn-text">View Project <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="program-card" data-category="arts">
                        <div class="program-image">
                            <img src="{{ asset('images/project-3.jpg') }}" alt="Interactive Digital Art Installation">
                        </div>
                        <div class="program-badge">Creative Arts</div>
                        <div class="program-content">
                            <h3 class="program-title">
                                <a href="#">Interactive Digital Art Installation</a>
                            </h3>
                            <div class="program-info">
                                <div class="info-item">
                                    <i class="fas fa-user-graduate"></i>
                                    Digital Arts
                                </div>
                            </div>
                            <p class="program-text">An immersive art installation that responds to viewers' movements, creating unique visuals and sounds for each interaction.</p>
                            <div class="program-footer">
                                <div class="program-meta">
                                    By <span>Rina & Joko</span>
                                </div>
                                <a href="#" class="btn-text">View Project <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="program-card" data-category="environmental">
                        <div class="program-image">
                            <img src="{{ asset('images/project-4.jpg') }}" alt="Urban Waste Management Solution">
                        </div>
                        <div class="program-badge">Environmental</div>
                        <div class="program-content">
                            <h3 class="program-title">
                                <a href="#">Urban Waste Management Solution</a>
                            </h3>
                            <div class="program-info">
                                <div class="info-item">
                                    <i class="fas fa-user-graduate"></i>
                                    Environmental Science
                                </div>
                            </div>
                            <p class="program-text">A comprehensive waste management system for urban communities that increases recycling rates and reduces landfill waste.</p>
                            <div class="program-footer">
                                <div class="program-meta">
                                    By <span>Dian & Wati</span>
                                </div>
                                <a href="#" class="btn-text">View Project <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="program-card" data-category="technology">
                        <div class="program-image">
                            <img src="{{ asset('images/project-5.jpg') }}" alt="Smart Traffic Management System">
                        </div>
                        <div class="program-badge">Technology</div>
                        <div class="program-content">
                            <h3 class="program-title">
                                <a href="#">Smart Traffic Management System</a>
                            </h3>
                            <div class="program-info">
                                <div class="info-item">
                                    <i class="fas fa-user-graduate"></i>
                                    Electrical Engineering
                                </div>
                            </div>
                            <p class="program-text">An AI-powered traffic management system that adapts in real-time to traffic conditions, reducing congestion in urban areas.</p>
                            <div class="program-footer">
                                <div class="program-meta">
                                    By <span>Agus & Rini</span>
                                </div>
                                <a href="#" class="btn-text">View Project <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="program-card" data-category="business">
                        <div class="program-image">
                            <img src="{{ asset('images/project-6.jpg') }}" alt="Local Artisan Marketplace">
                        </div>
                        <div class="program-badge">Business</div>
                        <div class="program-content">
                            <h3 class="program-title">
                                <a href="#">Local Artisan Marketplace</a>
                            </h3>
                            <div class="program-info">
                                <div class="info-item">
                                    <i class="fas fa-user-graduate"></i>
                                    Digital Marketing
                                </div>
                            </div>
                            <p class="program-text">An e-commerce platform connecting local artisans with international markets, empowering small businesses through digital sales channels.</p>
                            <div class="program-footer">
                                <div class="program-meta">
                                    By <span>Maya & Eko</span>
                                </div>
                                <a href="#" class="btn-text">View Project <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            
            <!-- Pagination -->
            @if(isset($projects) && $projects instanceof \Illuminate\Pagination\LengthAwarePaginator && $projects->hasPages())
                <div class="pagination-container mt-5 d-flex justify-content-center">
                    {{ $projects->links() }}
                </div>
            @endif
        </div>
    </div>
    
    <!-- Call to Action -->
    <div class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>Have an Innovative Project Idea?</h2>
                <p>Our faculty supports student innovation through mentorship, resources, and guidance. Turn your ideas into reality with our project support program.</p>
                <div class="cta-buttons">
                    <a href="{{ route('contact') }}" class="btn btn-white">Contact Us</a>
                    <a href="#" class="btn btn-outline-white">Learn More</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Project filtering functionality
    document.addEventListener('DOMContentLoaded', function() {
        const filterTabs = document.querySelectorAll('.category-tab');
        const projectCards = document.querySelectorAll('.program-card');
        
        filterTabs.forEach(tab => {
            tab.addEventListener('click', function() {
                // Remove active class from all tabs
                filterTabs.forEach(t => t.classList.remove('active'));
                // Add active class to clicked tab
                this.classList.add('active');
                
                const filter = this.getAttribute('data-filter');
                
                projectCards.forEach(card => {
                    if (filter === 'all' || card.getAttribute('data-category') === filter) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    });
</script>
@endpush 
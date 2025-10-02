<div @class(['p-5'])>
    <a @class(['nav-link', 'text-secondary']) href="{{ route('jobs') }}"><i class="bi bi-arrow-left-circle me-2"></i>Back to Jobs</a>

    <div @class(['container'])>
        <div @class(['row', 'g-4'])>

            <div @class(['col-md-7'])>

                <div @class(['card', 'bg-white', 'border', 'rounded', 'shadow-sm', 'p-3', 'mb-3'])>
                    <h2 @style(['color: #213A5C;'])>{{ $job->job_title }}</h2>
                    <div @class(['d-flex', 'gap-3'])>
                        <p @class(['p-1', 'bg-body-tertiary', 'border', 'rounded'])> {{ $job->job_type }}</p>
                        <p @class(['p-1', 'bg-body-tertiary', 'border', 'rounded'])> {{ $job->job_arrangement }}</p>
                    </div>
                    <div>
                        <a @class(['btn btn-primary']) href="{{ route('application', ['id' => $job->id]) }}">Apply Now</a>
                    </div>
                </div>

                <div @class(['card', 'bg-white', 'border', 'rounded', 'shadow-sm', 'p-3', 'mb-3'])>
                    <h2 @style(['color: #213A5C;'])>Job Description</h2>
                    <p @class(['text-secondary', 'fs-5'])>{{ $job->job_description }}</p>
                </div>

                <div @class(['card', 'bg-white', 'border', 'rounded', 'shadow-sm', 'p-3', 'mb-3'])>
                    <h2 @style(['color: #213A5C;'])>Responsibilities</h2>
                    <p @class(['text-secondary', 'fs-5'])>{{ $job->job_responsibilities}}</p>
                </div>

                <div @class(['card', 'bg-white', 'border', 'rounded', 'shadow-sm', 'p-3', 'mb-3'])>
                    <h2 @style(['color: #213A5C;'])>Qualifications</h2>
                    <p @class(['text-secondary', 'fs-5'])>{{ $job->job_qualifications}}</p>
                </div>
            </div>

            <div @class(['col-md-5'])>
                <h2 @class(['text-center']) @style(['color: #213A5C;'])>JetlougeTravels Co.</h2>
                <div @class(['card', 'bg-white', 'border', 'rounded', 'shadow-sm', 'p-3', 'my-3', 'text-center'])>
                    <img src="{{ asset('images/building.png') }}" alt="">
                    <p @class(['text-secondary', 'fs-5', 'line-clamp-4'])>
                        Jetlouge Travels is an advanced recruitment and job-matching platform designed to connect employers
                        with top talent and job seekers with meaningful career opportunities. The system streamlines the hiring process 
                        through intelligent search, secure applications, and automated a tools, serving organizations of all sizes across industries. 
                        This was created during summer 2025 for every job seekers around Philippines.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
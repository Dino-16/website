<div @class(['p-5'])>

    <div @class(['container'])>

        <div @class(['row', 'mb-4', 'align-items-center'])>
            <div @class(['col-md-5'])>
                <h2 @class(['fw-bold'])>All Available Jobs</h2>
            </div>
            <div @class(['col-md-7'])>
                <input wire:model.live.debounce.300ms="search" type="search"
                    @class(['form-control']) placeholder="Search jobs...">
            </div>
        </div>

        <div class="row g-4 pt-5">
            @forelse ($jobs as $job)
                <div @class(['col-md-4'])>
                    <div @class(['card', 'shadow-sm']) @style(['height: 200px;'])>
                        <div @class(['card-body', 'text-secondary', 'd-flex', 'flex-column', 'h-100', 'overflow-hidden'])>
                            <h5 @class(['card-title', 'text-dark'])>{{ $job->job_title }}</h5>

                            <div @class(['d-flex', 'gap-3'])>
                                <p @class(['p-1', 'bg-body-tertiary', 'rounded'])>{{ $job->job_type }}</p>
                                <p @class(['p-1', 'bg-body-tertiary', 'rounded'])>{{ $job->job_arrangement }}</p>
                            </div>

                            <p @class(['card-text', 'flex-grow-1', 'overflow-hidden'])>
                                {{ $job->job_description }}
                            </p>

                            <a href="{{ route('job-details', ['id' => $job->id]) }}"
                            @class(['mt-auto', 'text-primary', 'text-decoration-underline'])>
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div @class([
                    'd-flex',
                    'justify-content-center',
                    'align-items-center',
                    'text-muted'
                ]) style="min-height: 300px; width: 100%;">
                    No Jobs Found
                </div>
            @endforelse
        </div>

        <div @class(['pt-5'])>
            {{ $jobs->links() }}
        </div>

    </div>
</div>

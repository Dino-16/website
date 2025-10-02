<div @class(['p-5'])>
    {{-- Title --}}
    <h2 @class(['mb-5'])>
        Application Form - <span @style(['color: #213A5C;'])>{{ $job->job_title }}</span>
    </h2>

    {{-- Success --}}
    <x-alert-success />

    <div @class(['container'])>
        {{-- Form --}}
        <form wire:submit.prevent="submitApplication">
            <div @class(['row'])>

                {{-- Job Name --}}
                <x-text-input wire:model="job" type="hidden" />

                {{-- Description Title --}}
                <h3 @class(['mb-3'])>Name</h3>

                {{-- Applicant Last Name --}}
                <div @class(['col-md-3', 'mb-3'])>
                    <div>
                        <x-input-label for="last-name" :value="__('Last Name')" />
                        <x-text-input wire:model="applicantLastName" type="text" id="last-name" required />
                        <x-input-error field="applicantLastName" />
                    </div>
                </div>

                {{-- Applicant First Name --}}
                <div @class(['col-md-3', 'mb-3'])>
                    <div>
                        <x-input-label for="first-name" :value="__('First Name')" />
                        <x-text-input wire:model="applicantFirstName" type="text" id="first-name" required />
                        <x-input-error field="applicantFirstName" />
                    </div>
                </div>

                {{-- Applicant Middle Name --}}
                <div @class(['col-md-3', 'mb-3'])>
                    <div>
                        <x-input-label for="middle-name" :value="__('Middle Name')" />
                        <x-text-input wire:model="applicantMiddleName" type="text" id="middle-name" required />
                        <x-input-error field="applicantMiddleName" />
                    </div>
                </div>

                {{-- Applicant Suffix Name --}}
                <div @class(['col-md-3', 'mb-3'])>
                    <div>
                        <x-input-label for="suffix-name" :value="__('Suffix')" />
                        <x-text-input wire:model="applicantSuffixName" type="text" id="suffix-name" />
                        <x-input-error field="applicantSuffixName" />
                    </div>
                </div>

                {{-- Description Title --}}
                <h3 @class(['mb-3'])>Current Address</h3>

                {{-- Applicant Address --}}
                <div @class(['col-md-12', 'mb-3'])>
                    <x-input-label for="applicant-address" :value="__('Full Address')" />
                    <x-text-input wire:model="applicantAddress" type="text" id="applicant-address" required />
                    <x-input-error field="applicantAddress" />
                </div>

                {{-- Description Title --}}
                <h3 @class(['mb-3'])>Contact Information</h3>

                {{-- Applicant Email --}}
                <div @class(['col-md-6', 'mb-3'])>
                    <x-input-label for="applicant-email" :value="__('Email')" />
                    <x-text-input wire:model="applicantEmail" type="email" id="applicant-email" required />
                    <x-input-error field="applicantEmail" />
                </div>

                {{-- Applicant Phone --}}
                <div @class(['col-md-6', 'mb-3'])>
                    <x-input-label for="applicant-phone" :value="__('Phone Number')" />
                    <x-text-input wire:model="applicantPhone" type="number" id="applicant-phone" required />
                    <x-input-error field="applicantPhone" />
                </div>

                {{-- Description Title --}}
                <h3 @class(['mb-3'])>Upload a Resume</h3>

                <div @class(['col-md-12', 'mb-3'])>
                    <label for="resume" @class(['w-100'])>
                        <input 
                            wire:model="applicantResumeFile" 
                            type="file" 
                            accept=".pdf,.doc,.docx" 
                            id="resume" 
                            required 
                            @class(['d-none']) 
                        />
                        <div @class(['d-flex', 'flex-column', 'justify-content-center', 'align-items-center', 'p-5', 'border', 'rounded', 'bg-white', 'text-center']) @style(['cursor' => 'pointer', 'height' => '120px'])>
                            <i @class(['bi', 'bi-cloud-upload', 'fs-1', 'text-secondary', 'mb-2'])></i>
                            <span @class(['text-muted', 'pb-1'])>Upload your resume here</span>
                        </div>
                    </label>

                    <x-input-error field="applicantResumeFile" />

                    <div @class(['mt-3'])>
                        <div wire:loading.delay wire:target="applicantResumeFile" class="mt-3 text-success" style="font-size: 1rem;">
                            <span class="spinner-border text-success" role="status" style="vertical-align: middle; display: inline-block;">
                                <span class="visually-hidden">Loading...</span>
                            </span>
                            <span style="vertical-align: middle; display: inline-block; margin-left: 8px;">
                                Uploading . . . . .
                            </span>
                        </div>
                    </div>

                    @if ($applicantResumeFile)
                        <div class="text-muted small mt-2">
                            Selected file: {{ $applicantResumeFile->getClientOriginalName() }}
                        </div>
                    @endif
                </div>

                <div wire:loading.delay wire:target="save" class="text-center text-success" style="font-size: 1rem;">
                    <span class="spinner-border text-success" role="status" style="vertical-align: middle; display: inline-block;">
                        <span class="visually-hidden">Loading...</span>
                    </span>
                    <span style="vertical-align: middle; display: inline-block; margin-left: 8px;">
                        Sending . . . . .
                    </span>
                </div>

                {{-- Terms Agreement --}}
                <div class="col-md-12 mb-4">
                    <div class="form-check">
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            id="agreed-to-terms" 
                            wire:model="agreedToTerms"
                        >
                        <label class="form-check-label" for="agreed-to-terms">
                            I agree to the <a href="#" class="text-decoration-underline">terms and conditions</a>.
                        </label>
                        @error('agreedToTerms') <p class="text-danger ">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Submit Button --}}
                <div @class(['text-end'])>
                    <x-button-primary type="submit">Submit</x-button-primary>
                </div>

            </div>
        </form>
    </div>
</div>
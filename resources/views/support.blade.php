@extends('layout')

@section('content')
<div class="container py-5 text-light">

    <div class="text-center mb-5">
        <h1 class="fw-semibold mb-1">
            {{ __('support.title') }}
        </h1>
        <p style="color:#9ca3af;">
            {{ __('support.subtitle') }}
        </p>
    </div>

    <div class="mb-5">
        <h3 class="fw-semibold mb-4">
            {{ __('support.faq_title') }}
        </h3>

        <div class="accordion accordion-flush" id="faqAccordion">

            <div class="accordion-item mb-3 rounded"
                 style="background:#181a1b; border:1px solid rgba(255,255,255,0.08);">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed bg-transparent text-white fw-medium px-4 py-3"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq1">
                        {{ __('support.faq1_q') }}
                    </button>
                </h2>
                <div id="faq1" class="accordion-collapse collapse">
                    <div class="accordion-body px-4 pb-4"
                         style="color:#d1d5db; line-height:1.7;">
                        {{ __('support.faq1_a') }}
                    </div>
                </div>
            </div>

            <div class="accordion-item mb-3 rounded"
                 style="background:#181a1b; border:1px solid rgba(255,255,255,0.08);">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed bg-transparent text-white fw-medium px-4 py-3"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq2">
                        {{ __('support.faq2_q') }}
                    </button>
                </h2>
                <div id="faq2" class="accordion-collapse collapse">
                    <div class="accordion-body px-4 pb-4"
                         style="color:#d1d5db; line-height:1.7;">
                        {{ __('support.faq2_a') }}
                    </div>
                </div>
            </div>

            <div class="accordion-item mb-3 rounded"
                 style="background:#181a1b; border:1px solid rgba(255,255,255,0.08);">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed bg-transparent text-white fw-medium px-4 py-3"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq3">
                        {{ __('support.faq3_q') }}
                    </button>
                </h2>
                <div id="faq3" class="accordion-collapse collapse">
                    <div class="accordion-body px-4 pb-4"
                         style="color:#d1d5db; line-height:1.7;">
                        {{ __('support.faq3_a') }}
                    </div>
                </div>
            </div>

            <div class="accordion-item rounded"
                 style="background:#181a1b; border:1px solid rgba(255,255,255,0.08);">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed bg-transparent text-white fw-medium px-4 py-3"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq4">
                        {{ __('support.faq4_q') }}
                    </button>
                </h2>
                <div id="faq4" class="accordion-collapse collapse">
                    <div class="accordion-body px-4 pb-4"
                         style="color:#d1d5db; line-height:1.7;">
                        {{ __('support.faq4_a') }}
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="mt-5">
        <h3 class="fw-semibold mb-3">
            {{ __('support.contact_title') }}
        </h3>

        <div class="p-4 rounded"
             style="background:#111213; border:1px solid rgba(255,255,255,0.1);">
            <p class="mb-3" style="color:#d1d5db;">
                <span class="text-white fw-medium">Email</span><br>
                wheelers@gmail.com
            </p>
            <p class="mb-0" style="color:#d1d5db;">
                <span class="text-white fw-medium">Social</span><br>
                @wheelers_official
            </p>
        </div>
    </div>

</div>
@endsection

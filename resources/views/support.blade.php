@extends('layout')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold">{{ __('support.title') }}</h1>
        <p class="mt-2 text-secondary">{{ __('support.subtitle') }}</p>
    </div>

    <div class="mb-4">
        <h3 class="fw-semibold mb-3">{{ __('support.faq_title') }}</h3>
        <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                        {{ __('support.faq1_q') }}
                    </button>
                </h2>
                <div id="faq1" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        {{ __('support.faq1_a') }}
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                        {{ __('support.faq2_q') }}
                    </button>
                </h2>
                <div id="faq2" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        {{ __('support.faq2_a') }}
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                        {{ __('support.faq3_q') }}
                    </button>
                </h2>
                <div id="faq3" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        {{ __('support.faq3_a') }}
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                        {{ __('support.faq4_q') }}
                    </button>
                </h2>
                <div id="faq4" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        {{ __('support.faq4_a') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h3 class="fw-semibold mb-3">{{ __('support.contact_title') }}</h3>
        <div class="border rounded p-4 shadow-sm">
            <p class="mb-2"><strong>Email:</strong> wheelers@gmail.com</p>
            <p class="mb-0"><strong>Socials:</strong> @wheelers_official</p>
        </div>
    </div>
</div>
@endsection
@extends('layout')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold">Support</h1>
        <p class="mt-2 text-secondary">What can we help?</p>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <div class="input-group shadow-sm">
                <input type="text" class="form-control form-control-lg" placeholder="Question / Search bar">
                <button class="btn btn-outline-secondary px-4" type="button">Q</button>
            </div>
        </div>
    </div>

    <div class="mb-4">
        <h3 class="fw-semibold mb-3">Frequently Ask</h3>
        <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                        How do I update Wheelers?
                    </button>
                </h2>
                <div id="faq1" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        Wheelers provides automatic updates, so your game should update on its own whenever a new version is released. If it doesn’t update automatically, try restarting your device or checking your internet connection.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                        Why is my game running slowly?
                    </button>
                </h2>
                <div id="faq2" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        Slow performance may be caused by low storage, weak internet, or outdated hardware. Try closing unused apps, clearing storage, or lowering in-game graphics settings.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                        Can I play Wheelers with friends?
                    </button>
                </h2>
                <div id="faq3" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        Yes! Wheelers supports multiplayer. Go to the “Multiplayer” menu, invite your friends, or join public lobbies to race together.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                        The game crashed. What should I do?
                    </button>
                </h2>
                <div id="faq4" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        Restart the game and ensure your system meets the minimum requirements. If the issue continues, reinstall the game or contact support using the contacts below.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h3 class="fw-semibold mb-3">Contact</h3>
        <div class="border rounded p-4 shadow-sm">
            <p class="mb-2"><strong>Email:</strong> wheelers@gmail.com</p>
            <p class="mb-0"><strong>Socials:</strong> @wheelers_official</p>
        </div>
    </div>
</div>
@endsection
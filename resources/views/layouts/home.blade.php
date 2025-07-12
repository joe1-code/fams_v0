@extends('backend.general.main', ['activePage' => 'table', 'title' => 'Family Management System (FAMS)'])

@push('css')
<style>
    th {
        background-color: #e3f2fd;
    }

    .over15color {
        background-color: #e6771c;
    }

    .incidentMonth {
        background-color: #e3f2fd;
    }

    /*Accordion Custom Styling*/
    .custom-accordion .accordion-item {
        background-color: whitesmoke;
        border: none;
        margin-bottom: 10px;
        border-radius: 0;
    }

    .custom-accordion .accordion-header {
        border-top: 4px solid transparent;
        /* Default transparent line */
        padding-top: 0.5rem;
    }

    .custom-accordion .accordion-button {
        background-color: whitesmoke;
        color: #000;
        font-weight: 600;
        text-transform: uppercase;
        border: none;
        box-shadow: none;
        padding: 1rem 1.25rem;
        transition: all 0.3s ease;
    }

    .custom-accordion .accordion-button:not(.collapsed) {
        background-color: whitesmoke;
        color: #000;
    }

    .custom-accordion .accordion-button:focus {
        box-shadow: none;
    }

    .custom-accordion .accordion-body {
        background-color: #fff;
        padding: 1.25rem;
        font-size: 1rem;
    }

    /* Add green line only when accordion item is active */
    .custom-accordion .accordion-button:not(.collapsed) {
        border-top: 4px solid #8CC63F;
        /* Green line appears only on active accordion */
    }

    .custom-accordion .accordion-button.collapsed {
        border-top: 4px solid transparent;
        /* Keep line transparent when collapsed */
    }

    .carousel-inner img {
        height: 480px;
        object-fit: cover;
        object-position: center;
    }
</style>
@endpush

@section('content')
@php
$active = $memberData->where('active', 1)->count();
$inactive = $memberData->where('active', 0)->count();
@endphp

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Welcome.</h4>
                <div class="row">
                    <div class="row justify-content-center px-4">

                    </div>

                    <div class="container my-5">
                        <div class="p-4 rounded" style="background-color: #EBF0F6;">
                            <div class="row align-items-start">

                                <!-- Carousel Left -->
                                <div class="col-md-5">
                                    <div id="featureCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="{{ asset('assets/images/chair_profile.jpeg') }}" class="d-block w-100" alt="chairperson profile">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{ asset('assets/images/secretary_profile.jpeg') }}" class="d-block w-100" alt="secretary profile">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{ asset('assets/images/accountant_profile.jpeg') }}" class="d-block w-100" alt="accountant profile">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Accordion Right -->
                                <div class="col-md-7">
                                    <div class="accordion custom-accordion" id="featureAccordion">

                                        <!-- Accordion Item 1 -->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne" data-slide-to="0">
                                                    👤CHAIRPERSON : {{ $chairperson }}
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#featureAccordion">
                                                <div class="accordion-body">
                                                    <em>
                                                        "As your Chairperson, I am committed to guiding our family contribution system with transparency, unity, and vision. 
                                                        Together, we are building a strong foundation for future generations. Let’s keep supporting each other and growing together."
                                                        <br><br>
                                                        – <b>{{ $chairperson }}</b>
                                                    </em>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Accordion Item 2 -->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingTwo">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                    aria-expanded="false" aria-controls="collapseTwo" data-slide-to="1">
                                                    🖊️ GENERAL SECRETARY : {{ $secretary }}
                                                </button>
                                            </h2>
                                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#featureAccordion">
                                                <div class="accordion-body">
                                                    <em>
                                                        "I ensure every record, meeting, and plan reflects our shared purpose. Communication and coordination are the heartbeat of this system, 
                                                         and I’m here to keep us informed, aligned, and progressing as one family."
                                                         <br><br>
                                                        – <b>{{ $secretary }}</b>
                                                    </em>                                                
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Accordion Item 3 -->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingThree">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                    aria-expanded="false" aria-controls="collapseThree" data-slide-to="2">
                                                    💰 ACCOUNTANT : {{ $accountant }}
                                                </button>
                                            </h2>
                                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#featureAccordion">
                                                <div class="accordion-body">
                                                    <em>
                                                        "Every coin contributed is a seed for our family's strength. I take pride in managing our finances with integrity, accuracy, and accountability. 
                                                        Your trust means everything."
                                                        <br><br>
                                                        – <b>{{ $accountant }}</b>

                                                    </em>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="computation-group">
                            <table class="table table-bordered text-center" style="background-color: #e3f2fd;">
                                <thead>
                                    <tr>
                                        <th>Full Names</th>
                                        <th>Phone</th>
                                        <th>Region</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($memberData as $data)
                                    <tr class="text-left">
                                        <td>{{ $data->firstname . ' ' . $data->middlename . ' ' . $data->lastname }}</td>
                                        <td class="text-end">{{ $data->phone }}</td>
                                        <td class="text-center">{{ $data->region_name }}</td>
                                        <td class="text-end">
                                            <button class="btn btn-secondary" style="background-color: white; color: black;">
                                                <i class="fas fa-pencil-alt text-dark"></i>
                                                {{ $data->active ? 'Deactivate' : 'Activate' }}
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th colspan="4" style="background-color: #e3f2fd;">REGISTERED MEMBERS</th>
                                </tr>
                                <tr>
                                    <th style="background-color: green;">Active</th>
                                    <th style="background-color: #e6771c;">Inactive</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $active }}</td>
                                    <td>{{ $inactive }}</td>
                                </tr>
                            </tbody>
                        </table>

                        @foreach(['CHAIRPERSON', 'GENERAL SECRETARY', 'ACCOUNTANT'] as $role)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="4" class="text-center" style="background-color: #e3f2fd;">{{ $role }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Full Names</th>
                                    <td>{{ $data->firstname . ' ' . $data->middlename . ' ' . $data->lastname }}</td>
                                </tr>
                                <tr>
                                    <th>Age</th>
                                    <td>29</td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>Male</td>
                                </tr> {{-- Replace with actual gender --}}
                            </tbody>
                        </table>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const viewDetailsButtons = document.querySelectorAll('.view-details-btn');

        viewDetailsButtons.forEach(button => {
            button.addEventListener('click', function() {
                const memberId = this.getAttribute('data-id');
                const memberName = this.getAttribute('data-name');

                document.getElementById('member-id').textContent = memberId;
                document.getElementById('member-name').textContent = memberName;
                document.getElementById('edit-member-id').value = memberId;
            });
        });
    });
</script>


<script>
    // Sync: Accordion → Carousel
    document.querySelectorAll('[data-slide-to]').forEach(button => {
        button.addEventListener('click', function () {
            const slideIndex = parseInt(this.getAttribute('data-slide-to'));
            const carousel = document.querySelector('#featureCarousel');
            if (carousel) {
                const bsCarousel = bootstrap.Carousel.getOrCreateInstance(carousel);
                bsCarousel.to(slideIndex);
            }
        });
    });

    // Sync: Carousel → Accordion
    const carousel = document.querySelector('#featureCarousel');
    if (carousel) {
        carousel.addEventListener('slide.bs.carousel', function (e) {
            const newIndex = e.to;

            // Match the button with data-slide-to index
            const matchingButton = [...document.querySelectorAll('[data-slide-to]')]
                .find(btn => parseInt(btn.getAttribute('data-slide-to')) === newIndex);

            if (matchingButton) {
                const target = matchingButton.getAttribute('data-bs-target');
                const collapseEl = document.querySelector(target);

                if (collapseEl) {
                    // First collapse all others
                    document.querySelectorAll('.accordion-collapse.show').forEach(openEl => {
                        if (openEl !== collapseEl) {
                            bootstrap.Collapse.getOrCreateInstance(openEl).hide();
                        }
                    });

                    // Then open the correct one
                    bootstrap.Collapse.getOrCreateInstance(collapseEl).show();
                }
            }
        });
    }
</script>

<script>
    const featureCarouselEl = document.getElementById('featureCarousel');
    const bsFeatureCarousel = bootstrap.Carousel.getOrCreateInstance(featureCarouselEl);

    // Pause when mouse enters carousel or accordion
    ['mouseenter'].forEach(event => {
        featureCarouselEl.addEventListener(event, () => {
            bsFeatureCarousel.pause();
        });

        document.getElementById('featureAccordion').addEventListener(event, () => {
            bsFeatureCarousel.pause();
        });
    });

    // Resume when mouse leaves carousel or accordion
    ['mouseleave'].forEach(event => {
        featureCarouselEl.addEventListener(event, () => {
            bsFeatureCarousel.cycle();
        });

        document.getElementById('featureAccordion').addEventListener(event, () => {
            bsFeatureCarousel.cycle();
        });
    });
</script>

@endpush
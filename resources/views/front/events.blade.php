
<section id="upcoming-events">
    <div class="container">
        <div class="row">
                
                <div class="col-md-8">
                        <div class="text-center">
                                <h2 class="heading-secondary" data-aos="zoom-in-down" data-aos-offset="300"data-aos-delay ="100" data-aos-easing="ease-in-sine">Calendar of Activities</h2>
                            </div>
                    <div class="card" data-aos="zoom-out-down" data-aos-offset="300"data-aos-delay ="100" data-aos-easing="ease-in-sine">
                        <div class="card-body">
                            {!! $calendar->calendar() !!}
                        
                        </div>
                    </div>
                   
                </div>

                <div class="col-md-4">
                        @include('front.quick-links')
                </div>

        </div>
    </div>

</section>



@section('script')
{!! $calendar->script() !!}
@endsection

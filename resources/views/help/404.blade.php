@extends ('layouts.master') @section ('title', '404') @section ('content')

<section class="four_o_four_area section--padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center">
                    <img src="{{ URL::to('/') }}/images/404.png" alt="404 page">
                    <div class="not_found">
                        <h3>Oops! Page Not Found</h3>
                        <a href="{{ route('home') }}" class="btn btn--round btn--default">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
</section>

@endsection
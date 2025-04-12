<div class="background {{ $animated ? 'animated' : 'static' }}">
        <div>
            @if ($animated)
                <div class="animated-background">
                    <!-- Add animated background content here -->

                    <img src="{{ asset('images/background-animation.jpg') }}"
                         alt="Animated Background"
                    >
                </div>
            @else
                <div class="static-background">
                    <!-- Add static background content here -->

                    <img src="{{ asset('images/background-static.jpg') }}"
                         alt="Static Background"
                    >
                </div>
            @endif
        </div>





</div>

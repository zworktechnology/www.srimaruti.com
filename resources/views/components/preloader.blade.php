<!-- Preloader -->
<div class="preloader ">
    <button class="as-btn style4 preloaderCls" hidden>Cancel Preloader </button>
    <div class="preloader-inner">
        <div class="loader">
            <div class="loader-ring"></div>
            <div class="rocket-wrapper">
                <div class="trail-wrapper">
                    <img src="{{ asset('assets/frontend/img/icon/trail.svg') }}" alt="" class="trail">
                </div>
                <img src="{{ asset('assets/frontend/img/icon/small-rocket.svg') }}" alt="" class="rocket">
            </div>
            <div class="clouds-wrapper">
                <svg class="clouds" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 92 90.83">
                    <defs>
                        <clippath id="clip-path" transform="translate(1.75)">
                            <circle cx="42.5" cy="42.5" r="42.5" fill="none"></circle>
                        </clippath>
                        <filter id="goo" color-interpolation-filters="sRGB">
                            <fegaussianblur in="SourceGraphic" stddeviation="6" result="blur"></fegaussianblur>
                            <fecolormatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -11" result="goo"></fecolormatrix>
                            <feblend in="SourceGraphic" in2="goo"></feblend>
                        </filter>
                        <filter id="blurMe">
                            <fegaussianblur in="SourceGraphic" stddeviation="0.9"></fegaussianblur>
                        </filter>
                    </defs>
                    <g clip-path="url(#clip-path)" fill="#eef2f3" filter="url(#goo)">
                        <g class="clouds-wrapper" filter="url(#blurMe)">
                            <ellipse class="cloud" cx="40" cy="61.83" rx="7" ry="7"></ellipse>
                            <ellipse class="cloud" cx="81" cy="68.83" rx="8" ry="8"></ellipse>
                            <ellipse class="cloud" cx="6" cy="63.83" rx="6" ry="6"></ellipse>
                            <ellipse class="cloud" cx="15" cy="70.83" rx="11" ry="11"></ellipse>
                            <ellipse class="cloud" cx="65" cy="74.83" rx="11" ry="11"></ellipse>
                            <ellipse class="cloud" cx="48" cy="71.83" rx="14" ry="14"></ellipse>
                            <ellipse class="cloud" cx="34" cy="75.83" rx="16" ry="16"></ellipse>
                        </g>
                    </g>
                </svg>
            </div>
        </div>
    </div>
</div>

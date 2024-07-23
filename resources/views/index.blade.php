@extends('layouts.master')

@section('title', 'Default')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
<<<<<<< Updated upstream
=======
    <style>
        .app:hover {
            -webkit-box-shadow: 0px 0px 57px -8px rgba(145, 140, 254, 1);
            -moz-box-shadow: 0px 0px 57px -8px rgba(145, 140, 254, 1);
            box-shadow: 0px 0px 57px -8px rgba(145, 140, 254, 1);
        }

        .box {
            border-radius: 19px;
            background: #ffffff;
            box-shadow: 21px 21px 42px #dedede,
                -21px -21px 42px #ffffff;
        }
    </style>
>>>>>>> Stashed changes
@endsection

@section('breadcrumb-title')
    <h3>Default</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Default</li>
@endsection

@section('content')
<<<<<<< Updated upstream
<div class="container-fluid">
    <div class="row starter-main">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Kick start your project development !</h5>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="fa fa-spin fa-cog"></i></li>
                            <li><i class="view-html fa fa-code"></i></li>
                            <li><i class="icofont icofont-maximize full-card"></i></li>
                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                            <li><i class="icofont icofont-refresh reload-card"></i></li>
                            <li><i class="icofont icofont-error close-card"></i></li>
                        </ul>
=======
    <div class="container-fluid">

        <div class="container">

            <div class="row">

                <div class="col-sm-12 col-md-6 mb-3">
                    <div class="card profile-box">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <div class="greeting-user">
                                        <h4 class="f-w-600">Welcome {{ Auth::user()->first_name }}</h4>
                                        <p>Request budget and track your expenses here!</p>
                                        <div class="whatsnew-btn"><a class="btn btn-outline-white"
                                                href="{{ route('expenses') }}">Expenses</a></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="clockbox">
                                        <svg id="clock" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 600">
                                            <g id="face">
                                                <circle class="circle" cx="300" cy="300" r="253.9"></circle>
                                                <path class="hour-marks"
                                                    d="M300.5 94V61M506 300.5h32M300.5 506v33M94 300.5H60M411.3 107.8l7.9-13.8M493 190.2l13-7.4M492.1 411.4l16.5 9.5M411 492.3l8.9 15.3M189 492.3l-9.2 15.9M107.7 411L93 419.5M107.5 189.3l-17.1-9.9M188.1 108.2l-9-15.6">
                                                </path>
                                                <circle class="mid-circle" cx="300" cy="300" r="16.2"></circle>
                                            </g>
                                            <g id="hour">
                                                <path class="hour-hand" d="M300.5 298V142"></path>
                                                <circle class="sizing-box" cx="300" cy="300" r="253.9"></circle>
                                            </g>
                                            <g id="minute">
                                                <path class="minute-hand" d="M300.5 298V67"></path>
                                                <circle class="sizing-box" cx="300" cy="300" r="253.9"></circle>
                                            </g>
                                            <g id="second">
                                                <path class="second-hand" d="M300.5 350V55"></path>
                                                <circle class="sizing-box" cx="300" cy="300" r="253.9">
                                                </circle>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="badge f-10 p-0" id="txt"></div>
                                </div>
                            </div>
                            <div class="cartoon"><img class="img-fluid"
                                    src="{{ asset('assets/images/dashboard/cartoon.svg') }}" alt="vector women with leptop">
                            </div>
                        </div>
>>>>>>> Stashed changes
                    </div>
                </div>
                <div class="card-body">
                    <p>Getting start with your project custom requirements using a ready template which is quite difficult and time taking process, Cuba Admin provides useful features to kick start your project development with no efforts !</p>
                    <ul>
                        <li>
                            <p>Cuba Admin provides you getting start pages with different layouts, use the layout as per your custom requirements and just change the branding, menu & content.</p>
                        </li>
                        <li>
                            <p>Every components in Cuba Admin are decoupled, it means use only components you actually need! Remove unnecessary and extra code easily just by excluding the path to specific SCSS, JS file.</p>
                        </li>
                        <li>
                            <p>It use PUG as template engine to generate pages and whole template quickly using node js. Save your time for doing the common changes for each page (i.e menu, branding and footer) by generating template with pug.</p>
                        </li>
                    </ul>
                    <div class="code-box-copy">
                        <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                        <pre><code class="language-html" id="example-head">&lt;!-- Cod Box Copy begin --&gt;
&lt;p&gt;Getting start with your project custom requirements using a ready template which is quite difficult and time taking process, Cuba Admin provides useful features to kick start your project development with no efforts !&lt;/p&gt;
&lt;ul&gt;
&lt;li&gt;&lt;p&gt;Cuba Admin provides you getting start pages with different layouts, use the layout as per your custom requirements and just change the branding, menu & content.&lt;/p&gt;&lt;/li&gt;
&lt;li&gt;&lt;p&gt;Every components in Cuba Admin are decoupled, it means use only components you actually need! Remove unnecessary and extra code easily just by excluding the path to specific SCSS, JS file.&lt;/p&gt;&lt;/li&gt;
&lt;li&gt;&lt;p&gt;It use PUG as template engine to generate pages and whole template quickly using node js. Save your time for doing the common changes for each page (i.e menu, branding and footer) by generating template with pug.&lt;/p&gt;&lt;/li&gt;
&lt;/ul&gt;
&lt;!-- Cod Box Copy end --&gt;</code></pre>
                    </div>
                </div>
            </div>
        </div>
<<<<<<< Updated upstream
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>What is starter kit ?</h5>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="fa fa-spin fa-cog"></i></li>
                            <li><i class="view-html fa fa-code"></i></li>
                            <li><i class="icofont icofont-maximize full-card"></i></li>
                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                            <li><i class="icofont icofont-refresh reload-card"></i></li>
                            <li><i class="icofont icofont-error close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <p>Starter kit is a set of pages with different layouts, useful for your next project to start development process from scratch with no time.</p>
                    <ul>
                        <li>
                            <p>Each layout includes basic components only.</p>
                        </li>
                        <li>
                            <p>Select your choice of layout from starter kit, customize it with optional changes like colors and branding, add required dependency only.</p>
                        </li>
                        <li>
                            <p>Using template engine to generate whole template quickly with your selected layout and other custom changes. </p>
                        </li>
                    </ul>
                    <div class="code-box-copy">
                        <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head1" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                        <pre><code class="language-html" id="example-head1">&lt;!-- Cod Box Copy begin --&gt;
&lt;p&gt;Starter kit is a set of pages with different layouts, useful for your next project to start development process from scratch with no time. &lt;/p&gt;
&lt;ul&gt;
&lt;li&gt;&lt;p&gt;Each layout includes basic components only.&lt;/p&gt;&lt;/li&gt;
&lt;li&gt;&lt;p&gt;Select your choice of layout from starter kit, customize it with optional changes like colors and branding, add required dependency only.&lt;/p&gt;&lt;/li&gt;
&lt;li&gt;&lt;p&gt;Using template engine to generate whole template quickly with your selected layout and other custom changes.&lt;/p&gt;&lt;/li&gt;
&lt;/ul&gt;
&lt;!-- Cod Box Copy end --&gt;</code></pre>
                    </div>
=======

        <div class="card container col-12 text-white text-center">
            <div class="card-header">
                <h2 class="text-dark mb-3">Apps</h2>

                <div class="row justify-content-center">
                    <a href="{{ route('expenses') }}"
                        class="box col col-3 col-md-2 col-sm-12 apps text-center d-flex flex-column p-5 rounded m-2 app">
                        <img src="{{ asset('assets/images/icons/money-bag.png') }}" alt="img here"
                            style="height: auto; width:70px;" class="mx-auto pop">
                        <span>Budget Expenses</span>
                    </a>
                    <a href="{{ route('expenses') }}"
                        class="box col col-3 col-md-2 col-sm-12 apps text-center d-flex flex-column p-5 rounded m-2 app">
                        <img src="{{ asset('assets/images/icons/budget.png') }}" alt="img here"
                            style="height: auto; width:70px;" class="mx-auto pop box">
                        <span>Expense Track</span>
                    </a>
                    <a href="{{ route('Ai') }}"
                        class="box col col-3 col-md-2 col-sm-12 apps text-center d-flex flex-column p-5 rounded m-2 app">
                        <img src="{{ asset('assets/images/icons/faq.png') }}" alt="img here"
                            style="height: auto; width:70px;" class="mx-auto pop">
                        <span>Ask AI</span>
                    </a>
                    <a href="{{ route('map') }}"
                        class="box col col-3 col-md-2 col-sm-12 apps text-center d-flex flex-column p-5 rounded m-2 app">
                        <img src="{{ asset('assets/images/icons/map.png') }}" alt="img here"
                            style="height: 100px; width:70px;" class="mx-auto pop">
                        <span>Maps</span>
                    </a>
                    <a href="{{ route('currency') }}"
                        class="box col col-3 col-md-2 col-sm-12 apps text-center d-flex flex-column p-5 rounded m-2 app">
                        <img src="{{ asset('assets/images/icons/exchange-rate.png') }}" alt="img here"
                            style="height: 100px; width:70px;" class="mx-auto pop">
                        <span>Currency Converter</span>

                    </a>
                    <a href="{{ route('translator') }}"
                        class="box col col-3 col-md-2 col-sm-12 apps text-center d-flex flex-column p-5 rounded m-2 app">
                        <img src="{{ asset('assets/images/icons/translate.png') }}" alt="img here"
                            style="height: 100px; width:70px;" class="mx-auto pop">
                        <span>Translator</span>

                    </a>
                    {{-- <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModalCenter">Vertically centered</button> --}}
                    {{-- <div class="modal fade card" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenter" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <livewire:currency-convert />
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button"
                                        data-bs-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <a href="{{ route('Restaurant') }}"
                        class="box col col-3 col-md-2 col-sm-12 apps text-center d-flex flex-column p-5 rounded m-2 app">
                        <img src="{{ asset('assets/images/icons/restaurant.png') }}" alt="img here"
                            style="height: 100px; width:70px;" class="mx-auto pop">
                        <span>Find Restaurant</span>
                    </a>
                    <hr>
                    <div class="text-dark">
                        <h3>Quick Access</h3>
                        <p>Find your travel needs with google travel</p>
                    </div>


                    <a href="https://www.google.com/travel/flights"
                        class="box col col-3 col-md-2 col-sm-12 apps text-center d-flex flex-column p-5 rounded m-2 app">
                        <img src="{{ asset('assets/images/icons/flights.svg') }}" alt="img here"
                            style="height: 100px; width:70px;" class="mx-auto pop">
                        <span>Find Flights</span>
                    </a>
                    <a href="https://www.google.com/travel/hotels"
                        class="box col col-3 col-md-2 col-sm-12 apps text-center d-flex flex-column p-5 rounded m-2 app">
                        <img src="{{ asset('assets/images/icons/hotels.svg') }}" alt="img here"
                            style="height: 100px; width:70px;" class="mx-auto pop">
                        <span>Find Hotels</span>
                    </a>
                    <a href="https://www.google.com/travel/explore"
                        class="box col col-3 col-md-2 col-sm-12 apps text-center d-flex flex-column p-5 rounded m-2 app">
                        <img src="{{ asset('assets/images/icons/explores.svg') }}" alt="img here"
                            style="height: 100px; width:70px;" class="mx-auto pop">
                        <span>Explore</span>
                    </a>

>>>>>>> Stashed changes
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>How to use starter kit ?</h5>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="fa fa-spin fa-cog"></i></li>
                            <li><i class="view-html fa fa-code"></i></li>
                            <li><i class="icofont icofont-maximize full-card"></i></li>
                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                            <li><i class="icofont icofont-refresh reload-card"></i></li>
                            <li><i class="icofont icofont-error close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <p><span class="f-w-600">HTML</span></p>
                    <p>If you know just HTML, select your choice of layout from starter kit folder, customize it with optional changes like colors and branding, add required dependency only.</p>
                    <p><span class="f-w-600">PUG</span></p>
                    <p>To use PUG it required node.js and basic knowledge of using it. Using PUG as template engine to generate whole template quickly with your selected layout and other custom changes. To getting start with PUG usage & template generating process please refer template documentation.</p>
                    <div class="alert alert-primary inverse" role="alert"><i class="icon-info-alt"></i>
                        <h5>Tips!</h5>
                        <p>Hideable navbar option is available for fixed navbar with static navigation only. Works in top and bottom positions, single and multiple navbars.</p>
                    </div>
                    <div class="code-box-copy">
                        <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head2" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                        <pre><code class="language-html" id="example-head2">&lt;!-- Cod Box Copy begin --&gt;
&lt;p&gt;&lt;span class="f-w-600"&gt;HTML&lt;/span&gt;&lt;/p&gt;
&lt;p&gt;If you know just HTML, select your choice of layout from starter kit folder, customize it with optional changes like colors and branding, add required dependency only.&lt;/p&gt;
&lt;p&gt;&lt;span class="f-w-600"&gt;PUG&lt;/span&gt;&lt;/p&gt;
&lt;p&gt;To use PUG it required node.js and basic knowledge of using it. Using PUG as template engine to generate whole template quickly with your selected layout and other custom changes. To getting start with PUG usage & template generating process please refer template documentation.&lt;/p&gt;
&lt;div class="alert alert-primary inverse" role="alert"&gt;
&lt;i class="icon-info-alt"&gt;&lt;/i&gt;
&lt;h5&gt;Tips!&lt;/h5&gt;
&lt;p&gt;Hideable navbar option is available for fixed navbar with static navigation only. Works in top and bottom positions, single and multiple navbars.&lt;/p&gt;
&lt;/div&gt;
&lt;!-- Cod Box Copy end --&gt;</code></pre>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Simple Card</h5>
                </div>
                <div class="card-body">
                    <h6>HTML Ipsum Presents</h6>
                    <p><strong>Pellentesque habitant morbi tristique</strong> senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas
                        semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, <code>commodo vitae</code>, ornare sit amet, wisi. Aenean
                        fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. <a href="#">Donec non enim</a> in turpis pulvinar facilisis. Ut felis.
                    </p>
                    <h6>Header Level 2</h6>
                    <ol>
                        <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                        <li>Aliquam tincidunt mauris eu risus.</li>
                    </ol>
                    <div class="figure d-block">
                        <blockquote class="blockquote">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada
                                tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.
                            </p>
                        </blockquote>
                    </div>
                    <h4>Header Level<span> 3</span></h4>
                    <ul>
                        <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                        <li>Aliquam tincidunt mauris eu risus.</li>
                    </ul>
                    <pre>#header h1 a {
display: block;
width: 300px;
height: 80px;
}</pre>
                    <dl>
                        <dt>Definition list</dt>
                        <dd>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</dd>
                        <dt>Lorem ipsum dolor sit amet</dt>
                        <dd>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>With Header</h5>
                </div>
                <div class="card-body">
                    <h5>Content title</h5>
                    <p>Add a heading to card with <code>.card-header</code> class</p>
                    <p>You may also include any &lt;h1&gt;-&lt;h6&gt; with a <code>.card-header </code> & <code>.card-title</code> class to add heading.</p>
                    <p>Jelly beans sugar plum cheesecake cookie oat cake soufflé. Tart lollipop carrot cake sugar plum. Marshmallow wafer tiramisu jelly beans.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-no-border">
                    <h5>With Header & No Border</h5>
                </div>
                <div class="card-body">
                    <h5>Content title</h5>
                    <p>Add a heading to card with <code>.card-header </code> class & without header border<code>.border-bottom-0</code> class.</p>
                    <p>You may also include any &lt;h1&gt;-&lt;h6&gt; with a <code>.card-header </code> & <code>.card-title</code> class to add heading.</p>
                    <p>Gingerbread brownie sweet roll cheesecake chocolate cake jelly beans marzipan gummies dessert. Jelly beans sugar plum cheesecake cookie oat cake soufflé.</p>
                </div>
            </div>
        </div>
    </div>
</div>
    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';
    </script>
@endsection

@section('script')
@endsection

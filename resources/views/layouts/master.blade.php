@include('layouts.header')
    <div id="app">
    	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		  	<a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
		  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		    	<span class="navbar-toggler-icon"></span>
		  	</button>
		  	<div class="collapse navbar-collapse" id="collapsibleNavbar">
			    <ul class="navbar-nav">
			      	<li class="nav-item">
			        	<a class="nav-link" href="{{ url('/student') }}">Student</a>
			      	</li>
			      	<li class="nav-item">
			        	<a class="nav-link" href="{{ url('/subject') }}">Subject</a>
			      	</li>
			      	<li class="nav-item">
			        	<a class="nav-link" href="{{ url('/article') }}">Article</a>
			      	</li>    
			    </ul>

                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
		  	</div>  
		</nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
@include('layouts.footer')
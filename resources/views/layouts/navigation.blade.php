<nav x-data="{ open: false}" >

<style>
        /* Style for the button */
        .btn1 {
            position: absolute;
            top: 0;
            right: 0;
            margin-top: 10px; 
            margin-right: 20px; 
        }
    </style>
                    <div class="navbar navbar-expand-lg navbar-light bg-light">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')" class="btn btn-danger btn1"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
             </div>
        </div>
    </div>
</nav>

<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        @if(auth()->user()->image === null)
        <img src="{{ url('assets/site/img/user.png') }}" class="user-image" alt="Imagem do Usuário">
        <!-- Profile Image -->
        @else   
        <img src="{{ url('storage/users/'.auth()->user()->image) }}" alt="{{ auth()->user()->image}}" class="user-image" alt="Imagem do Usuário">
        @endif
        <span class="">{{ auth()->user()->nickname }}</span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            @if(auth()->user()->image === null)
            <img src="{{ url('assets/site/img/user.png') }}" class="img-circle" alt="Imagem do Usuário">
            <!-- Profile Image -->
            @else   
            <img src="{{ url('storage/users/'.auth()->user()->image) }}" alt="{{ auth()->user()->image}}" class="img-circle" alt="Imagem do Usuário">
            @endif
            
            <p>
                {{ auth()->user()->name }}
                <small>{{ auth()->user()->email }}</small>
            </p>
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="{{ route( 'profile' ) }}" class="btn btn-default btn-flat"><i class="fa fa-user-circle" aria-hidden="true"></i> Gerenciar Perfil</a>
            </div>
            <div class="pull-right">
                @if(config('adminlte.logout_method') == 'GET' || !config('adminlte.logout_method') && version_compare(\Illuminate\Foundation\Application::VERSION, '5.3.0', '<'))
                    <a href="{{ url(config('adminlte.logout_url', 'auth/logout')) }}" class="btn btn-default btn-flat">
                        <i class="fa fa-fw fa-sign-out"></i> {{ trans('adminlte::adminlte.log_out') }}
                    </a>
                @else
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">
                        <i class="fa fa-fw fa-sign-out"></i> {{ trans('adminlte::adminlte.log_out') }}
                    </a>
                    <form id="logout-form" action="{{ url(config('adminlte.logout_url', 'auth/logout')) }}" method="POST" style="display: none;">
                        @if(config('adminlte.logout_method'))
                            {{ method_field(config('adminlte.logout_method')) }}
                        @endif
                        {{ csrf_field() }}
                    </form>
                @endif
            </div>
        </li>
    </ul>
</li>
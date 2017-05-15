@unless(Auth::guest())
    @role('Student')
        <li><a href="{{ route('pelajar.aktiviti.index') }}">Aktiviti</a></li>
        <li><a href="{{ route('pelajar.hebahan.index') }}">Hebahan</a></li>
        <li><a href="{{ route('pelajar.transkrip.index') }}">Transkrip Kokurikulum</a></li>
    @endrole

    @role('Administrator')
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                Urus <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                <li><a href="{{ route('pentadbir.pelajar.index') }}">Pelajar</a></li>
                <li><a href="{{ route('pentadbir.pensyarah.index') }}">Pensyarah</a></li>
                <li><a href="{{ route('pentadbir.tadbir.index') }}">Pentadbir</a></li>
                <li><a href="{{ route('pentadbir.kelab.index') }}">Kelab</a></li>
            </ul>
        </li>
    @endrole

    @role('Lecturer')
        <li><a href="{{ route('pensyarah.aktiviti.index') }}">Aktiviti</a></li>
        <li><a href="{{ route('pensyarah.hebahan.index') }}">Hebahan</a></li>
    @endrole
@endunless

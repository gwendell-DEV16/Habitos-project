
<h1>
    Welcome to Our Site
</h1>

<p>
    Olá, {{ $name }}
</p>

<p>
    Seus hábitos são:
</p>

<ul>

    @foreach($habitos as $item)
    <li>
        {{ $item }}
    </li>
    @endforeach

</ul>

@auth
    <p>
        Você está logado
    </p>
@endauth

@guest
    <p>
        Você não está logado
    </p>
@endguest

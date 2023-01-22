<h1> oi {{$user->name}} </h1>
<p>
    <a href="{{url('nova-senha', ['token' => $token])}}">Clique aqui para recuperar sua senha</a>
</p>
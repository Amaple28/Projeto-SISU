<h1> oi {{$user->name}} </h1>
<p>
    <a href="{{url('nova-senha', ['id' => $user->id])}}">Clique aqui para recuperar sua senha</a>
</p>
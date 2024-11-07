<x-layout page='To-Do | Register'>

    <x-slot:btn>
        <a href="{{route('home.page')}}" class="btn btn-primary">
            Home
        </a>
        <a href="{{route('auth.login')}}" class="btn btn-primary">
            Entre
        </a>
    </x-slot:btn>

    <form class="shadow rounded p-3 mx-auto w-50" method="POST" id="register_form" action="{{route('auth.register_action')}}">
        @csrf
        <div class="mb-3">
            <label for="nome-input" class="form-label">Nome</label>
            <input name="name" type="text" class="form-control" id="nome-input" >
          </div>
        <div class="mb-3">
          <label for="email-input" class="form-label">Endereço de Email</label>
          <input name="email" type="email" class="form-control" id="email-input" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">Não iremos compartilhar seu email com ninguem.</div>
        </div>
        <div class="mb-3">
          <label for="senha-input" class="form-label">Senha</label>
          <input name="password" type="password" class="form-control" id="senha-input">
        </div>
        <div class="mb-3">
            <label for="senha-input-confirm" class="form-label">Confirmar Senha</label>
            <input name="password_confirmation" type="password" class="form-control" id="senha-input-confirm">
          </div>
        <button type="button" class="btn btn-primary" onclick="confirm_regeistration('register_form',['nome-input','email-input','senha-input','senha-input-confirm'])">Registrar-se</button>
      </form>
</x-layout>

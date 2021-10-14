@extends('home')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12   ">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}

                        </div>
                    @endif
                    <form action="{{ route('ciama.search') }}" method="post">
                        @csrf
                        <select name="setor" id="status">
                            <option value="">Setor</option>
                            <option value="TI">TI</option>
                            <option value="RH">RH</option>
                            <option value="Engenharia">Engenharia</option>
                        </select>
                        <select name="status" id="status">
                            <option value="">Status</option>
                            <option value="Pendente">Pendente</option>
                            <option value="Finalizado">Finalizado</option>
                        </select>
                        <input type="text" name="search" id="search" placeholder="Filtrar:">
                        <button type="submit">Filtrar</button>
                    </form>
                    <div class="container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Setor</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Concluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($chamados as $chamado)
                                    <tr>
                                        <th scope="row">{{ $chamado->id }}</th>
                                        <td>{{ $chamado->nome }}</td>
                                        <td>{{ $chamado->setor }}</td>
                                        <td>{{ $chamado->descricao }}</td>
                                        <td>
                                            {{ $chamado->status }}
                                        </td>
                                        <td>
                                            <a href="{{ route('ciama.show', $chamado->id) }}">Enviar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="row justify-content-center">
                        @if (isset($filters))
                            {{ $chamados->appends($filters)->links() }}
                        @else
                            {{ $chamados->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
                    <div class="container">
                        <form action="{{ route('ciama.update') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $chamados['id'] }}">
                            <div class="mb-2">
                                <label for="nome" class="form-label">Nome:</label>
                                <input type="text" class="form-control" id="nome" name="nome" value="{{ $chamados->nome }}" disabled>
                            </div>
                            <div class="mb-2">
                                <div class="form-group">
                                    <label for="setor">Informe seu setor:</label>
                                    <select class="form-control" id="setor" name="setor" disabled>
                                        <option>{{ $chamados->setor }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="descricao" class="form-label">Descrição:</label>
                                <textarea class="form-control" id="descricao" rows="4" name="descricao" disabled>{{ $chamados->descricao }}</textarea>
                            </div>
                            <div class="mb-2">
                                <select name="prioridade" id="prioridade" class="form-control">
                                    <option value="Normal">Normal</option>
                                    <option value="Mediana">Mediana</option>
                                    <option value="Alta">Alta</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <select name="categoria" id="prioridade" class="form-control">
                                    <option value="Impressora">Impressora</option>
                                    <option value="Hardware">Hardware</option>
                                    <option value="Software">Software</option>
                                    <option value="Rede">Redes</option>
                                    <option value="Sistema">Sistema</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <select name="tempo_chamado" id="prioridade" class="form-control">
                                    <option value="10m">Até 10m</option>
                                    <option value="30m">Até 30m</option>
                                    <option value="1h">Até 1h</option>
                                    <option value="3h">Até 3h</option>
                                    <option value="1d">Até 1d</option>
                                    <option value="2d">Até 2d</option>
                                    <option value="3d">Até 3d</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <button class="btn btn-primary" type="submit">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
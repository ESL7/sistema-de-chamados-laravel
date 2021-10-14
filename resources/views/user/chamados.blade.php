@extends('home')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Chamados') }}</div>
                <div class="card-body">
                    <form action="{{ route('ciama.store') }}" method="POST">
                        @csrf
                        <h1 class="text-center">Sistema de Chamados</h1>
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome">
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="setor">Informe seu setor:</label>
                                <select class="form-control" id="setor" name="setor">
                                    <option value="TI">TI</option>
                                    <option value="RH">RH</option>
                                    <option value="Engenharia">Engenharia</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição:</label>
                            <textarea class="form-control" id="descricao" rows="4" name="descricao"></textarea>
                        </div>
                        <button class="btn btn-secondary col-6 btn-block mx-auto" type="submit">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

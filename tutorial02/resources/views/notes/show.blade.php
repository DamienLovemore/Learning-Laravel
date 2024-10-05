@extends('layouts.layout')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Exibir Nota</h2>
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('notes.index') }}"><i class="fa fa-arrow-left"></i> Voltar</a>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nome:</strong> <br/>
                    {{ $note->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Conteudo:</strong> <br/>
                    {{ $note->content }}
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
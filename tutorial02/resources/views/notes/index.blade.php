@extends("layouts.layout")

@section("content")
    <div class="card mt-5">
        <h2 class="card-header">Exemplo CRUD Laravel</h2>
        <div class="card-body">
            @if (session("success"))
                <div class="alert alert-success" role="alert">{{ session("success") }}</div>
            @endif

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-success btn-sm" href="{{ route("notes.create") }}"><i class="fa fa-plus"></i> Criar Nova Anotação</a>
            </div>

            <table class="table table-bordered table-striped mt-4">
                <thead>
                    <tr>
                        <th width="80px">Num</th>
                        <th width="55px" class="pr-2">Nome</th>
                        <th>Conteúdo</th>
                        <th width="250px">Ação</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($notes as $note)
                        <tr>
                            <td>{{ ++$cont }}</td>
                            <td>{{ $note->name }}</td>
                            <td>{{ $note->content }}</td>
                            <td>
                                <form action="{{ route("notes.destroy", $note->id) }}" method="POST">
                                    <a class="btn btn-info btn-sm" href=""><i class="fa-solid fa-list"></i>Exibir</a>
                                    <a class="btn btn-primary btn-sm" href=""><i class="fa-solid fa-pen-to-square"></i>Editar</a>
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i>Apagar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Sem notas :(</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {!! $notes->links() !!}
        </div>
    </div>
@endsection
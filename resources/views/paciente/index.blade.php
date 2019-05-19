@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pacientes Cadastrados</div>
                <div class="panel-body">
                    <table id="pacientes" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NOME</th>
                                <th>CPF</th>
                                <th>AÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pacientes as $paciente)
                                <tr>
                                    <td>{{$paciente->nome}}</td>
                                    <td>{{ $paciente->cpf }}</td>
                                    <td>
                                        <a href="{{ route('paciente.edit', [$paciente->id]) }}">Editar</a>
                                        <a href="{{ route('paciente.destroy', $paciente->id) }}" class="delete-js-button">Deletar</a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<form id="paciente-destroy" method="POST" action="">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}

</form>

@endsection

@push('js')

<script>
    (function () {

        $('.delete-js-button').on('click', function (e) {

            e.preventDefault();

            Swal.fire({
                title: 'Tem certeza que deseja deletar o registro?',
                //text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, deletar!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {
                    let destroyUrl = e.target.href
                    $('#paciente-destroy').attr('action', destroyUrl);
                    $('#paciente-destroy').submit();
                }
            })
            
        })
    })()

</script>

@endpush

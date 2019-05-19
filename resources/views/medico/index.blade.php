@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Médicos Cadastrados</div>
                <div class="panel-body">
                    <table id="medicos" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NOME</th>
                                <th>CPF</th>
                                <th>CRM</th>
                                <th>AÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($medicos as $medico)
                                <tr>
                                    <td>{{$medico->nome}}</td>
                                    <td>{{ $medico->crm }}</td>
                                    <td>{{ $medico->cpf }}</td>
                                    <td>
                                        <a href="{{ route('medico.edit', [$medico->id]) }}">Editar</a>
                                        <a href="{{ route('medico.destroy', $medico->id) }}" class="delete-js-button">Deletar</a>
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

<form id="medico-destroy" method="POST" action="">
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
                    $('#medico-destroy').attr('action', destroyUrl);
                    $('#medico-destroy').submit();
                }
            })

        })
    })()

</script>

@endpush

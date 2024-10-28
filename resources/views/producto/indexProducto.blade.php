@extends('plantilla.app')
@section('contenido')

<!-- CONTENIDO -->
<!-- TABLA -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- /.col-md-6 -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#aumentarModal">
                                <i class="fas fa-file"></i> Nuevo
                            </button>
                            <a href="#" class="btn btn-success"><i class="fas fa-file-csv"></i> CSV</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="/" method="get">
                            <div class="input-group">
                                <input name="texto" type="text" class="form-control" value="">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-info"><i class="fas fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </form>

                        {{-- @if (session('mensaje'))
                        <div class="alert alert-info alert-dismissible fade show mt-2">
                            <span class="alert-icon"><i class="fa fa-info"></i></span>
                            <span class="alert-text">{{ session('mensaje') }}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif --}}

                        <div class="mt-2 table-responsive">
                            <table class="table table-striped table-bordered table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Marca</th>
                                        <th>Tipo de Producto</th>
                                        <th>Precio</th>
                                        <th>Stock</th>
                                        <th style="width: 20%">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @if(count($data['resultado']) == 0)
                                    <tr>
                                        <td colspan="8">No hay resultados</td>
                                    </tr>
                                    @else
                                    @foreach ($data['resultado'] as $index => $row)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $row['nombreProducto'] }}</td>
                                        <td>{{ $row['descripciónProducto'] }}</td>
                                        <td>{{ $row['nombreMarca'] }}</td>
                                        <td>{{ $row['nombre_tipoProducto'] }}</td>
                                        <td>{{ $row['precioUnitario'] }}</td>
                                        <td class="text-center">
                                            {{ $row['stock'] == 0 ? '--' : $row['stock'] }}
                                        </td>
                                        <td>
                                            <a href="{{ route('producto.ver', $row['idProducto']) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal"
                                                data-recordid="{{ $row['idProducto'] }}">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                            @if ($row['stock'] > 0)
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#aumentarModal" onclick="varProductoID({{ $row['idProducto'] }})">
                                                <i class="fas fa-plus-circle"></i>
                                            </button>
                                            @else
                                            <button class="btn btn-info btn-sm" disabled>
                                                <i class="fas fa-plus-circle"></i>
                                            </button>
                                            @endif
                                        </td>
                                    </tr> --}}
                                    {{-- @endforeach
                                    @endif --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- FIN TABLA -->

<!-- MODAL UPDATE / NUEVO -->
<div class="modal fade" id="aumentarModal" tabindex="-1" role="dialog" aria-labelledby="modal-update" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nuevo / Aumentar Stock</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formAumentarStock" method="post">
                    @csrf
                    <input type="hidden" name="idProducto" id="idProducto">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="txtStockN">Cantidad a agregar</label>
                        <input type="text" name="txtStockN" id="txtStockN" class="form-control">
                        <p id="errorControl" style="color:red"></p>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" id="btnActualizarStock" onclick="actualizarProducto()">Guardar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- FIN MODAL UPDATE -->

<!-- MODAL ELIMINAR -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="modal-eliminar" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="post">
            @csrf
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar registro</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Deseas eliminar este registro?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-light">Eliminar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- FIN MODAL ELIMINAR -->
<!-- FIN CONTENIDO -->
@endsection

<!-- jQuery y Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        $('.btn-danger').on('click', function () {
            var productId = $(this).data('recordid');
            var deleteUrl = '{{ url("producto/eliminar") }}/' + productId;
            $('#deleteModal form').attr('action', deleteUrl);
        });
    });

    function varProductoID(id) {
        $("#aumentarModal .modal-title").text("Actualizar Producto");
        $("#btnActualizarStock").text("Actualizar Stock");
        $.ajax({
            url: '{{ url("producto/varProductoSID") }}/' + id,
            type: 'post',
            success: function (response) {
                var jsonData = JSON.parse(response);
                $("#txtNombre").val(jsonData.producto.nombreProducto);
                $("#idProducto").val(jsonData.producto.idProducto);
            },
            error: function () {
                alert("Error inesperado");
            }
        });
    }

    function actualizarProducto() {
        var id = $('#idProducto').val();
        $.ajax({
            url: '{{ url("producto/actualizarStock") }}/' + id,
            type: 'post',
            data: $("#formAumentarStock").serialize(),
            success: function (response) {
                var jsonData = JSON.parse(response);
                if (jsonData.statusCode == 200) {
                    alert("Datos actualizados correctamente");
                } else if (jsonData.statusCode == 500) {
                    $("#errorControl").text(jsonData.errores.producto);
                }
            },
            error: function () {
                alert("Error inesperado");
            }
        });
    }
</script>

@extends('layouts/app')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="row">
            @foreach($lista as $pizza)
                <div class="col-md-3 mb-3">
                    <div class="card">
                      <img src="{{ url('img/pizza.jpg') }}" class="card-img-top" alt="producto" />
                      <div class="card-body">
                        <h5 class="card-title">{{ $pizza['nombre'] }} - S/ {{ number_format($pizza['precio'], 2) }}</h5>
                        <p class="card-text">{{ $pizza['descripcion'] }}</p>
                        <div class="d-grid gap-2">
                              <a href="{{ route('pos.agregar', ['codigo'=>$pizza['codigo']]) }}" class="btn btn-outline-secondary">Agregar al carrito <i class="bi bi-cart-plus"></i></a>
                            </div>
                      </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-4">
            <form method="post" action="imprimir.html">
                <h3>Datos del Cliente</h3>
                <div class="mb-3">
                  <label for="nombreInput" class="form-label">Nombres</label>
                  <input type="text" class="form-control" id="nombreInput" placeholder="Nombre del cliente" required />
                </div>
                <h3>Detalle de la Venta</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $total = 0
                    @endphp
                    @forelse($carrito as $producto)
                        @php
                            $subtotal = $producto['precio']*$producto['cantidad'];
                            $total+=$subtotal;
                        @endphp
                        <tr>
                            <td>{{ $producto['nombre'] }}</td>
                            <td>S/ {{ $producto['precio'] }}</td>
                            <td class="text-center">{{ $producto['cantidad'] }}</td>
                            <td>S/ {{ number_format($subtotal,2) }}</td>
                            <td class="text-center"><a href="#" class="btn btn-danger btn-sm"><i class="bi bi-x"></i></a></td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="5">No hay productos añadidos</td>
                        <tr>
                    @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-end" colspan="3">Total:</th>
                            <th>S/ {{ number_format($total,2) }}</th>
                            <th>&nbsp;</th>
                        </tr>
                    </tfoot>
                </table>
                <div class="d-flex justify-content-between">
                  <button type="submit" class="btn btn-success" style="width: 50%;">Cobrar</button>
                  <a href="#" class="btn btn-danger" style="width: 50%;">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection

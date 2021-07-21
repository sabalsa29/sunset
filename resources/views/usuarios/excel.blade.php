<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">

        th.primero {
            width: 5%;
            height: 32%;
        }
    </style>
</head>
<body>
    <table class="table table-bordered">
        <thead >
        <tr></tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: center"><h5>FOMATO PARA CONTROL DE PAGOS</h5></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: center"><p>Week {{date('d',strtotime($compra->fecha_del))}} al {{date('d',strtotime($compra->fecha_hasta))}} de julio del {{ date("Y") }}</p></td>
            <td></td>
            <td>Date:</td>
            <td>{{ date("d-m-Y") }}</td>
       </tr>
        <tr></tr>

        <tr >
            <th style="width: 5%; height: 32%"></th>
            <th style="text-align: center; background-color: #9AF963; width: 20%; border: 1px solid black;">Fecha/Date</th>
            <th style="text-align: center; background-color: #9AF963; width: 15%; border: 1px solid black;">Centro</th>
            <th style="text-align: center; background-color: #9AF963; width: 75%; border: 1px solid black;">Proveedor/Provider</th>
            <th style="text-align: center; background-color: #9AF963; width: 25%; border: 1px solid black;">Factura/Invoice</th>
            <th style="text-align: center; background-color: #9AF963; width: 25%; border: 1px solid black;">Pagado/ Paid out</th>
            <th style="text-align: center; background-color: #9AF963; width: 15%; border: 1px solid black;">Total</th>
            <th style="text-align: center; background-color: #9AF963; width: 20%; border: 1px solid black;">Codigo/Code</th>
            <th style="text-align: center; background-color: #9AF963; width: 75%; border: 1px solid black;">Nombre/ Account Name</th>
            <th style="text-align: center; background-color: #9AF963; width: 25%; border: 1px solid black;">Autorizo/Approved</th>
            <th style="text-align: center; background-color: #9AF963; width: 20%; border: 1px solid black;">Viajes/Embarque</th>
        </tr>
        </thead>
        <tbody>
        @foreach($detalles as $detalle)
            <tr>
                <td style="width: 5%"></td>
                <td style="width: 20%; border: 1px solid black;">{{ $detalle->fecha }}</td>
                <td style="width: 15%; border: 1px solid black;">{{ $detalle->empresa_id }}</td>
                <td style="width: 75%; border: 1px solid black;">{{ $detalle->proveedor->nombre }}</td>
                <td style="width: 25%; border: 1px solid black;">{{ $detalle->pagado }}</td>
                <td style="width: 25%; border: 1px solid black;">{{ $detalle->total }}</td>
                <td style="width: 15%; border: 1px solid black;">{{ $detalle->codigo }}</td>
                <td style="width: 75%; border: 1px solid black;">{{ $detalle->producto->descripcion }}</td>
                <td style="width: 25%; border: 1px solid black;">{{ $detalle->usuario_autoriza_id }}</td>
                <td style="width: 25%; border: 1px solid black;">{{ $detalle->viaje }}</td>
                <td style="width: 20%; border: 1px solid black;">{{ $detalle->empresa_id }}</td>

            </tr>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="width: 25%; border: 1px solid black; background-color: #9AF963;">Total</td>
            <td style="width: 25%; border: 1px solid black; background-color: #9AF963;">545454</td>

        </tr>
        <tr></tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: center">_______________________________________</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Suma de Prioritarios</td>
            <td>1000000</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: center">Autorizo</td>
            <td>Pagado</td>
            <td>10000</td>
            <td></td>
            <td></td>
            <td>Suma Semana Actual</td>
            <td>1000000</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>No Pagado</td>
            <td>20000</td>
            <td></td>
            <td></td>
            <td>Suma Semana Anterior</td>
            <td>1000000</td>
            <td></td>
        </tr>
        </tbody>
    </table>
</body>
</html>

<?php

namespace App\Exports;

use App\Models\Compras;
use App\Models\Compras_detalles;
use Date;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ComprasExport implements  FromView
{
    //FromQuery , WithHeadings , WithMapping ,
    // public function query(){
        //return Compras_detalles::query()->where('compra_id', $this->compra)->orderBy("fecha","DESC");
    //}
    use Exportable;

    public function __construct(int $compra_id, string $fecha_hoy)
    {
        $this->compra           =    $compra_id;
        $this->fecha_hoy        = $fecha_hoy;

    }


    public function view(): View
    {
        $compra = Compras::find($this->compra);
        $compra_detalles    = Compras_detalles::where('compra_id', $this->compra)->orderBy("fecha","DESC")->get();
        $fecha_hoy  =Date::now();

        return view('compras.excel', [

            'compra'        => $compra,
            'detalles'      => $compra_detalles,
            'fecha_hoy'     => $fecha_hoy
        ]);
    }
    public function headings(): array
    {
        return [
            'FECHA',
            'CENTRO',
            'PROVEEDOR',
            'FACTURA',
            'PAGADO',
            'TOTAL',
            'CODIGO',
            'NOMBRE',
            'AUTORIZO',
            'VIAJES',

        ];
    }
    public function map($row): array
    {
        return [
            $row->fecha,
            $row->empresa_id,
            $row->proveedor_id,
            $row->no_factura,
            $row->pagado,
            $row->total,
            $row->codigo,
            $row->producto_id,
            $row->usuario_autoriza_id,
            $row->viaje,
        ];
    }


}

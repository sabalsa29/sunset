<?php

return [
    'sunset_toke' => env('SUNSET_TOKEN'),
    'tipo_licencia'=>[
        0=> 'N/D',
        1=> 'FEDERAL TIPO A',
        2=> 'ESTATAL TIPO C2'
    ],
    'tipo_productos'=>[
    1 =>'Producto',
    2 => 'Servicio'
    ],
    'categorias'=>[
    1 => 'Consumo',
    2 => 'Suministro',
    3 => 'Mantenimiento',
    4 => 'Medicos',
    5 => 'Insumo',
    6 => 'Co-pack'
    ],
    'estado_civil'=>[
        0=> 'N/D',
        1=> 'Casado',
        2=> 'Soltero',
        3=> 'U/Libre',
        4=> 'Viudo',
        5=> 'Divorciado'
    ],
    'escolaridad'=>[
        0=> 'N/D',
        1=> 'Primaria',
        2=> 'Secundaria',
        3=> 'Medio Superior',
        4=> 'Superior'
    ],
    'gastos_funerarios' => [
        1 => 'Si',
        0 => 'No'
    ],
    'estatus' => [
        1 => 'Activa',
        0 => 'Inactiva'
    ],
    'estatus_patios' => [
        1 => 'Disponible',
        0 => 'No Disponible'
    ],
    'tipo_rutas' =>[
        0 => 'N/D',
        1 => 'BRT',
        2 => 'Troncal',
        3 => 'Complementaria',
        4 => 'Mejorada',
        5 => 'Alimentadora',
        6 => 'Caracteristicas Especiales',
        7 => 'Transporte Personal',
        8 => 'Transporte Escolar',
        9 => 'Cuenca',
        10 => 'Nocturna',
        11 => 'SubUrbana',
        12 => 'PreTroncal'
    ],
    'tipo_circuito' => [
        0 => 'N/D',
        1 => 'Diametral',
        2 => 'Radial',
        3 => 'Circunvalatoria',
        4 => 'SubUrbana'
    ],
    'tipo_programacion_ruta' =>[
        0 => 'N/D',
        1 => 'Programacion_1',
        2 => 'Programacion_2',
        3 => 'Programacion_3',
        4 => 'Programacion_4',

    ],
    'tipo_recaudo' =>[
        0 => 'N/D',
        1 => 'Manual',
        2 => 'Electronico'
    ],
    'tipo_boleto' =>[
        1 => 'Efectivo',
        2 => 'Mi Pasaje',
        3 => 'Tarifa preferente efectivo',
        4 => 'Descuento'
    ],
    'encargado_unidades'=>[
        0 =>'No Disponible',
        1 => 'Disponible'
    ],
    'departamentos'=>[
        1 => 'Administraciòn y Finanzas',
        2 => 'Mantenimiento',
        3 => 'Operacion',
        4 => 'Recursos Humanos',
        5 => 'Recursos Materiales',
        6 => 'Calidad',
        7 => 'Administrador de Sistema',
        8 => 'Checadores'
    ],
    'estatus_operador' => [
        1 => 'Activos',
        2 => 'Baja',
        0 => 'Todos'
    ],
    'nacionalidad' => [
        1 => 'Mexicana',
        2 => 'Extranjera'
    ],
    'estatus_reportes' => [
        0 => ['texto' =>'Cancelada', 'color' => 'danger','title'=>'La incidencia ha sido cancelada'],
        1 => ['texto' =>'Nueva', 'color' => 'default','title'=>'La incidencia ha sido creada pero aun no se envía'],
        2 => ['texto' =>'Nueva', 'color' => 'primary','title'=>'La incidencia ha sido enviada'],
        3 => ['texto' =>'En Proceso', 'color' => 'warning','title'=>'La incidencia ha sido recibida y espera respuesta'],
        4 => ['texto' =>'Contestada', 'color' => 'info','title'=>'La incidencia ha sido respondida'] ,
        5 => ['texto' =>'Solucionados', 'color' => 'success','title'=>'La incidencia ha sido solucionada'] ,
        6 => ['texto' =>'Atrasados', 'color' => 'danger','title'=>'La incidencia esta retrasada por mas de 72 horas'],
        7 => ['texto' =>'Vencidas', 'color' => 'danger','title'=>'La resolución de la incidencia pasó el tiempo asignado']
   ],
   'tipologia' => [
    1 => 'Sobre El Conductor de la Unidad',
    2 => 'Sobre la Unidad en la que Viajé',
    3 => 'Sobre mi Ruta o Corredor',
    4 => 'Sobre el Sistema de Prepago'
],
    'turnos' => [
        '1' => 'Matutino',
        '2' => 'Vespertino',
        '3' => 'Mixto',
        '4' => 'Completo',
        '5' => 'Nocturno'
    ],

    'categorias_documentos' => [
        1 => 'Personal',
        2 => 'Unidad'
    ],

    'licencias' =>
    [
        '1' => 'Gestión',
        '2' => 'Administración',
        '3' => 'Recursos Humanos',
        '4' => 'Atención Usuarios',
        '5' => 'Mantenimiento',
        '6' => 'Recaudo'
    ],
    'sistema_perfiles' => [
        0 => 'Disponible',
        1 => 'No Disponible'
    ],
    'perfiles_sistema' => [
        1 => 'Operador'
    ],
    'tipos_de_sangre' => [
        1 => 'A+',
        2 => 'A-',
        3 => 'B+',
        4 => 'B-',
        5 => 'AB+',
        6 => 'AB-',
        7 => 'O+',
        8 => 'O-'
    ],
    'tipologias' => [
        1 => 'Operador',
        2 => 'Unidad',
        3 => 'Ruta',
        4 => 'Sistema'
    ],
    'estatus_reportes' => [
        0 => 'Cancelada',
        1 => 'Nueva',
        2 => 'En proceso',
        3 =>  'terminado',
        10 => 'Vencido'
    ],
    'estatus_reportes_internos' => [
        1 => 'Nueva',
        2 => 'terminado',

    ],
    'procede' => [
        0 => 'No',
        1 => 'Si'
    ],
    'gastos_categorias' => [
        0 => 'Mantenimiento',
        1 => 'Nomina',
        2 => 'Indirectos',
        3 => 'Diesel',
        4 => 'Llantas'
    ],
    'turnos' =>[
        '0' => 'N/D',
        '1' => 'Matutino',
        '2' => 'Vespertino',
        '3' => 'Nocturno'
    ],
    'estatus_dobletes' => [
        0 => 'Baja',
        1 => 'Nuevo',
        2 => 'Autorizado',
        90 => 'Pagado',
    ],
    'estatus_aspirante' => [
        0 => ['texto' => "No Apto", "color" => 'danger', "title" => "Aspirante No Apto"],
        1 => ['texto' => "Nuevo", "color" => 'default', "title" => "Aspirante Nuevo"],
        2 => ['texto' => "Apto", "color" => 'success', "title" => "Aspirante Apto"],
        10 => ['texto' => "Contratado", "color" => 'info', "title" => "Contratado"],
    ],
    'estatus_aspirante_eventos' => [
        0 => ['texto' => "No Acreditó proceso", "color" => 'default', "title" => "No Acreditó proceso"],
        1 => ['texto' => "Acreditó proceso", "color" => 'warning', "title" => "Acreditó proceso"],
    ],
    'tipos_contrato' => [
        1 => 'De Prueba',
        2 => 'De Planta'
    ],
];

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>OPTIMIST</title>
    {!! Html::style('assets/css/optimist.css') !!}
</head>
<body>
    <header>

        <div class="info">

            <div style="float:left">
                <img src="{{ asset('assets/images/logo.png') }}" width="120"/>
            </div>
            <center>
                <p style="text-align:center">COLEGIO PRIVADO HIPOLITO UNANUE</p>
                <p><h1 style="text-align:center"><span style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 20px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: nowrap; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);">Tarjeta de informacion Optimist</span></h1></p>
            </center>
        </div>
        <div class="obs">

        </div>
    </header>
    <div style="width:670px; text-align:left">
        <label>Apellidos y Nombres:</label>
        <label>{{ $alumno->apellido_paterno}} {{ $alumno->apellido_materno}}, {{ $alumno->nombres}}</label>
    </div>
    <div style="width:670px; text-align:right">
        <label>Aquí la variable de Aula</label>

    </div>
    <div class="content">
        <div>
            <table>
                @foreach($tarjeta->tarjetabloque as $bloque)
                    <tr class="tdgray">
                        <th>{{$bloque->bloque->nombre}}</th>
                        <th>S</th>
                        <th>CS</th>
                        <th>AV</th>
                        <th>N</th>
                    </tr>
                    @foreach($bloque->criterios as $criterio)
                        <tr>
                            <td>{{$criterio->criterio}}</td>
                            <td>@if(isset($notas[$criterio->idbloquecriterio])) {{$notas[$criterio->idbloquecriterio]->S}}@endif</td>
                            <td>@if(isset($notas[$criterio->idbloquecriterio])) {{$notas[$criterio->idbloquecriterio]->CS}}@endif</td>
                            <td>@if(isset($notas[$criterio->idbloquecriterio])) {{$notas[$criterio->idbloquecriterio]->AV}}@endif</td>
                            <td>@if(isset($notas[$criterio->idbloquecriterio])) {{$notas[$criterio->idbloquecriterio]->N}}@endif</td>
                        </tr>
                    @endforeach
                @endforeach
            </table

        </div>
        <br />
        <br />
        <br />
        <br />

        <div>
            <div style="float:left;width:240px; text-align:center">Firma de Tutora</div>

            <div style="float:right;width:240px; text-align:center">Firma del Director</div>

        </div>
</body>
</html>

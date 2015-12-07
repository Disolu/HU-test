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
        <label>{{ $alumno[0]->apellido_paterno}} {{ $alumno[0]->apellido_materno}}, {{ $alumno[0]->nombres}}</label>
    </div>
    <div style="width:670px; text-align:right">
        <label>Aquí la variable de Aula</label>

    </div>
    <div class="content">
        <div>
            <table>
                <tr class="tdgray">
                    <td>TITULO DE BLOQUE</td>
                    <td>S</td>
                    <td>CS</td>
                    <td>AV</td>
                    <td>N</td>
                </tr>
                <tr>
                    <td>CRITERIO1</td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
                <tr>
                    <td>CRITERIO2</td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
                <tr>
                    <td>CRITERIO3</td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
                <tr class="tdgray">
                    <td>TITULO DE BLOQUE 2</td>
                    <td>S</td>
                    <td>CS</td>
                    <td>AV</td>
                    <td>N</td>
                </tr>
                <tr>
                    <td>CRITERIO1</td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
                <tr>
                    <td>CRITERIO2</td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
                <tr>
                    <td>CRITERIO3</td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
                <tr class="tdgray">
                    <td>TITULO DE BLOQUE 3</td>
                    <td>S</td>
                    <td>CS</td>
                    <td>AV</td>
                    <td>N</td>
                </tr>
                <tr>
                    <td>CRITERIO1</td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
                <tr>
                    <td>CRITERIO2</td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
                <tr>
                    <td>CRITERIO3</td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
                <tr class="tdgray">
                    <td>TITULO DE BLOQUE 4</td>
                    <td>S</td>
                    <td>CS</td>
                    <td>AV</td>
                    <td>N</td>
                </tr>
                <tr>
                    <td>CRITERIO1</td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
                <tr>
                    <td>CRITERIO2</td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
                <tr>
                    <td>CRITERIO3</td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
                <tr class="tdgray">
                    <td>TITULO DE BLOQUE 5</td>
                    <td>S</td>
                    <td>CS</td>
                    <td>AV</td>
                    <td>N</td>
                </tr>
                <tr>
                    <td>CRITERIO1</td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
                <tr>
                    <td>CRITERIO2</td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
                <tr>
                    <td>CRITERIO3</td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
                <tr>
                    <td colspan="5" class="tdgray">Apreciaciones del profesor</td>
                </tr>
                <tr>
                    <td style="height:40px" colspan="5">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac aliquam mattis. Ut vulputate eros sed felis sodales nec vulputate justo hendrerit. Vivamus varius pretium

                    </td>
                </tr>
            </table>



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
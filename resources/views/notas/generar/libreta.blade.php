<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>LIBRETA</title>
    {!! Html::style('assets/css/libreta.css') !!}
</head>
<body>
    <header>

        <div class="info">

            <div style="float:left">
                <img src="{{ asset('assets/images/logo.png') }}" width="160"/>
            </div>
            <center>
                <p style="text-align:center">COLEGIO PRIVADO HIPOLITO UNANUE</p>
                <p><h1 style="text-align:center">LIBRETA DE NOTAS</h1></p>
            </center>
        </div>
    </header>
    <div class="content">
        <div class="clearfix">
            <div class="col1">
                <table>
                    <tr>
                        <td>ALUMNO</td>
                        <td>{{ $alumno[0]->apellido_paterno}} {{ $alumno[0]->apellido_materno}}, {{ $alumno[0]->nombres}}</td>
                    </tr>

                    <tr>
                        <td>AULA</td>
                        <td>Primero de secundaria</td>
                    </tr>

                    <tr>
                        <td>TUTOR (A)</td>
                        <td>Yesenia Caballero Salazar</td>
                    </tr>
                </table>
                <br />
                <div class="left">
                    <table>

                        <tr>
                            <td class="area">AREA</td>
                            <td class="gray">CURSO </td>
                            <td class="gray">IB</td>
                            <td class="gray">IIB</td>
                            <td class="gray">IIIB</td>
                            <td class="gray">IVB</td>
                            <td class="gray">PA</td>
                        </tr>

                        <tr>
                            <td rowspan="5" class="gray">MATEMÁTICA</td>
                            <td>ARITMÉTICA</td>
                            <td>14</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                        <tr>
                            <td>ÁLGEBRA</td>
                            <td>17</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                        <tr>
                            <td>GEOMETRÍA</td>
                            <td>16</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                        <tr>
                            <td>TRIGONOMETRÍA</td>
                            <td>13</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                        <tr>
                            <td>RAZONAMINETO MATEMÁTICO</td>
                            <td>14</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>

                    <br>
                    <table>
                        <tr>
                            <td rowspan="5">COMUNICACIÓN</td>
                            <td>RAZONAMIENTO VERBAL</td>
                            <td>14</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                        <tr>
                            <td>LENGUAJE</td>
                            <td>18</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                        <tr>
                            <td>LITERATURA</td>
                            <td>13</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                        <tr>
                            <td>REDACCIÓN</td>
                            <td>16</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                        <tr>
                            <td>PLAN LECTOR</td>
                            <td>16</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                    <br />
                    <table>

                        <tr>
                            <td rowspan="5">INGLES</td>
                            <td>14</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                    </table>
                    <br />
                    <table>

                        <tr>
                            <td rowspan="5">ARTE&nbsp;</td>
                            <td>14</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                    </table>

                    <br />
                    <table>

                        <tr>
                            <td rowspan="5">HISTORIA, GEOGRAFÍA Y ECONOMÍA</td>
                            <td>HISTORIA DEL PERÚ</td>
                            <td>14</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>HISTORIA UNIVERSAL</td>
                            <td>18</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>GEOGRAFÍA</td>
                            <td>13</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                    </table>

                    <br />
                    <table>
                        <tr>
                            <td rowspan="5">FORMACIÓN CÍVICA Y CIUDADANA</td>
                            <td>CÍVICA</td>
                            <td>14</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                        <tr>
                            <td>PLAN DE FORMACIÓN</td>
                            <td>18</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                    </table>
                    <br />
                    <table>
                        <tr>
                            <td rowspan="5">PERSONA, FAMILIA Y RELACIONES HUMANA</td>
                            <td>CRECEMOS EN VALORES</td>
                            <td>14</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                    </table>
                    <br />
                    <table>
                        <tr>
                            <td rowspan="5">EDUCACIÓN FÍSICA</td>
                            <td>14</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                    </table>
                    <br />
                    <table>
                        <tr>
                            <td rowspan="5">EDUCACIÓN RELIGIOSA</td>
                            <td>14</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                    </table>
                    <br />
                    <table>
                        <tr>
                            <td rowspan="5">C.T.A.</td>
                            <td>FÍSICA</td>
                            <td>14</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>QUÍMICA</td>
                            <td>18</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>BIOLOGÍA</td>
                            <td>13</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                    </table>
                    <br />
                    <table>
                        <tr>
                            <td rowspan="5">EDUCACIÓN PARA EL TRABAJO</td>
                            <td>14</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                    </table>
                </div>

            </div>

            <div class="col2">
                <table class="tab2">

                    <tr>
                        <td>CONDUCTA</td>
                        <td>I</td>
                        <td>II&nbsp;</td>
                        <td>III</td>
                        <td>IV</td>
                    </tr>

                    <tr>
                        <td>RESPETO AL REGLAMENTO</td>
                        <td>@if(isset($tutoria[1])) {{$tutoria[1]->respeto}} @endif</td>
                        <td>@if(isset($tutoria[2])) {{$tutoria[2]->respeto}} @endif</td>
                        <td>@if(isset($tutoria[3])) {{$tutoria[3]->respeto}} @endif</td>
                        <td>@if(isset($tutoria[4])) {{$tutoria[4]->respeto}} @endif</td>
                    </tr>

                    <tr>
                        <td>PUNTUALIDAD</td>
                        <td>@if(isset($tutoria[1])) {{$tutoria[1]->puntualidad}} @endif</td>
                        <td>@if(isset($tutoria[2])) {{$tutoria[2]->puntualidad}} @endif</td>
                        <td>@if(isset($tutoria[3])) {{$tutoria[3]->puntualidad}} @endif</td>
                        <td>@if(isset($tutoria[4])) {{$tutoria[4]->puntualidad}} @endif</td>
                    </tr>

                    <tr>
                        <td>RESPONSABILIDAD</td>
                        <td>@if(isset($tutoria[1])) {{$tutoria[1]->responsabilidad}} @endif</td>
                        <td>@if(isset($tutoria[2])) {{$tutoria[2]->responsabilidad}} @endif</td>
                        <td>@if(isset($tutoria[3])) {{$tutoria[3]->responsabilidad}} @endif</td>
                        <td>@if(isset($tutoria[4])) {{$tutoria[4]->responsabilidad}} @endif</td>
                    </tr>

                    <tr>
                        <td>PRESENTACIÓN PERSONAL</td>
                        <td>@if(isset($tutoria[1])) {{$tutoria[1]->presentacion}} @endif</td>
                        <td>@if(isset($tutoria[2])) {{$tutoria[2]->presentacion}} @endif</td>
                        <td>@if(isset($tutoria[3])) {{$tutoria[3]->presentacion}} @endif</td>
                        <td>@if(isset($tutoria[4])) {{$tutoria[4]->presentacion}} @endif</td>
                    </tr>

                </table>
                <br />
                <br />
                <table class="tab2">

                    <tr>
                        <td>ASISTENCIA</td>
                        <td>I</td>
                        <td>II&nbsp;</td>
                        <td>III</td>
                        <td>IV</td>
                    </tr>

                    <tr>
                        <td>TARDANZA JUSTIFICADA</td>
                        <td>@if(isset($tutoria[1])) {{$tutoria[1]->tardanza_justificada}} @endif</td>
                        <td>@if(isset($tutoria[2])) {{$tutoria[2]->tardanza_justificada}} @endif</td>
                        <td>@if(isset($tutoria[3])) {{$tutoria[3]->tardanza_justificada}} @endif</td>
                        <td>@if(isset($tutoria[4])) {{$tutoria[4]->tardanza_justificada}} @endif</td>
                    </tr>

                    <tr>
                        <td>TARDANZA INJUSTIFICADA</td>
                        <td>@if(isset($tutoria[1])) {{$tutoria[1]->tardanza_injustificada}} @endif</td>
                        <td>@if(isset($tutoria[2])) {{$tutoria[2]->tardanza_injustificada}} @endif</td>
                        <td>@if(isset($tutoria[3])) {{$tutoria[3]->tardanza_injustificada}} @endif</td>
                        <td>@if(isset($tutoria[4])) {{$tutoria[4]->tardanza_injustificada}} @endif</td>
                    </tr>

                    <tr>
                        <td>INASISTENCIA JUSTIFICADA</td>
                        <td>@if(isset($tutoria[1])) {{$tutoria[1]->inasistencia_just}} @endif</td>
                        <td>@if(isset($tutoria[2])) {{$tutoria[2]->inasistencia_just}} @endif</td>
                        <td>@if(isset($tutoria[3])) {{$tutoria[3]->inasistencia_just}} @endif</td>
                        <td>@if(isset($tutoria[4])) {{$tutoria[4]->inasistencia_just}} @endif</td>
                    </tr>

                    <tr>
                        <td>INASISTENCIA JUSTIFICADA</td>
                        <td>@if(isset($tutoria[1])) {{$tutoria[1]->inasistencia_injust}} @endif</td>
                        <td>@if(isset($tutoria[2])) {{$tutoria[2]->inasistencia_injust}} @endif</td>
                        <td>@if(isset($tutoria[3])) {{$tutoria[3]->inasistencia_injust}} @endif</td>
                        <td>@if(isset($tutoria[4])) {{$tutoria[4]->inasistencia_injust}} @endif</td>
                    </tr>

                </table>
                <br />
                <br />
                <table class="tab2">

                    <tr>
                        <td>EVALUACIÓN DE PADRES</td>
                        <td>I </td>
                        <td>II</td>
                        <td>III</td>
                        <td>IV</td>
                    </tr>

                    <tr>
                        <td>SE INTERESA POR EL AVANCE DE SU HIJO</td>
                        <td>@if(isset($tutoria[1])) {{$tutoria[1]->avance}} @endif</td>
                        <td>@if(isset($tutoria[2])) {{$tutoria[2]->avance}} @endif</td>
                        <td>@if(isset($tutoria[3])) {{$tutoria[3]->avance}} @endif</td>
                        <td>@if(isset($tutoria[4])) {{$tutoria[4]->avance}} @endif</td>
                    </tr>

                    <tr>
                        <td>ENVIA MATERIALES REQUERIDOS</td>
                        <td>@if(isset($tutoria[1])) {{$tutoria[1]->materiales}} @endif</td>
                        <td>@if(isset($tutoria[2])) {{$tutoria[2]->materiales}} @endif</td>
                        <td>@if(isset($tutoria[3])) {{$tutoria[3]->materiales}} @endif</td>
                        <td>@if(isset($tutoria[4])) {{$tutoria[4]->materiales}} @endif</td>
                    </tr>

                    <tr>
                        <td>ASISTE PUNTUALMENTE A LAS REUNIONES</td>
                        <td>@if(isset($tutoria[1])) {{$tutoria[1]->reuniones}} @endif</td>
                        <td>@if(isset($tutoria[2])) {{$tutoria[2]->reuniones}} @endif</td>
                        <td>@if(isset($tutoria[3])) {{$tutoria[3]->reuniones}} @endif</td>
                        <td>@if(isset($tutoria[4])) {{$tutoria[4]->reuniones}} @endif</td>
                    </tr>

                    <tr>
                        <td>SE PREOCUPA DE LA HIGIENE Y PRESENTACION</td>
                        <td>@if(isset($tutoria[1])) {{$tutoria[1]->higene}} @endif</td>
                        <td>@if(isset($tutoria[2])) {{$tutoria[2]->higene}} @endif</td>
                        <td>@if(isset($tutoria[3])) {{$tutoria[3]->higene}} @endif</td>
                        <td>@if(isset($tutoria[4])) {{$tutoria[4]->higene}} @endif</td>
                    </tr>
                    <tr>
                        <td>LEE Y FIRMA LA AGENDA DIARIAMENTE</td>
                        <td>@if(isset($tutoria[1])) {{$tutoria[1]->agenda}} @endif</td>
                        <td>@if(isset($tutoria[2])) {{$tutoria[2]->agenda}} @endif</td>
                        <td>@if(isset($tutoria[3])) {{$tutoria[3]->agenda}} @endif</td>
                        <td>@if(isset($tutoria[4])) {{$tutoria[4]->agenda}} @endif</td>
                    </tr>

                </table>

            </div>
        </div>
        <label>APRECIACIÓN DEL PROFESOR(A) TUTOR(A)</label>
        <table class="footer">
            <tr>
                <td class="FooterStylecol1">I</td>
                <td class="FooterStylecol2">@if(isset($tutoria[1])) {{$tutoria[1]->apreciacion}} @endif</td>
                <td class="FooterStylecol1">III</td>
                <td class="FooterStylecol2">@if(isset($tutoria[1])) {{$tutoria[3]->apreciacion}} @endif</td>


            </tr>
            <tr>
                <td class="FooterStylecol1">II</td>
                <td class="FooterStylecol2">@if(isset($tutoria[1])) {{$tutoria[2]->apreciacion}} @endif</td>
                <td class="FooterStylecol1">IV</td>
                <td class="FooterStylecol2">@if(isset($tutoria[1])) {{$tutoria[4]->apreciacion}} @endif</td>


            </tr>
        </table>

        <br />
        <br />
        <br />
        <br />
        <div>
            <div style="float: left;text-align:center; width:320px">
                <label>LIC.EDILBERTO ANGELES JUSTO</label>
            </div>


            <div style="float: right;text-align:CENTER;  width:300px">
                <label>LIC. YESSENIA CABALLERO SALAZAR</label>
            </div>

        </div>
        <div>
            <div style="float: left;text-align:center; width:320px; font-style:italic">
                <label>Director</label>
            </div>


            <div style="float: right;text-align:CENTER;  width:300px; font-style:italic; padding-bottom:inherit">
                <label>Profesor, Tutor(a)</label>
            </div>

        </div>
        <br />
        <p></p>
        <br />
</body>
</html>
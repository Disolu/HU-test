<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Compromiso de Honor</title>
     {!! Html::style('assets/css/pdf.css') !!}
    <!--<link rel="stylesheet" type="text/css" href="assets/css/pdf.css">-->
</head>
<body>
    <div class="pag1">
        <header>
            <div class="logo">
                <img src="assets/img/logo.jpg" />
            </div>
            <div class="info">
                <center><p style="text-align:center">COLEGIO PRIVADO HIPOLITO UNANUE</p>
                <p ><h1 style="text-align:center">COMPROMISO DE HONOR</h1></p></center>
            </div>
            <div class="obs"><br/>
                <p style="text-align:center">COD {{ $matricula[0]->idalumno}}{{ $matricula[0]->nombreperiodo}}</p>
                <p style="text-align:center">Pagina 1 de 2</p>
            </div>
        </header>
        <div class="content">
            <p>
            Alumno(a): {{ $matricula[0]->alu_nombres}} {{ $matricula[0]->apellido_paterno}} {{ $matricula[0]->apellido_materno}}
            Grado: {{ $matricula[0]->grado_nombre}}
            Seccion: {{ $matricula[0]->seccion_nombre }}
            Nivel: {{ $matricula[0]->nivel_nombre }}<br/><br/>
            <p>El presente documento es un <b>ANEXO</b> al <b>COMPROMISO DE MATRÍCULA</b> Nº 0…….-2016, y es elaborada a solicitud de quien la suscribe,

en razón al requerimiento de un descuento en el pago de su mensualidad <b>(Pensión Preferencial)</b> para su menor hijo(a) cuyo nombre se 
registra en el encabezado del presente documento.</p>
 <p>El Padre de familia beneficiado con dicho descuento <b>(Pensión Preferencial)</b> acepta cada una de las siguientes condiciones y se
compromete a cumplirlas cabalmente:</p>
            <span class="sub">DEL ACCESO AL BENEFICIO A UNA PENSIÓN PREFERENCIAL</span>
                <ol>
                    <li>El costo de las pensiones de enseñanza que deberán pagar todos los PP.FF es el que se ha establecido para el 2016 y que se
detalla en el Cuadro N° 1 descrito en el Compromiso de Matrícula 2016.</li>
                    <li>No obstante, los PP.FF que hayan accedido al beneficio de una <b>Pensión Preferencial,</b> tendrán un descuento en el pago de su
mensualidad a un valor equivalente a los siguientes montos:</li>
                    <br/>
            <div class="centro"><TABLE class="cuadro1">
                    <TR>
                        <TD WIDTH=100>Numero de cuotas</TD>
                        <TD WIDTH=100>COSTO MENSUAL DE PENSION DE ENSEÑANZA<br/>
                        {{$matricula[0]->nombreperiodo}}</TD>
                        <TD WIDTH=100>Fecha de Pago</TD>
                    </TR>
                    <TR>
                        <TD WIDTH=100>10 Cuotas mensuales <br/>(Marzo a Diciembre)</TD>
                        <TD WIDTH=100>INICIAL: S./ 280 <br/>PRIMARIA: S./ 300<br/>SECUNDARIA: S./ 320</TD>
                        <TD WIDTH=100>Fines de cada mes. Una vez transcurrido  el mes o cuando haya concluido el servicio educativo.</TD>
                    </TR>
                </TABLE></div>
           <span class="sub">DE LAS CONDICIONES A CUMPLIR PARA ACCEDER A UN DESCUENTO EN EL PAGO DE LA MENSUALIDAD</span>
            <ol>
                <li value="4">El alumno y sus padres deben participar de manera activa y constante en las distintas actividades curriculares y extracurriculares

planificadas en el año escolar, asistir a todas las reuniones convocadas por la institución y cumplir con el Reglamento Interno del 

colegio.</li>
<li>El padre de familia podrá acceder al descuento del pago de su mensualidad (Pensión Preferencial) hasta los fines de cada mes o

cuando haya concluido el servicio educativo del mes correspondiente. Teniendo la posibilidad de cancelarlo hasta los 03 días 

calendarios (incluidos sábados, domingos y feriados) posteriores a la fecha de vencimiento sin recargo alguno.</li>
<li>No obstante, perderá el beneficio del descuento <b>(Pensión Preferencial)</b> si cancela la mensualidad fuera de la fecha descrita en el

punto anterior, es decir, desde el día 04 hacia adelante, debiendo cancelar el costo real de la pensión (Cuadro Nª 01) previsto para 

el año escolar 2016 (inicial: S/.350.00, primaria: S/.380.00 y secundaria: S/.400.00).</li>
<li>El padre de familia perderá de manera automática y definitiva el beneficio del descuento <b>(Pensión Preferencial)</b>, cuando no

cancele puntualmente dos (02) mensualidades consecutivas o alternadas en las fechas comprometidas. De incurrirse en este 

supuesto el PP.FF deberá pagar el costo real de la pensión por el resto del año escolar 2016 y no podrá solicitar beneficios 

similares en el futuro.</li>
            </ol><br/>
            <span class="sub">DE LOS INCREMENTOS EN LOS MESES DE JULIO Y DICIEMBRE</span>
            <ol>
            <li value="8">Aquellos alumnos que de manera excepcional han obtenido el beneficio del descuento (Pensión Preferencial) tendrán un incremento

en los meses de julio y diciembre equivalente a S/. 30.00 (para los que tengan un descuento que genere una pensión preferencial 

desde S/.280.00 hasta S/.320.00 )</li>
            
            
            </ol><br/>
            <span class="derecha"> Villa el salvador {!! date('d') !!} de
<?php
$date = new DateTime();
if($date->format('F') == "January")
    { echo "Enero"; }
 
elseif ($date->format('F') == "February")
    { echo "Febrero"; }
 
elseif ($date->format('F') == "March")
    { echo "Marzo"; }
 
elseif ($date->format('F') == "April")
    { echo "Abril"; }
 
elseif ($date->format('F') == "May")
    { echo "Mayo"; }
 
elseif ($date->format('F') == "June")
    { echo "Junio"; }
 
elseif ($date->format('F') == "July")
    { echo "Julio"; }
 
elseif ($date->format('F') == "August")
    { echo "Agosto"; }
 
elseif ($date->format('F') == "September")
    { echo "Septiembre"; }
 
elseif ($date->format('F') == "October")
    { echo "Octubre"; }
 
elseif ($date->format('F') == "November")
    { echo "Noviembre"; }
 
elseif ($date->format('F') == "December")
    { echo "Diciembre"; }                                
?>
 del 2015</p></span>
 
 <center>
<img src="assets/img/firma.png"/></center><br />

        </div>
    </div>
</body>
</html>
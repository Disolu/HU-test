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
            Nivel: {{ $matricula[0]->nivel_nombre }} Pensión: {{ $matricula[0]->tipopension_nombre }} S/. {{ $matricula[0]->monto }} <br/><br/>
            Conste por el presente documento el <b>COMPROMISO DE HONOR</b> que celebran por una parte la empresa
            <b>INNOVACIONES PEDAGOGICAS HIPOLITO UNANUE S.A.C. (IPHU S.A.C.)</b>,
            debidamente representado por su Gerente General, el Sr.
            <b>Guillermo Enrique Angeles Morales</b>, con domicilio en el <b>Sector 2, Grupo 25, Mz M, Lt 03</b>,
            distrito de Villa el Salvador, provincia y departamento de Lima, a quien en adelante se le denominará
            <b>EL COLEGIO</b> y de otra parte el(la) Sr.(a)
            {!! $apoderado[0]->p_nombres !!} {!! $apoderado[0]->p_apellidos !!} con DNI
            {!! $apoderado[0]->p_dni !!} domiciliado(a) en
            <b>{{ $matricula[0]->direccion }}</b> a quien en adelante se le denominara <b>EL PADRE DE FAMILIA</b> y el(la) Sr.(a)
            {!! $apoderado[0]->m_nombres !!} {!! $apoderado[0]->m_apellidos !!} con DNI
            {!! $apoderado[0]->m_dni !!}, quienes manifiestan la voluntad de matricular a su menor hijo, para lo cual ambas partes asumen mutuamente el <b>COMPROMISO DE HONOR</b> en las condiciones siguientes: <br/><br/>
            <span class="sub">PRIMERO: DE LAS OBLIGACIONES DEL COLEGIO</span><br/><br/>
 
            <b>EL COLEGIO</b> asume las siguientes obligaciones:</p>
                <ol>
                    <li>Brindar los servicios de enseñanza <b>conforme a las condiciones y las formas informadas al momento de la matricula</b>.</li>
                    <li>Realizar una constante <b>supervicion y evaluacion de las labores de enseñanza del personal docente.</b></li>
                    <li><b>No realizar incrementos</b> en las cuotas mensuales <b>siempre que no se justifique</b> por razones especificamente fundamentadas y con precio aviso antes de realizar la matricula.</li>
                    <li><b>Mantener comunicacion constante</b>, a traves de los profesores y el personal administrativo, con los padres de familia sobre el avance y el rendimiento academico conductual del educando.</li>
                    <li><b>Para el caso de Educacion Inicial</b>, se tendran auxiliares con funciones compartidas, es decir, las tecnicas realizaran sus labores de manera complementaria con mas de un aula en el apoyo academico y conductual de los alumnos.</li>
                    <li><b>En el caso de las promociones de los grados de 5 años de Inicial y 6to Grado de Primaria</b>, con la finalidad de envitar mayores gastos de los PP.FF, solo se desarollara una ceremonia de graducacion y no fiesta. <b>Para la promocion de 5to secundaria</b> y por consenso de la mayoria de PP.FF podra realizarse, ademas de la ceremonia de graduacion, la fiesta tradicional de egresador.</li>
                </ol>
            <span class="sub">SEGUNDO: DE LAS OBLIGACIONES DEL PADRE Y LA MADRE DE FAMILIA</span><br/><br/>
            <b>LOS PADRES DE FAMILIA</b> se comprometen a lo siguiente:
                <ol>
                    <li>Velar y colaborar con el desarrollo educativo y aprendisaje de su menor hijo.</li>
                    <li>Asistir a todas las citaciones convocadas por el Colegio (Dirección, Administración, Tutor, Departamento Psicologico u otro personal autorizado).</li>
                    <li>Cumplir y hacer cumplir al educando el Reglamento Interno del colegio. Los horarios de entrada y salida del colegio <b>(Inicial: 8:00 am - 1.30 pm.; 7:30 - 3.30 pm.; y Secundaria 7:30 am - 4.00 pm.)</b> No existe tardanza, <b>Pasada la hora establecida para la entrada ningun alumno podra ingresar al Centro Educativo</b>.</li>
                    <li>Aquellos padres que envíen almuerzo, podrán <b>hacerlo con sus propios hijos, sólo en el horario de ingreso del respectivo nivel.</b> Con la finalidad de mantener el orden y preservar la seguridad de nuestros alumnos, <b>ningún personal del Centro Educativo estará autorizado a recibir almuerzos durante el desarrollo de la jornada escolar (incluso durante las horas de recreo y de almuerzo).</b></li>
                    <li>Enviar a sus menores hijos <b>debidamente uniformados, Bajo ningun motivo podran ingresar</b> al Centro Educativo <b>Alumnos que presenten prendas ajenas al uniforme escolar. Solo asistiran con buzo para las clases de Educacion Fisica o en casos que el colegio lo autorice expresamente.</b></li>
                    <li>Hacer participar a su menor hijo (a) en las diversas <b>actividades, eventos, visitas de estudio o similares</b> que planifique El Colegio <b>durante todo el año academico</b>.</li>
                    <li>Realizar el pago puntual de cada una de las <b>CUOTAS MENSUALES</b> correspondientes al <b>Año Academico
                    {{$matricula[0]->nombreperiodo}},</b> el mismo que se detalla en el siguiente cuadro:</li>
                </ol><br>
            <div class="centro"><TABLE class="cuadro1">
                    <TR>
                        <TD WIDTH=100>Numero de cuotas</TD>
                        <TD WIDTH=100>COSTO MENSUAL DE PENSION DE ENSEÑANZA<br/>
                        {{$matricula[0]->nombreperiodo}}</TD>
                        <TD WIDTH=100>Fecha de Pago</TD>
                    </TR>
                    <TR>
                        <TD WIDTH=100>10 Cuotas mensuales <br/>(Marzo a Diciembre)</TD>
                        <TD WIDTH=100>INICIAL: S./ 350 <br/>PRIMARIA: S./ 380<br/>SECUNDARIA: S./ 400</TD>
                        <TD WIDTH=100>Fines de cada mes. Una vez transcurrido  el mes o cuando haya concluido el servicio educativo.</TD>
                    </TR>
                </TABLE></div>
            <div class="tb">
            <header>
                <div class="logo">
                    <img src="assets/img/logo.jpg" />
                </div>
                <div class="info">
                    <center><p style="text-align:center">COLEGIO PRIVADO HIPOLITO UNANUE</p>
                    <p ><h1 style="text-align:center">COMPROMISO DE HONOR</h1></p></center>
                </div>
                <div class="obs"><br/>
                    <p style="text-align:center">COD {{ $matricula[0]->codigo}}</p>
                    <p style="text-align:center">Pagina 2 de 2</p>
                </div>
           
                </header>
            </div>
            <ol>
                <li value="8">Asimismo, los pagos de las mensualidades se deben realizar en cualquier agencia del Banco Continental o en otras entidades
    financieras que el colegio informe oportunamente. Por este servicio de recaudación el Banco cobrará una comisión de acuerdo a su tarifario vigente, aproximadamente S/. 2.50 (Dos Soles y 50/100 Nuevos Soles).</li>
            </ol><br/>
            <span class="sub">TERCERO: DEL PAGO DE OTROS CONCEPTOS</span>
            <ol>
            <li>No es obligatorio que el alumno cuente con algún tipo de seguro. El colegio no obliga ni intermedia para el pago de ningún tipo
 
de seguro.</li>
            <li>Los únicos cobros que realiza el colegio durante el año son: <b>Matrícula y Pensión.</b> No hay cobros por otros conceptos.</li>
            <li>La emisión de certificados de estudio no está comprendido dentro del servicio educativo y puede ser solicitado por los padres
 
de familia siempre y cuando el alumno haya finalizado un año académico completo.</li>
            <li>Los útiles escolares y el uniforme podrán ser adquiridos en el establecimiento que el PP.FF elija libremente.</li>
            <li>En la lista de útiles escolares no se consigna ni sugiere marca de ningún tipo. La elección es totalmente del PP.FF.</li>
            </ol><br/>
            <span class="sub">CUARTO: DEL INCUMPLIMIENTO EN EL PAGO DE LAS PENSIONES</span>
            <p>Si EL PADRE DE FAMILIA no cumple con el pago de sus obligaciones en las fechas antes señaladas, el Colegio tendrá la facultad de
 
ejercer las siguientes medidas:</p>
<ol>
<li>Derecho de retener los certificados de estudio del alumno (a) por los periodos no cancelados.</li>
<li>En el caso que los incumplimientos sean reiterados, el Colegio podrá ejercer su derecho a iniciar acciones legales para el
 
cobro de las acreencias.</li>
<li>Otras acciones que la ley permita.</li>
</ol>
<span class="sub">QUINTO: DEL REGLAMENTO INTERNO DEL COLEGIO</span>
<p>Todo lo no previsto en el presente documento se complementa con lo estipulado por el Reglamento Interno del Estudiante, el mismo
 
que se le hará entrega a los PP.FF antes de realizarse la matrícula.</p>
<span class="sub">SEXTO: DE LA VALIDEZ DE LAS CLÁUSULAS</span>
<p>Para la validez y vigencia del presente documento basta con la firma de uno de los <b>PADRES o APODERADOS</b> del alumno(a).</p>
        <span class="sub">DISPOSICIONES FINALES</span>
<p>EL <b>PADRE DE FAMILIA</b> declara conocer el contenido de este COMPROMISO DE HONOR, así como el Reglamento del Colegio, el
 
mismo que se hace entrega a la suscripción del presente documento, aceptando en su integridad las condiciones de cada uno de ellos,
 
firmando en señal de conformidad a los {!! date('d') !!} días del mes de
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
 del 2015</p>
 
 <center>
<img src="assets/img/firma.png"/></center><br /><br/>
<b>Personal administrativo que proceso la Matrícula: {!! $matricula[0]->nombreusuario !!}</b>

        </div>
    </div>
</body>
</html>
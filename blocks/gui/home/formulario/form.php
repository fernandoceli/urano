<?php

namespace gui\accesoIncorrecto;

if (! isset ( $GLOBALS ["autorizado"] )) {
	include ("../index.php");
	exit ();
}
class Formulario {
	var $miConfigurador;
	var $lenguaje;
	var $miFormulario;
	var $miSesion;
	function __construct($lenguaje, $formulario, $sql) {
		$this->miConfigurador = \Configurador::singleton ();
		
		$this->miConfigurador->fabricaConexiones->setRecursoDB ( 'principal' );
		
		$this->lenguaje = $lenguaje;
		
		$this->miFormulario = $formulario;
		
		$this->miSql = $sql;
		
		$this->miSesion = \Sesion::singleton ();
	}
	function formulario() {
		
		/**
		 * IMPORTANTE: Este formulario está utilizando jquery.
		 * Por tanto en el archivo ready.php se delaran algunas funciones js
		 * que lo complementan.
		 */
		
		// Rescatar los datos de este bloque
		$esteBloque = $this->miConfigurador->getVariableConfiguracion ( "esteBloque" );
		
		// ---------------- SECCION: Parámetros Globales del Formulario ----------------------------------
		/**
		 * Atributos que deben ser aplicados a todos los controles de este formulario.
		 * Se utiliza un arreglo
		 * independiente debido a que los atributos individuales se reinician cada vez que se declara un campo.
		 *
		 * Si se utiliza esta técnica es necesario realizar un mezcla entre este arreglo y el específico en cada control:
		 * $atributos= array_merge($atributos,$atributosGlobales);
		 */
		$atributosGlobales ['campoSeguro'] = 'true';
		$_REQUEST ['tiempo'] = time ();
		
		$conexion = 'estructura';
		$esteRecurso = $this->miConfigurador->fabricaConexiones->getRecursoDB ( $conexion );
		
		$usuario = $this->miSesion->getSesionUsuarioId ();
		
		// -------------------------------------------------------------------------------------------------
		// var_dump($_REQUEST);
		// ---------------- SECCION: Parámetros Generales del Formulario ----------------------------------
		$esteCampo = $esteBloque ['nombre'];
		$atributos ['id'] = $esteCampo;
		$atributos ['nombre'] = $esteCampo;
		
		// Si no se coloca, entonces toma el valor predeterminado 'application/x-www-form-urlencoded'
		$atributos ['tipoFormulario'] = '';
		
		// Si no se coloca, entonces toma el valor predeterminado 'POST'
		$atributos ['metodo'] = 'POST';
		
		// Si no se coloca, entonces toma el valor predeterminado 'index.php' (Recomendado)
		$atributos ['action'] = 'index.php';
		$atributos ['titulo'] = $this->lenguaje->getCadena ( $esteCampo );
		
		// Si no se coloca, entonces toma el valor predeterminado.
		$atributos ['estilo'] = '';
		$atributos ['marco'] = true;
		$tab = 1;
		// ---------------- FIN SECCION: de Parámetros Generales del Formulario ----------------------------
		
		// ----------------INICIAR EL FORMULARIO ------------------------------------------------------------
		$atributos ['tipoEtiqueta'] = 'inicio';
		echo $this->miFormulario->formulario ( $atributos );
		
		// ---------------- SECCION: Controles del Formulario -----------------------------------------------
		
		$_REQUEST ['usuario'] = '6666';
		
		$rutaUrlBloque = $this->miConfigurador->getVariableConfiguracion ( "rutaUrlBloque" );
		
		?>

<!-- Page Content -->
<div class="container">

	<hr>

	<div class="row">
		<div class="col-sm-6">
			<h1>Horario Clase</h1>
			<img src="<?php echo $rutaUrlBloque.'images/horario.png'?>"
				alt="Perfil" class="img-responsive img-rounded" style="width: 100%;" />
		</div>
		<div class="col-sm-6">
			<h1>Notificaciones</h1>
			<img src="<?php echo $rutaUrlBloque.'images/notificaciones.png'?>"
				alt="Perfil" class="img-responsive img-rounded" style="width: 100%;" />
		</div>
	</div>
	<!-- /.row -->

	<div class="row">
		<div class="col-sm-6">
			<h1>Servicios más usados</h1>
			<div class="row text-center">
				<div class="col-xs-4">
					<img src="<?php echo $rutaUrlBloque.'images/mi_plan_trabajo.png'?>"
						alt="Perfil" class="img-responsive" style="width: 100%;" />
					<h3 class="hidden-xs">Mi plan de Trabajo</h3>
					<h5 class="hidden-sm hidden-md hidden-lg">Mi plan de Trabajo</h5>
					<hr>
				</div>
				<div class="col-xs-4">
					<img src="<?php echo $rutaUrlBloque.'images/asignaturas.png'?>"
						alt="Perfil" class="img-responsive" style="width: 100%;" />
					<h3 class="hidden-xs">Asignaturas</h3>
					<h5 class="hidden-sm hidden-md hidden-lg">Asignaturas</h5>
					<hr>
				</div>
				<div class="col-xs-4">
					<img
						src="<?php echo $rutaUrlBloque.'images/resultados_evaluacion.png'?>"
						alt="Perfil" class="img-responsive" style="width: 100%;" />
					<h3 class="hidden-xs">Resultados Evaluación</h3>
					<h5 class="hidden-sm hidden-md hidden-lg">Resultados Evaluación</h5>
					<hr>
				</div>
			</div>
			<!-- /.row -->
			<div class="row text-center">
				<div class="col-xs-4">
					<img
						src="<?php echo $rutaUrlBloque.'images/produccion_academica.png'?>"
						alt="Perfil" class="img-responsive" style="width: 100%;" />
					<h3 class="hidden-xs">Producción Académica</h3>
					<h5 class="hidden-sm hidden-md hidden-lg">Producción Académica</h5>
					<hr>
				</div>
				<div class="col-xs-4">
					<img src="<?php echo $rutaUrlBloque.'images/autoevaluacion.png'?>"
						alt="Perfil" class="img-responsive" style="width: 100%;" />
					<h3 class="hidden-xs">Autoevaluación</h3>
					<h5 class="hidden-sm hidden-md hidden-lg">Autoevaluación</h5>
					<hr>
				</div>
				<div class="col-xs-4">
					<img src="<?php echo $rutaUrlBloque.'images/lista_clase.png'?>"
						alt="Perfil" class="img-responsive" style="width: 100%;" />
					<h3 class="hidden-xs">Lista de Clase</h3>
					<h5 class="hidden-sm hidden-md hidden-lg">Lista de Clase</h5>
					<hr>
				</div>
			</div>
			<!-- /.row -->
		</div>
		<div class="col-sm-6">
			<h1>Noticias</h1>

			<!-- prueba-plugin noticias -->
	
	<?php
		
		$atributos ['cadena_sql'] = $this->miSql->getCadenaSql ( "buscarNoticias", $usuario );
		$matrizNoticias = $esteRecurso->ejecutarAcceso ( $atributos ['cadena_sql'], "busqueda" );
		
// 		var_dump($matrizNoticias);
		
		$esteCampo = 'noticias';
		$atributos ['id'] = $esteCampo;
		$atributos ['estiloEnLinea'] = 'width: 100%; height: 90%; overflow-y: scroll;';
		echo $this->miFormulario->division ( "inicio", $atributos );
		unset ( $atributos );
		
		echo "<hr>";
		
		$esteCampo = "noti";
		$atributos ['id'] = $esteCampo;
		$atributos ['estilo'] = "demo2 demof";
		echo $this->miFormulario->division ( "inicio", $atributos );
		unset ( $atributos );
		
		echo "<ul>";
		
		foreach ( $matrizNoticias as $noticia ) {
			
// 			echo "<li onmouseover='changeover(this);' onmouseout='changeout(this);'>";
			echo "<li>";
			
			echo "<img src=" . $rutaUrlBloque . "images/silueta.gif alt='Imagen del usuario'>";
			
			$atributos ['id'] = 'enlacetitulo';
			$atributos ['enlace'] = "#";
			$atributos ['enlaceTexto'] = $noticia ['nombre'];
			echo $this->miFormulario->enlace ( $atributos );
			
			echo "<p id='texto'>";
			
			$aux = $noticia ['descripcion'];
			
			if ($noticia ['enlace']) {
				$aux = str_replace ( "[", "<a id='enlaceinterno' href='" . rtrim($noticia ['enlace']) . "'>", $aux );
			} else {
				if ($noticia ['prev']) {
					$atributos ['cadena_sql'] = $this->miSql->getCadenaSql ( "buscarPrev", $noticia ['prev'] );
					$matrizPrev = $esteRecurso->ejecutarAcceso ( $atributos ['cadena_sql'], "busqueda" );
					
					$cadena = "<a id='enlaceinterno' ";
					
					// if (isset ( $matrizPrev [0] ['sale'] )) {
					// $cadena .= 'onmouseout="' . $matrizPrev [0] ['sale'] . '" ';
					// }
					
					// if (isset ( $matrizPrev [0] ['entra'] )) {
					// $entra = $matrizPrev [0] ['entra'];
					// $entra = str_replace ( 'img/', $rutaUrlBloque . 'images/', $entra );
					// $cadena .= 'onmouseover="' . $entra . '" ';
					// }
					
					// if (isset ( $matrizPrev [0] ['mueve'] )) {
					// $cadena .= 'onmousemove="' . $matrizPrev [0] ['mueve'] . '" ';
					// }
					
					$cadena .= 'href="" >';
					
					$aux = str_replace ( "[", $cadena, $aux );
				} else {
					$aux = str_replace ( "[", "<a href=''>", $aux );
				}
			}
			$aux = str_replace ( "]", "</a>", $aux );
			
			echo $aux;
			
			echo "</p>";
			
			echo "<p id='fecha'>";
			
			$auxfecha = $noticia ['fercha_radicacion'];
			
			$auxfecha = explode(" ", $auxfecha);
			
			$auxfecha2 = $auxfecha[0];
			
			$auxfecha2 = explode("-", $auxfecha2);
			
			$f['anio'] = $auxfecha2[0];
			$f['mes'] = $auxfecha2[1];
			$f['dia'] = $auxfecha2[2];
			$f['hora'] = $auxfecha[1];
			
			echo fecha_es($f);
			
			echo "</p>";
			
			echo "</li>";
		}
		
		echo "</ul>";
		
		echo $this->miFormulario->division ( "fin" );
		
		?>
		
	</div>
		<!-- col -->

	</div>
	<!-- fin prueba plugin -->

</div>
</div>
<!-- /.row -->

</div>
<!-- /.container -->

<hr>

<?php
		// ------------------- SECCION: Paso de variables ------------------------------------------------
		
		/**
		 * En algunas ocasiones es útil pasar variables entre las diferentes páginas.
		 * SARA permite realizar esto a través de tres
		 * mecanismos:
		 * (a). Registrando las variables como variables de sesión. Estarán disponibles durante toda la sesión de usuario. Requiere acceso a
		 * la base de datos.
		 * (b). Incluirlas de manera codificada como campos de los formularios. Para ello se utiliza un campo especial denominado
		 * formsara, cuyo valor será una cadena codificada que contiene las variables.
		 * (c) a través de campos ocultos en los formularios. (deprecated)
		 */
		
		// En este formulario se utiliza el mecanismo (b) para pasar las siguientes variables:
		
		// Paso 1: crear el listado de variables
		
		$valorCodificado = "action=" . $esteBloque ["nombre"];
		$valorCodificado .= "&pagina=" . $this->miConfigurador->getVariableConfiguracion ( 'pagina' );
		$valorCodificado .= "&usuario=" . $usuario;
		$valorCodificado .= "&bloque=" . $esteBloque ['nombre'];
		$valorCodificado .= "&bloqueGrupo=" . $esteBloque ["grupo"];
		$valorCodificado .= "&opcion=ver";
		/**
		 * SARA permite que los nombres de los campos sean dinámicos.
		 * Para ello utiliza la hora en que es creado el formulario para
		 * codificar el nombre de cada campo.
		 */
		$valorCodificado .= "&campoSeguro=" . $_REQUEST ['tiempo'];
		// Paso 2: codificar la cadena resultante
		$valorCodificado = $this->miConfigurador->fabricaConexiones->crypto->codificar ( $valorCodificado );
		
		$atributos ["id"] = "formSaraData"; // No cambiar este nombre
		$atributos ["tipo"] = "hidden";
		$atributos ['estilo'] = '';
		$atributos ["obligatorio"] = false;
		$atributos ['marco'] = true;
		$atributos ["etiqueta"] = "";
		$atributos ["valor"] = $valorCodificado;
		echo $this->miFormulario->campoCuadroTexto ( $atributos );
		unset ( $atributos );
		
		// ----------------FIN SECCION: Paso de variables -------------------------------------------------
		
		// ---------------- FIN SECCION: Controles del Formulario -------------------------------------------
		
		// ----------------FINALIZAR EL FORMULARIO ----------------------------------------------------------
		// Se debe declarar el mismo atributo de marco con que se inició el formulario.
		$atributos ['marco'] = true;
		$atributos ['tipoEtiqueta'] = 'fin';
		echo $this->miFormulario->formulario ( $atributos );
		
		return true;
	}
	function mensaje() {
		
		// Si existe algun tipo de error en el login aparece el siguiente mensaje
		$mensaje = $this->miConfigurador->getVariableConfiguracion ( 'mostrarMensaje' );
		$this->miConfigurador->setVariableConfiguracion ( 'mostrarMensaje', null );
		
		if ($mensaje) {
			
			$tipoMensaje = $this->miConfigurador->getVariableConfiguracion ( 'tipoMensaje' );
			
			if ($tipoMensaje == 'json') {
				
				$atributos ['mensaje'] = $mensaje;
				$atributos ['json'] = true;
			} else {
				$atributos ['mensaje'] = $this->lenguaje->getCadena ( $mensaje );
			}
			// -------------Control texto-----------------------
			$esteCampo = 'divMensaje';
			$atributos ['id'] = $esteCampo;
			$atributos ["tamanno"] = '';
			$atributos ["estilo"] = 'information';
			$atributos ["etiqueta"] = '';
			$atributos ["columnas"] = ''; // El control ocupa 47% del tamaño del formulario
			echo $this->miFormulario->campoMensaje ( $atributos );
			unset ( $atributos );
		}
		
		return true;
	}
}
$miFormulario = new Formulario ( $this->lenguaje, $this->miFormulario, $this->sql );
$miFormulario->formulario ();
$miFormulario->mensaje ();

function fecha_es($fecha) {
	$meses = array (
			'01' => 'Enero',
			'02' => 'Febrero',
			'03' => 'Marzo',
			'04' => 'Abril',
			'05' => 'Mayo',
			'06' => 'Junio',
			'07' => 'Julio',
			'08' => 'Agosto',
			'09' => 'Septiembre',
			'10' => 'Octubre',
			'11' => 'Noviembre',
			'12' => 'Diciembre'
	);
	return $meses[$fecha['mes']] . " " . $fecha['dia'] . ", " . $fecha['anio'] . " - " . $fecha['hora'];
}
?>
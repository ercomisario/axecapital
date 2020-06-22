--
-- Base de datos: `smc_axecapital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_asesor`
--

CREATE TABLE t_asesor (
co_asesor integer NOT NULL,
  tx_asesor varchar(250) NOT NULL,
  tx_email varchar(250) NOT NULL
);

--
-- Volcado de datos para la tabla `t_asesor`
--

INSERT INTO t_asesor (co_asesor, tx_asesor, tx_email) VALUES
(1, 'ABOG. JESUS BELIZARIO', 'belizarioja@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cita`
--

CREATE TABLE t_cita (
co_cita integer NOT NULL,
  co_cliente integer NOT NULL,
  co_asesor integer NOT NULL,
  fe_cita date NOT NULL,
  ho_cita time NOT NULL,
  co_estatus integer NOT NULL
);

--
-- Volcado de datos para la tabla `t_cita`
--

INSERT INTO t_cita (co_cita, co_cliente, co_asesor, fe_cita, ho_cita, co_estatus) VALUES
(1, 1, 1, '2018-08-29', '08:30:00', 1),
(2, 1, 1, '2018-08-30', '04:30:00', 1),
(3, 1, 1, '2018-08-31', '15:45:00', 1),
(4, 1, 1, '2018-08-31', '11:53:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cliente`
--

CREATE TABLE t_cliente (
co_cliente integer NOT NULL,
  tx_dni_cliente varchar(20) NOT NULL,
  tx_nombre varchar(250) NOT NULL,
  nu_edad integer NOT NULL,
  tx_telefono varchar(20) NOT NULL,
  tx_direccion varchar(250) NOT NULL,
  tx_referencia varchar(250) NOT NULL,
  tx_trabajo varchar(500) NOT NULL,
  va_sueldo numeric(10,2) NOT NULL,
  va_linea_tc numeric(10,2) NOT NULL,
  tx_hijos varchar(10) NOT NULL,
  tx_hipoteca varchar(20) NOT NULL,
  tx_vehiculo varchar(100) NOT NULL,
  tx_email varchar(250) NOT NULL,
  tx_sbs varchar(50) NOT NULL
);

--
-- Volcado de datos para la tabla `t_cliente`
--

INSERT INTO t_cliente (co_cliente, tx_dni_cliente, tx_nombre, nu_edad, tx_telefono, tx_direccion, tx_referencia, tx_trabajo, va_sueldo, va_linea_tc, tx_hijos, tx_hipoteca, tx_vehiculo, tx_email, tx_sbs) VALUES
(1, '123456', 'LUIS MARTIN VALLES', 43, '4234234', 'AVENIDA', 'TERTERTERTERT', 'TTTTTTTT', 13000.00, 23000.00, '2', '', 'FORD FOCUS', 'kkkk@mm.com', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_estatus`
--

CREATE TABLE t_estatus (
  co_estatus integer NOT NULL,
  tx_estatus varchar(50) NOT NULL
);

--
-- Volcado de datos para la tabla `t_estatus`
--

INSERT INTO t_estatus (co_estatus, tx_estatus) VALUES
(1, 'ACTVA'),
(2, 'CANCELADA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_permisologia`
--

CREATE TABLE t_permisologia (
  co_permisologia integer NOT NULL,
  tx_permisologia varchar(100) NOT NULL
);

--
-- Volcado de datos para la tabla `t_permisologia`
--

INSERT INTO t_permisologia (co_permisologia, tx_permisologia) VALUES
(1, 'ADMINISTRADOR'),
(2, 'USUARIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuario`
--

CREATE TABLE t_usuario (
co_usuario integer NOT NULL,
  tx_usuario varchar(50) NOT NULL,
  tx_nombre varchar(250) NOT NULL,
  tx_clave varchar(100) NOT NULL,
  co_permisologia integer NOT NULL
);

--
-- Volcado de datos para la tabla `t_usuario`
--

INSERT INTO t_usuario (co_usuario, tx_usuario, tx_nombre, tx_clave, co_permisologia) VALUES
(1, 'admin', 'YULE SOSA', '123456', 1);

--
-- Índices para tablas volcadas
--

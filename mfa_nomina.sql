# Host: localhost  (Version 5.5.5-10.4.14-MariaDB)
# Date: 2021-04-06 02:08:35
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "tab_asistencia"
#

CREATE TABLE `tab_asistencia` (
  `id_empleado` varchar(5) NOT NULL DEFAULT '0',
  `fecha` date NOT NULL,
  `nom_empleado` varchar(100) NOT NULL DEFAULT '0',
  `status` varchar(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_empleado`,`fecha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_asistencia"
#

INSERT INTO `tab_asistencia` VALUES ('004','2021-01-31','Barriga Reyes Gerardo','2'),('004','2021-02-01','Barriga Reyes Gerardo','RR'),('004','2021-02-02','Barriga Reyes Gerardo','1'),('004','2021-02-03','Barriga Reyes Gerardo','1'),('004','2021-02-04','Barriga Reyes Gerardo','R'),('004','2021-02-05','Barriga Reyes Gerardo','F'),('004','2021-02-06','Barriga Reyes Gerardo','1'),('004','2021-02-07','Barriga Reyes Gerardo','1'),('004','2021-02-08','Barriga Reyes Gerardo','1'),('153','2021-01-31','Leal García Víctor Manuel','1'),('153','2021-02-01','Leal García Víctor Manuel','1'),('153','2021-02-02','Leal García Víctor Manuel','R'),('153','2021-02-03','Leal García Víctor Manuel','RR'),('153','2021-02-04','Leal García Víctor Manuel','1'),('153','2021-02-05','Leal García Víctor Manuel','1'),('153','2021-02-06','Leal García Víctor Manuel','1'),('153','2021-02-07','Leal García Víctor Manuel','1'),('153','2021-02-08','Leal García Víctor Manuel','1'),('316','2021-01-31','Gutierrez Lechuga Brandon Manuel','1'),('316','2021-02-01','Gutierrez Lechuga Brandon Manuel','1'),('316','2021-02-02','Gutierrez Lechuga Brandon Manuel','2'),('316','2021-02-03','Gutierrez Lechuga Brandon Manuel','1'),('316','2021-02-04','Gutierrez Lechuga Brandon Manuel','1'),('316','2021-02-05','Gutierrez Lechuga Brandon Manuel','1'),('316','2021-02-06','Gutierrez Lechuga Brandon Manuel','1'),('316','2021-02-07','Gutierrez Lechuga Brandon Manuel','1'),('316','2021-02-08','Gutierrez Lechuga Brandon Manuel','1');

#
# Structure for table "tab_baja"
#

CREATE TABLE `tab_baja` (
  `id_empleado` varchar(5) NOT NULL DEFAULT '',
  `fecha` date DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `motivo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_baja"
#


#
# Structure for table "tab_bono"
#

CREATE TABLE `tab_bono` (
  `id_empleado` varchar(5) NOT NULL DEFAULT '',
  `bono` double(11,2) DEFAULT NULL,
  `motivo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_bono"
#


#
# Structure for table "tab_caja"
#

CREATE TABLE `tab_caja` (
  `id_empleado` varchar(5) NOT NULL DEFAULT '',
  `caja_ahorro` double(11,2) DEFAULT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_caja"
#

INSERT INTO `tab_caja` VALUES ('153',100.00),('316',100.00);

#
# Structure for table "tab_cedis"
#

CREATE TABLE `tab_cedis` (
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `direccion` varchar(100) NOT NULL DEFAULT '',
  `colonia` varchar(10) NOT NULL DEFAULT '',
  `codigo_postal` varchar(5) NOT NULL DEFAULT '',
  `rfc` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_cedis"
#

INSERT INTO `tab_cedis` VALUES ('MAYOREO FERRETERO ATLAS S.A. DE C.V.','CALZADA INDEPENDENCIA SUR 375 ','ANALCO','44450','MFA030403T73');

#
# Structure for table "tab_empleado"
#

CREATE TABLE `tab_empleado` (
  `id_empleado` varchar(5) NOT NULL DEFAULT '0',
  `status_empleado` varchar(50) NOT NULL DEFAULT 'ACTIVO',
  `apellido_pat_empleado` varchar(25) NOT NULL DEFAULT '',
  `apellido_mat_empleado` varchar(25) NOT NULL DEFAULT '',
  `nombre_empleado` varchar(50) NOT NULL DEFAULT '',
  `domicilio_empleado` varchar(100) NOT NULL DEFAULT '',
  `colonia_empleado` varchar(100) NOT NULL DEFAULT '',
  `codigo_postal_empleado` varchar(5) NOT NULL DEFAULT '',
  `ciudad_empleado` varchar(25) NOT NULL DEFAULT '',
  `estado_empleado` varchar(20) NOT NULL DEFAULT '',
  `NSS_empleado` varchar(11) NOT NULL DEFAULT '',
  `RFC_empleado` varchar(13) NOT NULL DEFAULT '',
  `CURP_empleado` varchar(18) NOT NULL DEFAULT '',
  `sexo_empleado` varchar(10) NOT NULL DEFAULT '',
  `fecha_nacimiento_empleado` date DEFAULT NULL,
  `pais_nacimiento_empleado` varchar(25) NOT NULL DEFAULT '',
  `estado_nacimiento_empleado` varchar(25) NOT NULL DEFAULT '',
  `ciudad_nacimiento_empleado` varchar(25) NOT NULL DEFAULT '',
  `estado_civil_empleado` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_empleado"
#

INSERT INTO `tab_empleado` VALUES ('004','ACTIVO','Barriga','Reyes','Gerardo','RIO BENUE #1430','JARDINES DEL ROSARIO','44890','GUADAJALARA','JALISCO','04825704317','BARG5711051K5','BARG571105HDFRYR04','Masculino','1957-11-05','MÉXICO','MÉXICO','DF','CASADO'),('153','ACTIVO','Leal','García','Víctor Manuel','AV. FEDERALISMO#817','MODERNA','44190','GUADAJALARA','JALISCO','O4967725898','LEGN770406F49','LEGN770406HJCLRC07','Masculino','1977-04-06','México','GUADALAJARA','JALISCO','CASADO'),('316','ACTIVO','Gutierrez','Lechuga','Brandon Manuel','FLOR DE SANTA MARIA #52','GUAYABITOS/ARROYO HONDO','45530','TLAQUEPAQUE','JALISCO','4129488037','GULB940724LB1','GULB940724HJCTCR00','Masculino','1994-07-24','MÉXICO','JALISCO','GUADAJALARA','SOLTERO');

#
# Structure for table "tab_extra"
#

CREATE TABLE `tab_extra` (
  `id_empleado` varchar(5) NOT NULL DEFAULT '',
  `dias` int(11) DEFAULT NULL,
  `horas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_extra"
#


#
# Structure for table "tab_incapacidad"
#

CREATE TABLE `tab_incapacidad` (
  `id_empleado` varchar(5) NOT NULL DEFAULT '',
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `dias` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_incapacidad"
#


#
# Structure for table "tab_infonavit"
#

CREATE TABLE `tab_infonavit` (
  `id_empleado` varchar(5) NOT NULL DEFAULT '',
  `descuento` double(11,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_infonavit"
#

INSERT INTO `tab_infonavit` VALUES ('153',403.00);

#
# Structure for table "tab_patron"
#

CREATE TABLE `tab_patron` (
  `razon_cedis` varchar(100) NOT NULL DEFAULT '',
  `dir_cedis` varchar(255) NOT NULL DEFAULT '',
  `col_cedis` varchar(255) NOT NULL DEFAULT '',
  `cp_cedis` varchar(255) NOT NULL DEFAULT '',
  `rfc_cedis` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`razon_cedis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_patron"
#

INSERT INTO `tab_patron` VALUES ('MAYOREO FERRETERO ATLAS S.A. DE C.V.','CALZADA INDEPENDENCIA SUR 375',' ANALCO','44450','MFA030403T73');

#
# Structure for table "tab_prestamo"
#

CREATE TABLE `tab_prestamo` (
  `id_empleado` varchar(5) NOT NULL DEFAULT '',
  `cantidad_prestamo` double(11,2) DEFAULT NULL,
  `descuento_semana` double(11,2) DEFAULT NULL,
  `cantidad_restante` double(11,2) DEFAULT NULL,
  `finiquitado` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_prestamo"
#

INSERT INTO `tab_prestamo` VALUES ('153',1000.00,100.00,1000.00,'No');

#
# Structure for table "tab_puesto"
#

CREATE TABLE `tab_puesto` (
  `id_empleado` varchar(5) NOT NULL DEFAULT '0',
  `puesto` varchar(50) NOT NULL DEFAULT 'SIN ASIGNAR',
  `nombre_supervisor` varchar(100) NOT NULL DEFAULT 'SIN ASIGNAR',
  `fecha_contrato` date DEFAULT NULL,
  `fecha_fin_contrato` date DEFAULT NULL,
  `edificio_agencia` varchar(100) NOT NULL DEFAULT 'SIN ASIGNAR',
  `turno` varchar(25) NOT NULL DEFAULT 'SIN ASIGNAR',
  `status` varchar(25) NOT NULL DEFAULT 'SIN ASIGNAR',
  `nuevo_contrato` date DEFAULT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_puesto"
#

INSERT INTO `tab_puesto` VALUES ('004','Chofer','Gibran Elias Cruz Arias','2008-04-01','2008-04-01','MAYOREO FERRETERO ATLAS S.A. DE C.V.','Completo','Planta','2021-02-06'),('153','Centro de Servicio','Juan Manuel Cruz Alvarado','2016-06-02','2016-07-02','MAYOREO FERRETERO ATLAS S.A. DE C.V.','Completo','Planta','2016-06-02'),('316','Becario Sistemas','Omar Gallegos','2020-09-07','2020-09-07','MAYOREO FERRETERO ATLAS S.A. DE C.V.','Medio Turno','Prueba','2021-02-06');

#
# Structure for table "tab_seguro"
#

CREATE TABLE `tab_seguro` (
  `id_empleado` varchar(5) NOT NULL DEFAULT '0',
  `unidad_medica_familiar` varchar(3) DEFAULT NULL,
  `sueldo_diario_imss` double(11,2) DEFAULT NULL,
  `alta_imss` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_seguro"
#

INSERT INTO `tab_seguro` VALUES ('004','034',150.00,'VIGENTE'),('316','034',150.00,'VIGENTE');

#
# Structure for table "tab_sueldo"
#

CREATE TABLE `tab_sueldo` (
  `id_empleado` varchar(5) NOT NULL DEFAULT '0',
  `sueldo_diario` double(11,2) NOT NULL DEFAULT 0.00,
  `salario` double(11,2) NOT NULL DEFAULT 0.00,
  `fiscal` double(11,2) NOT NULL DEFAULT 0.00,
  `complemento` double(11,2) NOT NULL DEFAULT 0.00,
  `pago_neto` double(11,2) NOT NULL DEFAULT 0.00,
  `numero_cuenta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "tab_sueldo"
#

INSERT INTO `tab_sueldo` VALUES ('004',242.86,1700.00,140.00,1560.00,1560.00,0),('153',428.57,3000.00,789.80,2210.20,2210.20,0),('316',285.71,2000.00,1066.20,933.80,933.80,0);

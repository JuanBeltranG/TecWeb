drop database if exists NuevoIngresoESCOM;
create database NuevoIngresoESCOM;
use NuevoIngresoESCOM;


create table IdentidadEstudiante(
	Id_usuario  int(3) not null auto_increment primary key, /*Prefieren la BOLETA o CURP como PK?*/
	NoBoleta    varchar(11) not null,
	Nombre      varchar(30),
	Apat        varchar(30),
	Amat        varchar(30),
	FechaNacimiento date,
	Genero      varchar(30),
	CURP        varchar(18)
);

create table ContactoEstudiante(
	Id_usuario        int(3),
	Calle             varchar(50),
    Numero            int(4),
    Colonia           varchar(50),
    Alcaldia          varchar(50),
    CodigoPostal      int(5),
    Telefono          varchar(20),
    CorreoElectronico varchar(50),
    foreign key (Id_usuario) references IdentidadEstudiante (Id_usuario)
);

create table ProcedenciaEstudiante(
	Id_usuario         int(3),
	EscuelaProcedencia varchar(50),
    EntidadProcedencia varchar(50),
    Promedio           float(2,2),
    NumOpcion          int(1),/*Numero de opcion que fue ESCOM*/
    foreign key (Id_usuario) references IdentidadEstudiante (Id_usuario)
);



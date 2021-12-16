drop database if exists NuevoIngresoESCOM;
create database NuevoIngresoESCOM;
use NuevoIngresoESCOM;


create table IdentidadAlumno(
	Id_Alumno  int(3) not null auto_increment primary key, /*Prefieren la BOLETA o CURP como PK?*/
	NoBoleta    varchar(10) not null,
	Nombre      varchar(30),
	ApellidoP        varchar(30),
	ApellidoM        varchar(30),
	FechaNacimiento date,
	Genero      varchar(30),
	CURP        varchar(18)
);

create table ContactoAlumno(
	Id_Alumno        int(3),
	Calle             varchar(50), /*Creo que es innecesario el numero*/
    Colonia           varchar(50),
    Alcaldia          varchar(50),
    CodigoPostal      int(5),
    Telefono          int(10),
    Email varchar(50),
    foreign key (Id_Alumno) references IdentidadAlumno (Id_Alumno)
);

create table ProcedenciaAlumno(
	Id_Alumno         int(3),
	Escuela varchar(50),
    Entidad varchar(50),
    Promedio           float(2,2),
    NumOpcion          int(1),/*Numero de opcion que fue ESCOM*/
    foreign key (Id_Alumno) references IdentidadAlumno (Id_Alumno)
);

create table Laboratorios(
	Id_Laboratorio int(3) not null auto_increment primary key, 
    Nombre varchar(50)
);

create table Alumno_Laboratorio(
	Id_Laboratorio int not null,
    Id_Alumno int not null
);

drop procedure if exists AltaAlumno;
delimiter **
create procedure AltaAlumno(
in Boleta nvarchar(10),
in NombreA varchar(30),
in ApellidoPA varchar(30),
in ApellidoMA varchar(30),
in FNacimiento date,
in GeneroA varchar(500), 
in CurpA nvarchar(18), 
in CalleA nvarchar(50),
in ColoniaA varchar(50),
in AlcaldiaA nvarchar(50),
in codigoPA int(5), 
in TelefonoA int(10), 
in CorreoA nvarchar(50),
in EscuelaPA nvarchar(50),
in EntidadPA nvarchar(50),
in PromedioA float,
in NumeroPA int(1))
begin
declare existe int;
declare mjs nvarchar(50);
declare idAlumno int;
	set existe = (select count(*) from IdentidadAlumno where NoBoleta = Boleta );
			if(existe = 0)then
				INSERT INTO IdentidadAlumno(NoBoleta,Nombre,ApellidoP,ApellidoM,FechaNacimiento,Genero,CURP) 
				values (Boleta,NombreA,ApellidoPA,ApellidoMA,FNacimiento,GeneroA,CurpA);
                set idAlumno = (select Id_Alumno from IdentidadAlumno where NoBoleta = Boleta);  
                INSERT INTO ContactoAlumno(Id_Alumno,Calle,Colonia,Alcaldia,CodigoPostal,Telefono,Email) 
				values (idAlumno,CalleA,ColoniaA,AlcaldiaA,CodigoPA,TelefonoA,CorreoA);
                INSERT INTO ProcedenciaAlumno(Id_Alumno,Escuela,Entidad,Promedio,NumOpcion) 
				values (idAlumno,EscuelaPA,EntidadPA,PromedioA,NumeroPA);               
				set mjs = 'Alumno registrado';
			else
				set mjs = 'Alumno existente';
			end if;
select idAlumno as usuario, mjs as mensaje;
end**

call AltaAlumno(2020630244,'Esteban','MonteAlban','Garcia','01-01-01','Masculino','LAQQWNHSTAPREIQJDA','Calle 1','Colonia A','Iztapalapa',01010,1234567891,'a@gmail.com','Bacho','Estado de Mexico',1266.5543,1)**
select * from IdentidadAlumno**
select * from ContactoAlumno**
select * from ProcedenciaAlumno**


drop procedure if exists ActualizaAlumno;
delimiter **
create procedure ActualizaAlumno(
in Boleta nvarchar(10),
in NombreA varchar(30),
in ApellidoPA varchar(30),
in ApellidoMA varchar(30),
in FNacimiento date,
in GeneroA varchar(500), 
in CurpA nvarchar(18), 
in CalleA nvarchar(50),
in ColoniaA varchar(50),
in AlcaldiaA nvarchar(50),
in codigoPA int(5), 
in TelefonoA int(10), 
in CorreoA nvarchar(50),
in EscuelaPA nvarchar(50),
in EntidadPA nvarchar(50),
in PromedioA float,
in NumeroOA int(1))
begin
declare existe int;
declare mjs nvarchar(50);
declare idAlumno int;
	set existe = (select count(*) from IdentidadAlumno where NoBoleta = Boleta);
    set idAlumno = (select Id_Alumno from IdentidadAlumno where NoBoleta = Boleta);  
			if(existe = 1)then
				update ContactoAlumno set
                Calle = CalleA,
                Colonia = ColoniaA,
                Alcaldia = AlcaldiaA,
                CodigoPostal = CodigoPA,
                Telefono = TelefonoA,
                Email = CorreoA
                where Id_Alumno = idAlumno;
                update ProcedenciaAlumno set
                Escuela = EscuelaPA,
                Entidad = EntidadPA,
                Promedio = PromedioA,
                NumOpcion = NumeroOA
                where Id_Alumno = idAlumno;
				update IdentidadAlumno set  
                Nombre = NombreA, 
                ApellidoP = ApellidoPA,
                ApellidoM = ApellidoMA,
                FechaNacimiento = FNacimiento,
                Genero = GeneroA,
                CURP = CurpA
                where Id_Alumno = idAlumno;
				set mjs = 'Alumno Actualizado';
			else
				set mjs = 'No se pudo Actualizar Alumno';
			end if;
select idAlumno as usuario, mjs as mensaje;
end**
call ActualizaAlumno(2020630244,'Rodrigo','Lozada','slobotzky','01-01-01','Masculino','LAQQWNHSTAPREIQJDA','Calle 1','Colonia A','Iztapalapa',01010,1234567891,'a@gmail.com','Bacho','Estado de Mexico',1266.5543,1)**


drop procedure if exists EliminaAlumno;
delimiter **
create procedure EliminaAlumno(in Boleta varchar(100))
begin
	declare msj varchar(80);
    declare existe int;
    declare idAlumno int;
	set existe = (select count(*) from IdentidadAlumno where NoBoleta = Boleta);
    set idAlumno = (select Id_Alumno from IdentidadAlumno where NoBoleta = Boleta);
		if(existe = 1)then
			/*elimnar todos los registros de las demas tablas*/
			delete from ProcedenciaAlumno where Id_Alumno = idAlumno;
            delete from ContactoAlumno where Id_Alumno = idAlumno;
            delete from IdentidadAlumno where Id_Alumno = idAlumno;
			set msj = 'Alumno eliminado';
			select idAlumno as usuario , msj as mensaje, Boleta as Boleta ;
		else
			set msj = 'El alumno no existe';
			select idAlumno as usuario , msj as mensaje, Boleta as Boleta ;
		end if;
end;**
delimiter ;

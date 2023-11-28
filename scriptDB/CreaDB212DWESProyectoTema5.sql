-- Author: Oscar Pascual Ferrero
-- Created: 22 11 2023

-- Crear la base de datos
CREATE DATABASE DB212DWESProyectoTema5;

-- Nos conectamos en la BBDD
USE DB212DWESProyectoTema5;

--Crear la tabla T01_Usuario
CREATE TABLE T01_Usuario (
    T01_CodUsuario CHAR(8) PRIMARY KEY,
    T01_Password VARCHAR(64),
    T01_DescUsuario VARCHAR(255),
    T01_NumConexiones INT DEFAULT 0,
    T01_FechaHoraUltimaConexion DATETIME DEFAULT CURRENT_TIMESTAMP,
    T01_Perfil ENUM('usuario','administrador') DEFAULT 'usuario',
    T01_ImagenUsuario BLOB
)ENGINE=INNODB;

-- Crear tabla de datos
CREATE TABLE T02_Departamento (
    T02_CodDepartamento CHAR(3) PRIMARY KEY,
    T02_DescDepartamento VARCHAR(255),
    T02_FechaCreacionDepartamento DATETIME,
    T02_VolumenDeNegocio FLOAT,
    T02_FechaBajaDepartamento DATETIME  -- Cambiado a DATETIME
    
)ENGINE=INNODB;

--Creación del usuario de la base de datos
CREATE USER 'user212DWESProyectoTema5'@'%' IDENTIFIED BY 'paso';

--Otorgar permisos al usuario para acceder a la base de datos
GRANT ALL PRIVILEGES ON DB212DWESProyectoTema5.* TO 'user212DWESProyectoTema5'@'%';

--Creación del usuario de la base de datos para el usuario de explotación
CREATE USER 'user1&1DAW212'@'%' IDENTIFIED BY 'paso';

--Otorgar permisos al usuario de explotación para acceder a la base de datos
GRANT ALL PRIVILEGES ON DB212DWESProyectoTema5.* TO 'user1&1DAW212'@'%';
                        

-- Recargar los privilegios
FLUSH PRIVILEGES;


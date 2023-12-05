-- Author: Oscar Pascual Ferrero
-- Created: 28 11 2023

-- Crear la base de datos
CREATE DATABASE DB212DWESLoginLogoffTema5;

-- Nos conectamos en la BBDD
USE DB212DWESLoginLogoffTema5;

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
CREATE USER 'user212DWESLoginLogoffTema5'@'%' IDENTIFIED BY 'paso';

--Otorgar permisos al usuario para acceder a la base de datos
GRANT ALL PRIVILEGES ON DB212DWESLoginLogoffTema5.* TO 'user212DWESLoginLogoffTema5'@'%';
                        

-- Recargar los privilegios
FLUSH PRIVILEGES;


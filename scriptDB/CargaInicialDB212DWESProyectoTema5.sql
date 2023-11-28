-- Author: Oscar Pascual Ferrero
-- Created: 22 11 2023

-- Inserto los datos iniciales en la tabla T01_Usuario con contraseñas cifradas en SHA-256
INSERT INTO T01_Usuario (T01_CodUsuario, T01_Password, T01_DescUsuario, T01_Perfil) VALUES
('admin', SHA2(CONCAT('admin', 'paso'), 256), 'administrador', 'administrador'),
('alvaro', SHA2(CONCAT('alvaro', 'paso'), 256), 'Álvaro Cordero Miñambres', 'usuario'),
('carlos', SHA2(CONCAT('carlos', 'paso'), 256), 'Carlos García Cachón', 'usuario'),
('oscar', SHA2(CONCAT('oscar', 'paso'), 256), 'Oscar Pascual Ferrero', 'usuario'),
('borja', SHA2(CONCAT('borja', 'paso'), 256), 'Borja Nuñez Refoyo', 'usuario'),
('rebeca', SHA2(CONCAT('rebeca', 'paso'), 256), 'Rebeca Sánchez Pérez', 'usuario'),
('erika', SHA2(CONCAT('erika', 'paso'), 256), 'Erika Martínez Pérez', 'usuario'),
('ismael', SHA2(CONCAT('ismael', 'paso'), 256), 'Ismael Ferreras García', 'usuario'),
('heraclio', SHA2(CONCAT('heraclio', 'paso'), 256), 'Heraclio Borbujo Moran', 'administrador'),
('amor', SHA2(CONCAT('amor', 'paso'), 256), 'Amor Rodriguez Navarro', 'administrador');

-- Insertar filas de datos en la tabla Departamentos
INSERT INTO T02_Departamento (T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenDeNegocio, T02_FechaBajaDepartamento) VALUES
('VTS', 'Ventas', '2023-03-15 10:30:00', 50000.00, '2023-01-01 08:00:00'),
('RCH', 'Recursos Humanos', '2023-05-20 08:45:00', 25000.50, NULL),
('MKT', 'Marketing', '2023-12-10 15:20:00', 75000.25, '2023-10-01 08:00:00'),
('LGT', 'Logística', '2023-01-25 12:00:00', 60000.75, NULL),
('TCN', 'Tecnología', '2023-09-02 09:15:00', 80000.30, NULL),
('CNT', 'Contabilidad', '2023-11-18 14:00:00', 45000.90, NULL);



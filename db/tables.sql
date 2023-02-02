/* Tabla para el token de recuperar contraseña */
CREATE TABLE pwdReset(
    pwdResetId int(11),
    pwdResetEmail TEXT,
    pwdResetSelector TEXT,
    pwdResetToken LONGTEXT,
    pwdExpires TEXT
);
/* Tabla de usuarios */
CREATE TABLE usuarios(
    id_usuarios int primary key AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    no_empleado BIGINT NOT NULL,
    fecha_nacimiento DATE,
    correo VARCHAR(100) NOT NULL,
    foto_perfil VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    telefono VARCHAR(11) NOT NULL,
    rol VARCHAR(15) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    estatus VARCHAR(15) NOT NULL,
)
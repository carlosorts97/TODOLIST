# TODOLIST
# Sentencia SQL para crear la base de datos.
CREATE DATABASE todolist;

USE todolist;

CREATE TABLE usuarios
(
id_usuario INT AUTO_INCREMENT PRIMARY KEY,
nombre_usuario VARCHAR(50) NOT NULL,
contrasena VARCHAR(64) NOT NULL,
email VARCHAR(70) NOT NULL
)

CREATE TABLE tasks
(
id_task INT AUTO_INCREMENT PRIMARY KEY,
descripcion VARCHAR(70) NOT NULL,
fecha DATE NOT NULL,
completada BOOLEAN DEFAULT 0 NOT NULL,
usuario INT NOT NULL,

FOREIGN KEY(usuario) REFERENCES usuarios(id_usuario)
);

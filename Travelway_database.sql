--SUBO EL ARCHIVO SQL QUE COLOQUÉ EN LA BASE DE DATOS PARA TENERLO ENCUENTA

CREATE TABLE usuarios(
  id_usuario SERIAL,
  nombre VARCHAR(50),
  apellidos VARCHAR(100),
  edad INT,
  email VARCHAR(100),
  CONSTRAINT PK_usuarios PRIMARY KEY (id_usuario)
);
CREATE TABLE pasaporte(
  id_pasaporte SERIAL,
  numero VARCHAR(20),
  fecha_expedicion DATE,
  caducidad DATE,
  id_usuario INT UNIQUE,  -- Relación 1:1 con USUARIOS con restricción de existencia
  CONSTRAINT PK_pasaporte PRIMARY KEY (id_pasaporte),
  CONSTRAINT FK_pasaporte_usuarios FOREIGN KEY (id_usuario) REFERENCES usuarios
  ON DELETE RESTRICT
  ON UPDATE CASCADE,
  CONSTRAINT UK_pasaporte_usuarios UNIQUE (id_usuario)
  );

CREATE TABLE destino(
  id_destino SERIAL,
  ciudad VARCHAR(100),
  pais VARCHAR(100),
  requiere_pasaporte BOOLEAN,
  CONSTRAINT PK_destino PRIMARY KEY (id_destino)
);

CREATE TABLE guia(
  id_guia SERIAL,
  nombre VARCHAR(50),
  apellidos VARCHAR(100),
  especialidad VARCHAR(100),
  id_destino INT UNIQUE,  -- Relación N:1 con DESTINO 
  CONSTRAINT PK_guia PRIMARY KEY (id_guia),
  CONSTRAINT FK_guia_destino FOREIGN KEY (id_destino) REFERENCES destino
  ON DELETE CASCADE
  ON UPDATE CASCADE
);

CREATE TABLE hace_reserva(
  id_reserva SERIAL,
  id_usuario INT,
  id_destino INT,
  fecha_reserva DATE,
  fecha_viaje DATE,
  CONSTRAINT PK_hace_reserva PRIMARY KEY (id_reserva),
  CONSTRAINT FK_hace_reserva_usuarios FOREIGN KEY (id_usuario) REFERENCES usuarios,
  CONSTRAINT FK_hace_reserva_destino FOREIGN KEY (id_destino) REFERENCES destino
);

ALTER TABLE usuarios
ADD username VARCHAR(30);

ALTER TABLE usuarios
ADD password VARCHAR (30);

ALTER TABLE pasaporte
ADD creado_por INT;

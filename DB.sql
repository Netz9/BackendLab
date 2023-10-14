-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2023-10-14 04:17:34.403

-- tables
-- Table: tipoPlaca
CREATE TABLE tipoPlaca (
    id int AUTO_INCREMENT NOT NULL,
    tipo varchar(255)  NOT NULL,
    descripcion varchar(255)  NOT NULL,
    createdAt datetime  NOT NULL,
    updatedAt datetime  NOT NULL,
    CONSTRAINT tipoPlaca_pk PRIMARY KEY  (id)
);

-- Table: vehiculo
CREATE TABLE vehiculo (
    id int AUTO_INCREMENT NOT NULL,
    nitPropietario varchar(255)  NOT NULL,
    cuiPropietario varchar(255)  NOT NULL,
    nombrePropietario varchar(255)  NOT NULL,
    tipoPlaca_id int  NOT NULL,
    placa varchar(255)  NOT NULL,
    marca varchar(255)  NOT NULL,
    linea varchar(255)  NOT NULL,
    modelo varchar(255)  NOT NULL,
    vin varchar(255)  NOT NULL,
    chasis varchar(255)  NOT NULL,
    color varchar(255)  NOT NULL,
    estadoActivo bit  NOT NULL,
    createdAt datetime  NOT NULL,
    updatedAt datetime  NOT NULL,
    CONSTRAINT vehiculo_pk PRIMARY KEY  (id)
);

-- foreign keys
-- Reference: vehiculo_tipoPlaca (table: vehiculo)
ALTER TABLE vehiculo ADD CONSTRAINT vehiculo_tipoPlaca
    FOREIGN KEY (tipoPlaca_id)
    REFERENCES tipoPlaca (id);

-- End of file.


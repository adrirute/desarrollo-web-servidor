create schema tienda;
use tienda;

CREATE TABLE Productos(
	idProducto INT PRIMARY KEY auto_increment,
    nombreProducto VARCHAR(40) NOT NULL,
    precio NUMERIC(7,2) NOT NULL,
    descripcion VARCHAR(255) NOT NULL,
    cantidad NUMERIC(7,2) NOT NULL
);
-- Para añadir la columna Imagen
ALTER TABLE Productos
		ADD COLUMN imagen VARCHAR(100);
    
    
	set sql_safe_updates = 0;

CREATE TABLE Usuarios(
	usuario VARCHAR(12) PRIMARY KEY,
    contrasena VARCHAR(255) NOT NULL,
    fechaNacimiento DATE NOT NULL
);

CREATE TABLE Cestas(
	idCesta INT PRIMARY KEY auto_increment,
    usuario VARCHAR(12) NOT NULL,
    CONSTRAINT fk_usuarioCestas FOREIGN KEY (usuario) REFERENCES usuarios (usuario),
    precioTotal NUMERIC(7,2) DEFAULT 0 NOT NULL
);

DROP TABLE cestas;


CREATE TABLE ProductosCestas(
	idProducto INT,
    idCesta INT,
    cantidad NUMERIC(2),
    CONSTRAINT pk_productosCestas PRIMARY KEY (idProducto, idCesta),
    CONSTRAINT fk_productosCestas_productos FOREIGN KEY (idproducto) REFERENCES productos (idProducto),
    CONSTRAINT fk_productosCestas_cestas FOREIGN KEY (idCesta) REFERENCES cestas (idCesta)
);

alter TABLE Usuarios
	add column rol varchar(50) default 'cliente';
    
create table Pedidos (
	idPedido INT PRIMARY KEY auto_increment,
    usuario varchar(12),
    precioTotal numeric (7,2) not null,
    fecha_pedido timestamp default current_timestamp,
    constraint fk_Pedidos_usuarios foreign key (usuario) references Usuarios (usuario)
);


create table LineaPedido (
	lineaPedido numeric(2),
    idProducto int,
    idPedido int,
    precioUnitario numeric (7,2),
    cantidad numeric (2), -- viene de tabla productoCestas
    constraint fk_LineaPedido_ProductosCesta foreign key (idProducto) references Productos (idProducto),
    constraint fk_LineaPedido_Pedidos foreign key (idPedido) references Pedidos (idPedido)
);

select * from Productos;
select * from Usuarios;
select * from Cestas;
select * from ProductosCestas;

select * from Pedidos;
select * from LineaPedido;




delete from Pedidos where usuario  = 'adri';

delete from Usuarios where usuario = 'javier';
delete from Productos where nombreProducto = 'Bolso';


select p.nombreProducto as nombre, p.precio as precio, p.imagen as imagen, c.idCesta as idCesta, c.cantidad as cantidad
from Productos p
join ProductosCestas c
on (p.idProducto = c.idProducto);



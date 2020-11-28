
DROP TABLE IF EXISTS clientes;
CREATE TABLE IF NOT EXISTS clientes (
 id INTEGER NOT NULL AUTO_INCREMENT,
 web_id INTEGER DEFAULT '0',
 codigo_erp VARCHAR(255),
 vendedor_erp VARCHAR(255),
 vendedor_id INTEGER,
 orden integer DEFAULT '9999',
 zona_id INTEGER,
 nombre VARCHAR(255),
 estado VARCHAR(255),
 direccion VARCHAR(255),
 pais VARCHAR(255),
 localidad VARCHAR(255),
 provincia VARCHAR(255),
 email VARCHAR(255),
 telefono VARCHAR(255),
 cuit VARCHAR(255),
 iva INTEGER,
 precio_lista INTEGER,
 limite_credito REAL,
 observaciones TEXT,
 descuento REAL,
 transporte INTEGER,
 forma_de_pago INTEGER,
 tipo_id INTEGER,
 PRIMARY KEY(id)
);
DROP TABLE IF EXISTS filtros;
CREATE TABLE IF NOT EXISTS filtros (
 id integer NOT NULL,
 codigo_erp VARCHAR(255),
 nombre VARCHAR(255),
 query VARCHAR(255) DEFAULT 'N',
 orden VARCHAR(255) DEFAULT 'N',
 PRIMARY KEY(id AUTOINCREMENT)
);
DROP TABLE IF EXISTS filtros_valores;
CREATE TABLE IF NOT EXISTS filtros_valores (
 filtro_id INTEGER,
 id INTEGER,
 nombre VARCHAR(255),
 query VARCHAR(255) DEFAULT '',
 orden VARCHAR(255) DEFAULT ''
);
DROP TABLE IF EXISTS gps;
CREATE TABLE IF NOT EXISTS gps (
 id integer NOT NULL,
 usuario_email VARCHAR(255),
 usuario_erp VARCHAR(255),
 tipo VARCHAR(255),
 lat VARCHAR(255),
 long VARCHAR(255),
 timestamp VARCHAR(255),
 PRIMARY KEY(id AUTOINCREMENT)
);
DROP TABLE IF EXISTS pagos;
CREATE TABLE IF NOT EXISTS pagos (
 id integer NOT NULL,
 codigo_erp VARCHAR(255),
 nombre VARCHAR(255) NOT NULL,
 activo VARCHAR(255) DEFAULT 'S',
 orden integer DEFAULT '9999',
 PRIMARY KEY(id AUTOINCREMENT)
);
DROP TABLE IF EXISTS pedidos;
CREATE TABLE IF NOT EXISTS pedidos (
 id integer NOT NULL,
 dispositivo VARCHAR(255),
 cliente_id INTEGER,
 cliente_erp VARCHAR(255),
 cliente_web_id INTEGER,
 usuario_email VARCHAR(255),
 vendedor_erp VARCHAR(255),
 vendedor_email VARCHAR(255),
 descuento REAL,
 observaciones VARCHAR(255),
 web_id INTEGER,
 estado VARCHAR(255),
 total REAL,
 enviado INTEGER DEFAULT 0,
 fecha SMALLDATETIME,
 transporte_manual VARCHAR(255),
 forma_pago VARCHAR(255),
 transporte_manual_erp VARCHAR(255),
 forma_pago_erp VARCHAR(255),
 fecha_entrega DATE,
 desde_hs INTEGER DEFAULT 9,
 hasta_hs INTEGER DEFAULT 18,
 de_sistema INTEGER DEFAULT 0,
 de_sistema_tipo VARCHAR(255),
 PRIMARY KEY(id AUTOINCREMENT)
);
DROP TABLE IF EXISTS pedidos_detalle;
CREATE TABLE IF NOT EXISTS pedidos_detalle (
 id integer NOT NULL,
 pedido_id INTEGER,
 codigo_erp VARCHAR(255),
 nombre VARCHAR(255),
 precio_unitario REAL,
 unidad_venta INTEGER,
 cantidad INTEGER,
 descuento REAL,
 iva REAL,
 subtotal REAL,
 de_sistema VARCHAR(255) DEFAULT 'N',
 FOREIGN KEY(pedido_id) REFERENCES pedidos(id) ON DELETE CASCADE,
 PRIMARY KEY(id AUTOINCREMENT)
);
DROP TABLE IF EXISTS preferencias;
CREATE TABLE IF NOT EXISTS preferencias (
 empresa VARCHAR(255),
 clave VARCHAR(255),
 valor VARCHAR(255)
);
DROP TABLE IF EXISTS productos;
CREATE TABLE IF NOT EXISTS productos (
 id integer NOT NULL,
 orden integer,
 codigo_erp VARCHAR(255),
 ean13 VARCHAR(255),
 nombre VARCHAR(255),
 sin_foto VARCHAR(255) DEFAULT 'S',
 foto VARCHAR(255) DEFAULT '',
 foto_thumbnail VARCHAR(255) DEFAULT '',
 foto_medium VARCHAR(255) DEFAULT '',
 foto_big VARCHAR(255) DEFAULT '',
 destacado VARCHAR(255),
 descripcion TEXT,
 filtro_1 INTEGER,
 filtro_2 INTEGER,
 filtro_3 INTEGER,
 filtro_4 INTEGER,
 filtro_5 INTEGER,
 filtro_6 INTEGER,
 precio_1 REAL,
 precio_2 REAL,
 precio_3 REAL,
 precio_4 REAL,
 precio_5 REAL,
 precio_6 REAL,
 precio_7 REAL,
 precio_8 REAL,
 precio_9 REAL,
 precio_10 REAL,
 precio_11 REAL,
 precio_12 REAL,
 precio_13 REAL,
 precio_14 REAL,
 precio_15 REAL,
 precio_16 REAL,
 precio_17 REAL,
 precio_18 REAL,
 precio_19 REAL,
 precio_20 REAL,
 precio_21 REAL,
 precio_22 REAL,
 precio_23 REAL,
 precio_24 REAL,
 precio_25 REAL,
 precio_26 REAL,
 precio_27 REAL,
 precio_28 REAL,
 precio_29 REAL,
 precio_30 REAL,
 iva REAL,
 activo INTEGER,
 stock INTEGER,
 unidad_venta INTEGER,
 de_sistema VARCHAR(255) DEFAULT 'N',
 PRIMARY KEY(id AUTOINCREMENT)
);
DROP TABLE IF EXISTS transportes;
CREATE TABLE IF NOT EXISTS transportes (
 id integer NOT NULL,
 codigo_erp VARCHAR(255),
 nombre VARCHAR(255) NOT NULL,
 activo VARCHAR(255) DEFAULT 'S',
 orden integer DEFAULT '9999',
 PRIMARY KEY(id AUTOINCREMENT)
);
DROP TABLE IF EXISTS usuarios;
CREATE TABLE IF NOT EXISTS usuarios (
 id integer NOT NULL,
 asociado_erp VARCHAR(255),
 asociado_id INTEGER,
 asociado_tabla VARCHAR(255),
 supervisor INTEGER DEFAULT 0,
 nombre VARCHAR(255),
 email VARCHAR(255),
 password VARCHAR(255),
 telefono VARCHAR(255),
 cajaid VARCHAR(255),
 PRIMARY KEY(id AUTOINCREMENT)
);
DROP TABLE IF EXISTS vendedores;
CREATE TABLE IF NOT EXISTS vendedores (
 id integer NOT NULL,
 codigo_erp VARCHAR(255),
 nombre VARCHAR(255) NOT NULL,
 PRIMARY KEY(id AUTOINCREMENT)
);
DROP TABLE IF EXISTS zonas;
CREATE TABLE IF NOT EXISTS zonas (
 id integer NOT NULL,
 codigo_erp VARCHAR(255),
 nombre VARCHAR(255) NOT NULL,
 activo VARCHAR(255) DEFAULT 'S',
 orden integer DEFAULT '9999',
 PRIMARY KEY(id AUTOINCREMENT)
);
DROP TABLE IF EXISTS familias;
CREATE TABLE IF NOT EXISTS familias (
 id integer NOT NULL,
 codigo_erp VARCHAR(255),
 nombre VARCHAR(255) NOT NULL,
 PRIMARY KEY(id AUTOINCREMENT)
);
DROP TABLE IF EXISTS marcas;
CREATE TABLE IF NOT EXISTS marcas (
 id integer NOT NULL,
 codigo_erp VARCHAR(255),
 nombre VARCHAR(255) NOT NULL,
 activo VARCHAR(255) DEFAULT 'S',
 orden integer DEFAULT '9999',
 PRIMARY KEY(id AUTOINCREMENT)
);
DROP TABLE IF EXISTS lineas;
CREATE TABLE IF NOT EXISTS lineas (
 id integer NOT NULL,
 codigo_erp VARCHAR(255),
 nombre VARCHAR(255) NOT NULL,
 PRIMARY KEY(id AUTOINCREMENT)
);
DROP TABLE IF EXISTS condiciones_iva;
CREATE TABLE IF NOT EXISTS condiciones_iva (
 id integer NOT NULL,
 codigo_erp VARCHAR(255),
 nombre VARCHAR(255) NOT NULL,
 PRIMARY KEY(id AUTOINCREMENT)
);
DROP TABLE IF EXISTS cajas;
CREATE TABLE IF NOT EXISTS cajas (
 id VARCHAR(255) NOT NULL,
 descripcion VARCHAR(255),
 compartida VARCHAR(255) DEFAULT 'N',
 PRIMARY KEY(id)
);
DROP TABLE IF EXISTS valores;
CREATE TABLE IF NOT EXISTS valores (
 id VARCHAR(255) NOT NULL,
 descripcion VARCHAR(255),
 gestioncob VARCHAR(255) DEFAULT '0',
 codigo_erp VARCHAR(255),
 activo VARCHAR(255) DEFAULT 'S',
 orden integer DEFAULT '9999',
 datos_aux VARCHAR(255) DEFAULT 'N',
 PRIMARY KEY(id)
);
DROP TABLE IF EXISTS deudas;
CREATE TABLE IF NOT EXISTS deudas (
 id VARCHAR(255) NOT NULL,
 cliente_id INTEGER,
 cliente_erp VARCHAR(255),
 comprobante VARCHAR(255),
 fecha DATE,
 vencimiento DATE,
 importe REAL,
 saldo REAL,
 PRIMARY KEY(id)
);
DROP TABLE IF EXISTS estado_cuenta;
CREATE TABLE IF NOT EXISTS estado_cuenta (
 id INTEGER NOT NULL,
 cajaid INTEGER,
 caja_origen_id INTEGER,
 caja_destino_id INTEGER,
 rendicion_id VARCHAR(255),
 rendicion VARCHAR(255),
 sincronizado VARCHAR(255),
 nro VARCHAR(255),
 banco VARCHAR(255),
 descripcion VARCHAR(255),
 origen VARCHAR(255),
 emite_usuario_id VARCHAR(255),
 vendedor_id VARCHAR(255),
 cliente_id VARCHAR(255),
 tipo_doc VARCHAR(255),
 clase_doc VARCHAR(255),
 nro_doc VARCHAR(255),
 fecha_emision DATE,
 fecha_vto DATE,
 moneda VARCHAR(255),
 debe REAL,
 haber REAL,
 saldo REAL,
 PRIMARY KEY(id AUTOINCREMENT)
);
DROP TABLE IF EXISTS recibos_items;
CREATE TABLE IF NOT EXISTS recibos_items (
 id VARCHAR(255) NOT NULL,
 recibo_id VARCHAR(255),
 fecha DATE,
 tipo VARCHAR(255),
 tipo_id VARCHAR(255),
 tipo_sku VARCHAR(255),
 caja_origen_id VARCHAR(255),
 caja_destino_id VARCHAR(255),
 nro VARCHAR(255),
 banco VARCHAR(255),
 vencimiento DATE,
 importe REAL,
 cuit VARCHAR(255),
 descripcion VARCHAR(255),
 adjunto VARCHAR(255),
 enviado INTEGER,
 PRIMARY KEY(id)
);
DROP TABLE IF EXISTS recibos;
CREATE TABLE IF NOT EXISTS recibos (
 id VARCHAR(255) NOT NULL,
 web_id INTEGER DEFAULT '0',
 tipo VARCHAR(255),
 fecha DATE,
 cliente_id INTEGER,
 cliente_erp VARCHAR(255),
 sincronizado INTEGER,
 PRIMARY KEY(id)
);
DROP TABLE IF EXISTS saldo_cajas;
CREATE TABLE IF NOT EXISTS saldo_cajas (
 caja VARCHAR(255),
 valor VARCHAR(255),
 nro VARCHAR(255),
 banco VARCHAR(255),
 vencimiento DATE,
 importe REAL
);
DROP VIEW IF EXISTS v_clientes;
CREATE VIEW v_clientes AS SELECT c.id, c.web_id, c.codigo_erp, c.nombre, c.orden, c.telefono, c.email, 
            IFNULL(c.direccion,'') AS direccion, IFNULL(c.localidad,'') AS localidad, 
            IFNULL(c.provincia,'') AS provincia,  IFNULL(c.pais,'') AS pais, 
            c.zona_id, c.precio_lista, c.vendedor_erp, 
            IFNULL(COUNT(p.id),0) AS pedidos_abiertos, IFNULL(COUNT(pr.id),0) AS pedidos_cerrados, IFNULL(c.tipo_id,0) AS tipo_id 
            FROM clientes AS c 
            LEFT JOIN pedidos AS p ON (c.codigo_erp = p.cliente_erp AND p.de_sistema = 'N' AND p.enviado = 0 ) 
            LEFT JOIN pedidos AS pr ON (c.codigo_erp = pr.cliente_erp AND pr.de_sistema = 'N'  AND pr.enviado != 0 ) 
            LEFT JOIN pedidos AS prweb ON (c.web_id = prweb.cliente_web_id AND prweb.de_sistema = 'N'  AND prweb.enviado != 0 );
COMMIT;

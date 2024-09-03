---USUARIOS
CREATE TABLE usuarios (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    birthday DATE NOT NULL,
    address VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL
);

-- Crear la tabla de productos
CREATE TABLE productos (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    imagen VARCHAR(255) NOT NULL
);
	
-- Crear la tabla del carrito
CREATE TABLE carrito (
    id SERIAL PRIMARY KEY,
    producto_id INT REFERENCES productos(id),
    cantidad INT NOT NULL
);
-- Insertar algunos datos de ejemplo
INSERT INTO productos (nombre, descripcion, precio, imagen) VALUES
('Tablet', 'Tablet de alta calidad', 200, '../img/tablet.jpg'),
('Laptop', 'Una laptop potente con 16GB de RAM', 800, '../img/Lapt10.jpg'),
('Monitor 4K UHD', 'Monitor 4K UHD', 300, '../img/monitor4k.jpg'),
('Webcam HD', 'Webcam HD', 50, '../img/webcam.png');


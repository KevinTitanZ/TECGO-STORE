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

INSERT INTO usuarios (nombre, email, password, birthday, address, phone) VALUES
('Alice Johnson', 'alice.johnson@example.com', 'alice', '2009-02-05', '123 Maple St, Springfield', '555-1234'),
('Bob Smith', 'bob.smith@example.com', 'bob', '2024-09-15', '456 Oak St, Springfield', '555-5678'),
('Carol White', 'carol.white@example.com', 'carol', '2021-01-05', '789 Pine St, Springfield', '555-8765'),
('David Brown', 'david.brown@example.com', 'david', '2017-01-05', '321 Birch St, Springfield', '555-4321'),
('Eva Green', 'eva.green@example.com', 'eva', '2013-01-05', '654 Cedar St, Springfield', '555-7890');

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
('Tablet', 'Tablet de alta calidad', 200.00, '../img/tablet.jpg'),
('Laptop', 'Una laptop potente con 16GB de RAM', 800.00, '../img/Lapt10.jpg'),
('Monitor 4K UHD', 'Monitor 4K UHD', 300.00, '../img/monitor4k.jpg'),
('Webcam HD', 'Webcam HD', 50.00, '../img/webcam.png'), 
('Cel2', 'CELULAR SAMSUNG GALAXY SM-A05 OC', 319.99, '../img/Cel2.webp'),
('Cel3', 'CELULAR SAMSUNG GALAXY SM-', 279.99, '../img/Cel3.webp'),
('Cel4', 'CELULAR SAMSUNG GALAXY SM-A356EZK OC', 349.99, '../img/Cel4.webp'),
('Cel5', 'TABLET HYUNDAI PLUS 10LB2 QC 4GB 64GB', 229.99, '../img/Cel5.webp'),
('Cel6', 'KINDLE AMAZON 6INCH GLARE-FREE 16GB 300PPI DEMIN', 119.99, '../img/Cel6.webp'),
('Cel7', 'KINDLE AMAZON 6INCH GLARE-FREE 16GB 300PPI BLACK', 119.99, '../img/Cel7.webp'),
('Cel8', 'COBERTOR LG FOR TV 65INC', 49.99, '../img/Cel8.webp'),
('Cel10', 'COBERTOR LG FOR TV 60INC', 44.99, '../img/Cel10.webp'),
('Cel11', 'COBERTOR LG FOR TV 60INC', 44.99, '../img/Cel11.webp'),
('Cel12', 'ESTUCHE SAMSUNG PARA GALAXY A50 NEGRO', 19.99, '../img/Cel12.webp'),
('Ac1', 'CABLE SERIAL DATA 0.38CMTS', 5.99, '../img/Ac1.webp'),
('Ac2', 'CABLE ARGOM MONITOR VGA HD15(M)', 9.99, '../img/Ac2.webp'),
('Ac3', 'CABLE HDMI 3.0METROS', 7.99, '../img/Ac3.webp'),
('Ac4', 'CABLE DE PODER 5-15P', 4.99, '../img/Ac4.webp'),
('Ac5', 'CABLE ARGOM CB-0021BK USB', 6.99, '../img/Ac5.webp'),
('Ac6', 'CABLE ARGOM CB-0047BK TYPE-C', 8.99, '../img/Ac6.webp'),
('Ac7', 'ADAPTADOR ARGOM DISPLAY PORT TO HDMI', 11.99, '../img/Ac7.webp'),
('Ac8', 'CARGADOR GENIUS PD-20AC 20W', 15.99, '../img/Ac8.webp'),
('Ac9', 'CAR CHARGER ARGOM FORCE C1 36W PD TYPE-C', 19.99, '../img/Ac9.webp'),
('Ac10', 'ALMOHADILLA REPOSA-MUÑECAS ARGOM', 3.99, '../img/Ac10.webp'),	
('Ac11', 'COOLING PAD ARGOM CF-1594 AJUSTABLE NEGRO', 12.99, '../img/Ac11.webp'),
('Ac12', 'MOUSE PAD HP 300 PAVILLON GAMING BLACK', 7.99, '../img/Ac12.webp'),
('Comp1', 'MBO GIGABYTE H610M K 13VA-12VA LGA1700', 119.99, '../img/Comp1.webp'),
('Comp2', 'MBO ASUS PRIME H610M-E D4 12VA LGA1700', 139.99, '../img/Comp2.webp'),
('Comp3', 'MBO ASUS PRIME H610M-K 13VA', 129.99, '../img/Comp3.webp'),
('Comp4', 'PROC. INTEL CORE I3-10105F 10GEN 3.70-4.40GHZ', 189.99, '../img/Comp4.webp'),
('Comp5', 'PROC. INTEL CORE I3-10105 10GEN 3.70-4.40GHZ 4NUCLEOS', 179.99, '../img/Comp5.webp'),
('Comp6', 'PROC. AMD AM4 RYZEN 5 5500 3.6GHZ 6CORE 12HILOS 3MB', 229.99, '../img/Comp6.webp'),
('Comp7', 'VIDEO ASUS DUAL GEFORCE RTX-3050 OC 6GB', 349.99, '../img/Comp7.webp'),
('Comp8', 'VIDEO GIGABYTE GEFORCE RTX-3050', 329.99, '../img/Comp8.webp'),
('Comp9', 'VIDEO GIGABYTE Radeon RX-6600 EAGLE 8G 8GB', 399.99, '../img/Comp9.webp'),
('Comp10', 'FUENTE DE PODER CORSAIR CX650 650W', 89.99, '../img/Comp10.webp'),
('Comp11', 'FUENTE DE PODER GIGABYTE P650B 650W ATX', 79.99, '../img/Comp11.webp'),
('Comp12', 'FUENTE DE PODER CORSAIR CX750 750W CX SERIES ATX 80 PLUS', 99.99, '../img/Comp12.webp');
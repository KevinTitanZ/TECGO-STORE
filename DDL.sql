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
('Webcam HD', 'Webcam HD', 50, '../img/webcam.png'), 
('Cel2', 'CELULAR SAMSUNG GALAXY SM-A05 OC', "../img/Cel2.webp", '$319.99'),
('Cel3', 'CELULAR SAMSUNG GALAXY SM-', "../img/Cel3.webp", '$279.99'),
('Cel4', 'CELULAR SAMSUNG GALAXY SM-A356EZK OC', "../img/Cel4.webp", '$349.99'),
('Cel5', 'TABLET HYUNDAI PLUS 10LB2 QC 4GB 64GB', "../img/Cel5.webp", '$229.99'),
('Cel6', 'KINDLE AMAZON 6INCH GLARE-FREE 16GB 300PPI DEMIN', "../img/Cel6.webp", '$119.99'),
('Cel7', 'KINDLE AMAZON 6INCH GLARE-FREE 16GB 300PPI BLACK', "../img/Cel7.webp", '$119.99'),
('Cel8', 'COBERTOR LG FOR TV 65INC', "../img/Cel8.webp", '$49.99'),
('Cel10', 'COBERTOR LG FOR TV 60INC', "../img/Cel10.webp", '$44.99'),
('Cel11', 'COBERTOR LG FOR TV 60INC', "../img/Cel11.webp", '$44.99'),
('Cel12', 'ESTUCHE SAMSUNG PARA GALAXY A50 NEGRO', "../img/Cel12.webp", '$19.99'),
('Ac1', 'CABLE SERIAL DATA 0.38CMTS', "../img/Ac1.webp", '$5.99'),
('Ac2', 'CABLE ARGOM MONITOR VGA HD15(M)', "../img/Ac2.webp", '$9.99'),
('Ac3', 'CABLE HDMI 3.0METROS', "../img/Ac3.webp", '$7.99'),
('Ac4', 'CABLE DE PODER 5-15P', "../img/Ac4.webp", '$4.99'),
('Ac5', 'CABLE ARGOM CB-0021BK USB', "../img/Ac5.webp", '$6.99'),
('Ac6', 'CABLE ARGOM CB-0047BK TYPE-C', "../img/Ac6.webp", '$8.99'),
('Ac7', 'ADAPTADOR ARGOM DISPLAY PORT TO HDMI', "../img/Ac7.webp", '$11.99'),
('Ac8', 'CARGADOR GENIUS PD-20AC 20W', "../img/Ac8.webp", '$15.99'),
('Ac9', 'CAR CHARGER ARGOM FORCE C1 36W PD TYPE-C', "../img/Ac9.webp", '$19.99'),
('Ac10', 'ALMOHADILLA REPOSA-MUÑECAS ARGOM', "../img/Ac10.webp", '$3.99'),
('Ac11', 'COOLING PAD ARGOM CF-1594 AJUSTABLE NEGRO', "../img/Ac11.webp", '$12.99'),
('Ac12', 'MOUSE PAD HP 300 PAVILLON GAMING BLACK', "../img/Ac12.webp", '$7.99'),
('Comp1', 'MBO GIGABYTE H610M K 13VA-12VA LGA1700', '../img/Comp1.webp', '$119.99'),
('Comp2', 'MBO ASUS PRIME H610M-E D4 12VA LGA1700', '../img/Comp2.webp', '$139.99'),
('Comp3', 'MBO ASUS PRIME H610M-K 13VA', '../img/Comp3.webp', '$129.99'),
('Comp4', 'PROC. INTEL CORE I3-10105F 10GEN 3.70-4.40GHZ', '../img/Comp4.webp', '$189.99'),
('Comp5', 'PROC. INTEL CORE I3-10105 10GEN 3.70-4.40GHZ 4NUCLEOS', '../img/Comp5.webp', '$179.99'),
('Comp6', 'PROC. AMD AM4 RYZEN 5 5500 3.6GHZ 6CORE 12HILOS 3MB', '../img/Comp6.webp', '$229.99'),
('Comp7', 'VIDEO ASUS DUAL GEFORCE RTX-3050 OC 6GB', '../img/Comp7.webp', '$349.99'),
('Comp8', 'VIDEO GIGABYTE GEFORCE RTX-3050', '../img/Comp8.webp', '$329.99'),
('Comp9', 'VIDEO GIGABYTE Radeon RX-6600 EAGLE 8G 8GB', '../img/Comp9.webp', '$399.99'),
('Comp10', 'FUENTE DE PODER CORSAIR CX650 650W', '../img/Comp10.webp', '$89.99'),
('Comp11', 'FUENTE DE PODER GIGABYTE P650B 650W ATX', '../img/Comp11.webp', '$79.99'),
('Comp12', 'FUENTE DE PODER CORSAIR CX750 750W CX SERIES ATX 80 PLUS', '../img/Comp12.webp', '$99.99')

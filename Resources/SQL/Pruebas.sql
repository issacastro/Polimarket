
EXEC p_id_vendedor 'Jessy',38,23,'Practicas','Arduino Mega','Chido','ard.jpg',2,150;

INSERT INTO Usuarios VALUES('user','user@gmail.com','user')
INSERT INTO Usuarios VALUES('Jessy','jessy@gmail.com','issa')
INSERT INTO Producto VALUES(
3,2,23,'Practicas','Comus Digitales',
'Practicas de Zavala','pcm.jpg',1,1,900
)
UPDATE Usuarios SET PASSWORD ='issa' WHERE ID_USER='Jessy'
DELETE FROM Usuarios WHERE ID_USER='Jessy'
DELETE FROM Vendedor WHERE FK_USER='Jessy'
DELETE FROM Producto WHERE FK_VENDEDOR=2
DELETE FROM Comprador WHERE FK_USER='Jessy'

SELECT * FROM Comprador
SELECT * FROM Ubicacion
SELECT * FROM Escuela
SELECT * FROM Usuarios
SELECT * FROM Producto
SELECT * FROM Vendedor
SELECT * FROM Categorias

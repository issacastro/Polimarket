--SRV1 Electronica S1.B.dbo.TABLA
--SRV2 Celulares S2.B.dbo.TABLA
--SRV3 Libros S3.B.dbo.TABLA

--Listar todos los productos
SELECT * FROM Producto
UNION
SELECT * FROM S2.B.dbo.Producto
UNION
SELECT * FROM S3.B.dbo.Producto

--1 Productos vendidos (Para cada vendedor)
SELECT c.ID_COMPRAS, p.NOMBRE as Producto, e.NOMBRE as Escuela, v.ID_USER as Comprador, c.CANTIDAD, c.TOTAL FROM 
S1.B.dbo.Producto as p, S1.B.dbo.Compras as c,  S1.B.dbo.Usuarios as v, S1.B.dbo.Comprador as co, S1.B.dbo.Escuela as e
where p.FK_ESCUELA=e.ID_ESCUELA and v.ID_USER=co.FK_USER and p.ID_PRODUCTO=c.FK_PRODUCTO
union
SELECT c.ID_COMPRAS, p.NOMBRE as Producto, e.NOMBRE as Escuela, v.ID_USER as Comprador, c.CANTIDAD, c.TOTAL FROM 
S2.B.dbo.Producto as p, S2.B.dbo.Compras as c,  S2.B.dbo.Usuarios as v, S2.B.dbo.Comprador as co, S2.B.dbo.Escuela as e
where p.FK_ESCUELA=e.ID_ESCUELA and v.ID_USER=co.FK_USER and p.ID_PRODUCTO=c.FK_PRODUCTO
union
SELECT c.ID_COMPRAS, p.NOMBRE as Producto, e.NOMBRE as Escuela, v.ID_USER as Comprador, c.CANTIDAD, c.TOTAL FROM 
S3.B.dbo.Producto as p, S3.B.dbo.Compras as c,  S3.B.dbo.Usuarios as v, S3.B.dbo.Comprador as co, S3.B.dbo.Escuela as e
where p.FK_ESCUELA=e.ID_ESCUELA and v.ID_USER=co.FK_USER and p.ID_PRODUCTO=c.FK_PRODUCTO

and p.FK_VENDEDOR=1;

--2 Productos comprados por usuario io merenguez jiji
SELECT c.ID_COMPRAS, p.NOMBRE as Producto, e.NOMBRE as Escuela, v.NC as Vendedor, c.CANTIDAD, c.TOTAL FROM 
S1.B.dbo.Producto as p, S1.B.dbo.Compras as c,  S1.B.dbo.Vendedor as v, S1.B.dbo.Comprador as co, S1.B.dbo.Escuela as e
where p.FK_ESCUELA=e.ID_ESCUELA and p.FK_VENDEDOR=v.ID_VENDEDOR and p.ID_PRODUCTO=c.FK_PRODUCTO
union
SELECT c.ID_COMPRAS, p.NOMBRE as Producto, e.NOMBRE as Escuela, v.NC as Vendedor, c.CANTIDAD, c.TOTAL FROM 
S2.B.dbo.Producto as p, S2.B.dbo.Compras as c,  S2.B.dbo.Vendedor as v, S2.B.dbo.Comprador as co, S2.B.dbo.Escuela as e
where p.FK_ESCUELA=e.ID_ESCUELA and p.FK_VENDEDOR=v.ID_VENDEDOR and p.ID_PRODUCTO=c.FK_PRODUCTO
union
SELECT c.ID_COMPRAS, p.NOMBRE as Producto, e.NOMBRE as Escuela, v.NC as Vendedor, c.CANTIDAD, c.TOTAL FROM 
S3.B.dbo.Producto as p, S3.B.dbo.Compras as c,  S3.B.dbo.Vendedor as v, S3.B.dbo.Comprador as co, S3.B.dbo.Escuela as e
where p.FK_ESCUELA=e.ID_ESCUELA and p.FK_VENDEDOR=v.ID_VENDEDOR and p.ID_PRODUCTO=c.FK_PRODUCTO

and co.FK_USER='x';


--3 Productos por precio (rango) 
SELECT * FROM
(SELECT * FROM S1.B.dbo.Producto
UNION
SELECT * FROM S2.B.dbo.Producto
) AS C
WHERE C.PRECIO >= 350 AND C.PRECIO <= 1500
--4 Productos por categoría
---la misma que la 1 con un where NEL PRRO, AQUI VA CON DICCIONARIO ah pto ci sierto

--5 Productos por escuela 
SELECT * FROM
(SELECT * FROM S1.B.dbo.Producto
UNION
SELECT * FROM S2.B.dbo.Producto
UNION
SELECT * FROM S3.B.dbo.Producto) AS C
INNER JOIN S1.B.dbo.Escuela AS E ON C.FK_ESCUELA = E.ID_ESCUELA AND E.NOMBRE='UPIITA'
--6 Productos por nombre
SELECT * FROM
(SELECT * FROM S1.B.dbo.Producto
UNION
SELECT * FROM S2.B.dbo.Producto
UNION
SELECT * FROM S3.B.dbo.Producto) AS C
WHERE  C.NOMBRE LIKE '%ARDUINO%'
--7 Productos por vendedor (Para que los compradores los vean)
SELECT * FROM
(SELECT * FROM S1.B.dbo.Producto
UNION
SELECT * FROM S2.B.dbo.Producto
UNION
SELECT * FROM S3.B.dbo.Producto) AS C
INNER JOIN S1.B.dbo.Vendedor AS V ON C.FK_VENDEDOR = V.ID_VENDEDOR AND V.NC='Jessy UPIITA'


-- Consulta por categoria
Select T1.Nombre, Descripcion, stock, precio, fk_vendedor, IMG, T2.Nombre
from Producto T1
inner join
Escuela as T2
on T1.FK_escuela=T2.ID_ESCUELA where fk_Categoria ='Practicas';

-- Historial de compras por usuario
-- esta no es la 2 del otro script? jijicl NO ENTENDI 
Select T2.id_compras, T1.NOMBRE, DESCRIPCION, IMG, PRECIO
FROM Compras as T2
inner join
Producto as T1
on T2.FK_PRODUCTO=T1.ID_PRODUCTO WHERE T2.FK_COMPRADOR = 440; --Cambiar 440 por variable, creo xd 

--Productos seleccionados para comprar (Carrito)
--Precio total de productos seleccionados para comprar (carrito)

--Consulta por escuela

Select Nombre, Descripcion, stock, precio, fk_vendedor, IMG
from Producto 
where FK_ESCUELA =23;
--Consulta por Nombre de producto 
select Nombre, Descripcion, stock, precio, fk_vendedor, img
from Producto
where NOMBRE like '%Arduino%' 

--Consulta para issac xd
select T1.FK_USER, T2.NOMBRE, T2.STOCK, T3.NOMBRE as ESCUELA
FROM 
Vendedor AS T1
INNER JOIN 
PRODUCTO AS T2
ON T2.FK_VENDEDOR=T1.ID_VENDEDOR 
INNER JOIN 
ESCUELA AS T3
ON T2.FK_ESCUELA=T3.ID_ESCUELA WHERE FK_VENDEDOR=706
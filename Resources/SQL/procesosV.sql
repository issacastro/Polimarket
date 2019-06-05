
create procedure proc_id_Vendedor

@id_prod int,
@fk_esc int,
@fk_cat nvarchar(100),
@nomb nvarchar(50),
@desc nvarchar(255),
@imagen nvarchar(50),
@sto int,
@status bit,
@precio float,
@id_usr nvarchar

as 
declare @idVendedorRand int
declare @Vend int
set @idVendedorRand = FLOOR(RAND()*(1000-1)+1)

IF NOT EXISTS (select FK_USER from Vendedor where FK_USER = @id_usr)
BEGIN


insert into Vendedor (ID_VENDEDOR,FK_USER) 
Values (@idVendedorRand, @id_usr)
set @Vend=(select FK_USER from Vendedor where FK_USER = @id_usr)

insert into Producto(ID_PRODUCTO,FK_VENDEDOR, FK_ESCUELA, FK_CATEGORIA, NOMBRE, DESCRIPCION,IMG, STOCK, STATUS, PRECIO) 
Values (@id_prod,@Vend,@fk_esc,@fk_cat,@nomb,@desc,@imagen,@sto,@status,@precio)
END
ELSE
BEGIN
insert into Producto(ID_PRODUCTO,FK_VENDEDOR, FK_ESCUELA, FK_CATEGORIA, NOMBRE, DESCRIPCION,IMG, STOCK, STATUS, PRECIO) 
Values (@id_prod,@Vend,@fk_esc,@fk_cat,@nomb,@desc,@imagen,@sto,@status,@precio)
END
go
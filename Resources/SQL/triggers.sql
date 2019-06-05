
--Tigger para crear ID_COMPRADOR
CREATE TRIGGER  trigger_id_comprador
  ON Usuarios
	AFTER INSERT  AS
BEGIN
DECLARE @U NVARCHAR(50);
DECLARE @E NVARCHAR(50);
DECLARE @P NVARCHAR(50);
SET @U =(SELECT TOP 1  inserted.ID_USER FROM inserted);
SET @E =(SELECT TOP 1  inserted.EMAIL FROM inserted);
SET @P =(SELECT TOP 1  inserted.PASSWORD FROM inserted);
INSERT INTO S2.B.dbo.Usuarios VALUES (@U,@E,@P);
INSERT INTO S3.B.dbo.Usuarios VALUES (@U,@E,@P);
DECLARE @idRand INT;
SET @idRand = FLOOR(RAND()*(1000-1)+1);
-- Buscar si ya existe
  IF NOT EXISTS(SELECT * FROM Comprador WHERE ID_COMPRADOR=@idRand)
    BEGIN

      INSERT INTO Comprador (FK_USER, ID_COMPRADOR) VALUES (@U,@idRand);
	  INSERT INTO S2.B.dbo.Comprador (FK_USER, ID_COMPRADOR) VALUES (@U,@idRand);
	  INSERT INTO S3.B.dbo.Comprador (FK_USER, ID_COMPRADOR) VALUES (@U,@idRand)
    END
  ELSE 
    BEGIN
    SET @idRand =FLOOR(RAND()*(1000-1)+1);
	INSERT INTO Comprador (FK_USER, ID_COMPRADOR) VALUES (@U,@idRand);
	INSERT INTO S2.B.dbo.Comprador (FK_USER, ID_COMPRADOR) VALUES (@U,@idRand);
	INSERT INTO S3.B.dbo.Comprador (FK_USER, ID_COMPRADOR) VALUES (@U,@idRand);
    END
END;



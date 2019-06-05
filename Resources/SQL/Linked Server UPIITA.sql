--IP ISSAC: 10.104.109.125
--IP DANNIELA: 10.104.101.248
--IP ZURIEL: 10.104.109.126
--NETMASK 255.255.224.0
--GATEWAY:10.104.127.254

USE [master]
GO

/****** Object:  LinkedServer [S1]    Script Date: 31/05/2019 11:29:25 ******/
EXEC master.dbo.sp_dropserver @server=N'S1', @droplogins='droplogins'
GO

/****** Object:  LinkedServer [S1]    Script Date: 31/05/2019 11:29:25 ******/
EXEC master.dbo.sp_addlinkedserver @server = N'S1', @srvproduct=N'SQLSRV', @provider=N'SQLNCLI', @datasrc=N'10.104.103.119\REDMI'
 /* For security reasons the linked server remote logins password is changed with ######## */
EXEC master.dbo.sp_addlinkedsrvlogin @rmtsrvname=N'S1',@useself=N'False',@locallogin=NULL,@rmtuser=N'SA',@rmtpassword='Strayheart123'
GO

EXEC master.dbo.sp_serveroption @server=N'S1', @optname=N'collation compatible', @optvalue=N'false'
GO

EXEC master.dbo.sp_serveroption @server=N'S1', @optname=N'data access', @optvalue=N'true'
GO

EXEC master.dbo.sp_serveroption @server=N'S1', @optname=N'dist', @optvalue=N'false'
GO

EXEC master.dbo.sp_serveroption @server=N'S1', @optname=N'pub', @optvalue=N'false'
GO

EXEC master.dbo.sp_serveroption @server=N'S1', @optname=N'rpc', @optvalue=N'false'
GO

EXEC master.dbo.sp_serveroption @server=N'S1', @optname=N'rpc out', @optvalue=N'false'
GO

EXEC master.dbo.sp_serveroption @server=N'S1', @optname=N'sub', @optvalue=N'false'
GO

EXEC master.dbo.sp_serveroption @server=N'S1', @optname=N'connect timeout', @optvalue=N'0'
GO

EXEC master.dbo.sp_serveroption @server=N'S1', @optname=N'collation name', @optvalue=null
GO

EXEC master.dbo.sp_serveroption @server=N'S1', @optname=N'lazy schema validation', @optvalue=N'false'
GO

EXEC master.dbo.sp_serveroption @server=N'S1', @optname=N'query timeout', @optvalue=N'0'
GO

EXEC master.dbo.sp_serveroption @server=N'S1', @optname=N'use remote collation', @optvalue=N'true'
GO

EXEC master.dbo.sp_serveroption @server=N'S1', @optname=N'remote proc transaction promotion', @optvalue=N'true'
GO




USE [master]
GO

/****** Object:  LinkedServer [S2]    Script Date: 31/05/2019 11:30:51 ******/
EXEC master.dbo.sp_dropserver @server=N'S2', @droplogins='droplogins'
GO

/****** Object:  LinkedServer [S2]    Script Date: 31/05/2019 11:30:51 ******/
EXEC master.dbo.sp_addlinkedserver @server = N'S2', @srvproduct=N'SQLSRV', @provider=N'SQLNCLI', @datasrc=N'10.104.103.52\VITE'
 /* For security reasons the linked server remote logins password is changed with ######## */
EXEC master.dbo.sp_addlinkedsrvlogin @rmtsrvname=N'S2',@useself=N'False',@locallogin=NULL,@rmtuser=N'SA',@rmtpassword='Vite123'
GO

EXEC master.dbo.sp_serveroption @server=N'S2', @optname=N'collation compatible', @optvalue=N'false'
GO

EXEC master.dbo.sp_serveroption @server=N'S2', @optname=N'data access', @optvalue=N'true'
GO

EXEC master.dbo.sp_serveroption @server=N'S2', @optname=N'dist', @optvalue=N'false'
GO

EXEC master.dbo.sp_serveroption @server=N'S2', @optname=N'pub', @optvalue=N'false'
GO

EXEC master.dbo.sp_serveroption @server=N'S2', @optname=N'rpc', @optvalue=N'false'
GO

EXEC master.dbo.sp_serveroption @server=N'S2', @optname=N'rpc out', @optvalue=N'false'
GO

EXEC master.dbo.sp_serveroption @server=N'S2', @optname=N'sub', @optvalue=N'false'
GO

EXEC master.dbo.sp_serveroption @server=N'S2', @optname=N'connect timeout', @optvalue=N'0'
GO

EXEC master.dbo.sp_serveroption @server=N'S2', @optname=N'collation name', @optvalue=null
GO

EXEC master.dbo.sp_serveroption @server=N'S2', @optname=N'lazy schema validation', @optvalue=N'false'
GO

EXEC master.dbo.sp_serveroption @server=N'S2', @optname=N'query timeout', @optvalue=N'0'
GO

EXEC master.dbo.sp_serveroption @server=N'S2', @optname=N'use remote collation', @optvalue=N'true'
GO

EXEC master.dbo.sp_serveroption @server=N'S2', @optname=N'remote proc transaction promotion', @optvalue=N'true'
GO

USE [master]
GO

/****** Object:  LinkedServer [S3]    Script Date: 31/05/2019 11:31:46 ******/
EXEC master.dbo.sp_dropserver @server=N'S3', @droplogins='droplogins'
GO

/****** Object:  LinkedServer [S3]    Script Date: 31/05/2019 11:31:46 ******/
EXEC master.dbo.sp_addlinkedserver @server = N'S3', @srvproduct=N'SQLSRV', @provider=N'SQLNCLI', @datasrc=N'10.104.109.126\REDMI'
 /* For security reasons the linked server remote logins password is changed with ######## */
EXEC master.dbo.sp_addlinkedsrvlogin @rmtsrvname=N'S3',@useself=N'False',@locallogin=NULL,@rmtuser=N'SA',@rmtpassword='Strayheart123'
GO

EXEC master.dbo.sp_serveroption @server=N'S3', @optname=N'collation compatible', @optvalue=N'false'
GO

EXEC master.dbo.sp_serveroption @server=N'S3', @optname=N'data access', @optvalue=N'true'
GO

EXEC master.dbo.sp_serveroption @server=N'S3', @optname=N'dist', @optvalue=N'false'
GO

EXEC master.dbo.sp_serveroption @server=N'S3', @optname=N'pub', @optvalue=N'false'
GO

EXEC master.dbo.sp_serveroption @server=N'S3', @optname=N'rpc', @optvalue=N'false'
GO

EXEC master.dbo.sp_serveroption @server=N'S3', @optname=N'rpc out', @optvalue=N'false'
GO

EXEC master.dbo.sp_serveroption @server=N'S3', @optname=N'sub', @optvalue=N'false'
GO

EXEC master.dbo.sp_serveroption @server=N'S3', @optname=N'connect timeout', @optvalue=N'0'
GO

EXEC master.dbo.sp_serveroption @server=N'S3', @optname=N'collation name', @optvalue=null
GO

EXEC master.dbo.sp_serveroption @server=N'S3', @optname=N'lazy schema validation', @optvalue=N'false'
GO

EXEC master.dbo.sp_serveroption @server=N'S3', @optname=N'query timeout', @optvalue=N'0'
GO

EXEC master.dbo.sp_serveroption @server=N'S3', @optname=N'use remote collation', @optvalue=N'true'
GO

EXEC master.dbo.sp_serveroption @server=N'S3', @optname=N'remote proc transaction promotion', @optvalue=N'true'
GO




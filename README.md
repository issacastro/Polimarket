# PoliMarket :sunglasses:
---
## System description

Any user previously registered in the system can access, view and purchase items that are available in the sales catalog or simply browse and view the characteristics of the different items.
You can also add your own items for sale.

## Data fragmentation

The fragmentation of the data will be distributed based on the criteria of the selected category, the data of each category will be hosted on a different server, the purchases of the products will be hosted based on the location of the product under the same criteria, the following schools were considered:

**Schools :**
---------------
1. Centro Interdisciplinario de Ciencias de la Salud Unidad Milpa Alta (CICS UMA)
2. Centro Interdisciplinario de Ciencias de la Salud Unidad Santo Tomás (CICS UST)
3. Escuela Nacional de Biblioteconomía y Archivonomía (ENBA)
4. Escuela Nacional de Ciencias Biológicas (ENCB)
5. Escuela Nacional de Medicina y Homeopatía (ENMH)
6. Escuela Superior de Medicina (ESM)
7. Escuela Superior de Enfermería y Obstetricia (ESEO)
8. Escuela Superior de Comercio y Administración Unidad Tepepan (ESCA UT)
9. Escuela Superior de Comercio y Administración Unidad Santo Tomás (ESCA UST)
10. Escuela Superior de Economía (ESE)
11. Escuela Superior de Turismo (EST)
12. Escuela Superior de Ingeniería Mecánica y Eléctrica Unidad Azcapotzalco (ESIMEUA)
13. Escuela Superior de Ingeniería Mecánica y Eléctrica Unidad Culhuacán (ESIME UC)
14. Escuela Superior de Ingeniería Mecánica y Eléctrica Unidad Ticomán (ESIME UT)
15. Escuela Superior de Ingeniería Mecánica y Eléctrica Unidad Zacatenco (ESIME UZ)
16. Escuela Superior de Ingeniería y Arquitectura Unidad Tecamachalco (ESIAUTecamachalco)
17. Escuela Superior de Ingeniería y Arquitectura Unidad Ticomán (ESIA UTicomán)
18. Escuela Superior de Ingeniería y Arquitectura Unidad Zacatenco (ESIA UZ)
19. Escuela Superior de Ingeniería Química e Industrias Extractivas (ESIQIE)
20. Escuela Superior de Ingeniería Textil (ESIT)
21. Escuela Superior de Física y Matemáticas (ESFM)
22. Escuela Superior de Cómputo (ESCOM)
23. Unidad Profesional Interdisciplinaria de Ingeniería y Tecnologías Avanzadas (UPIITA)
24. Unidad Profesional Interdisciplinaria de Ingeniería, Ciencias Sociales y Administrativas (UPIICSA)
25. Unidad Profesional Interdisciplinaria de Biotecnología (UPIBI)
26. Unidad Profesional Interdisciplinaria de Ingeniería, Campus Guanajuato (UPIIG)
27. Unidad Profesional Interdisciplinaria De Ingeniería, Campus Zacatecas (UPIIZ)
28. Unidad Profesional Interdisciplinaria De Ingeniería, Campus Hidalgo (UPIIH)
---
# Top-Down Analysis:
In the proposed system a Top-Down data analysis approach will be used since we start from a general relational model for the implementation of a commodity market network among the 28 schools of the National Polytechnic Institute. The fragmentation is used by dividing the product table by 14 categories proposed in this document, which gives us 14 fragments of the mentioned table that will be distributed in the 3 SQL Server servers.

---
## System Functionalities:

### User Registration: 
There will be a panel for new users to register to the platform.

### User Profile:
The user will have a panel to edit his profile, as well as to upload his products to sell and his purchase history.
The owner user will not be able to purchase his own products.

### Login:
In order to purchase or post products it will be necessary for the user to log in with the following information: Email or Username, Password.

### Publication of Products:
All registered users will be able to publish their products accompanied by a maximum of 5 photographs of the product, price, category and a brief description.

### Product Catalog:
There will be an overview of all products published with a search engine by description and / or category and price filter.
There will be a section where the products will be organized by category, the client will be able to select the category.  

### Shopping Cart
The cart will be a POP UP sale where the products selected by the client will be shown, the quantity and price per unit and the total accumulated purchase at the moment.
You will have the option to complete the purchase of the products which will direct you to the purchase simulation section.

### Simulation of purchase:
When making the purchase will be sent by email to the buyer user the data of the seller and vice versa; the buyer will contact the seller or vice versa, once the sale is finalized, the seller may put in the system that the sale has been completed. If the sale is not completed, the seller can make the product available again.

---
# Distributed Queries
*Search
---------------
* The system will have a search of products based on their Name, and will do the search for any category.
* The system will have a filter to locate the products that are in the school selected by the user.
* The system will have a filter by category
---
*Purchase:*
---------------
* When making the purchase, the system will not distinguish the location of the data.

---
# Screenshot
![](Index.png)
More screenshots available at: https://imgur.com/gallery/BlrksTP

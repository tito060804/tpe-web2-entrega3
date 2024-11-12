tpe web 2 API

Descripción Endpoints:

Colección completa:

 /api/vinos --> METODO GET lista la colección completa de vinos;
 /api/cepas --> METODO GET lista la colección completa de cepas;


Obtener un elemento por ID:
 -/api/vinos/2 --> METODO GET obtiene un vino en especifico(ej: vino con ID_vino= 2);
  -/api/cepas/2 --> METODO GET obtiene una cepa en especifico (ej: cepa con ID_cepa= 2);

Agregar un vino
 -/api/vinos --> 
 /api/cepas -->
 METODO POST Para agregar un vino se require ir al body para poder agregar un vino o una cepa. La forma de agregar es colocar en el body lo siguiente:
                #agregar vino=
                {
                    "Nombre_vino": "FEDERICO LÓPEZ GRAN RESERVA",
                    "Tipo": "Vino blanco"
                }
                #agregar cepa=
                {
                    "nombre_cepa":"cabernet prueba yupi ",
                    "aroma":"frutos rojos, tacabo, vainilla",
                    "maridaje":"carnes, salsas a base de tomate",
                    "textura":"cuerpo importante sabor intenso"
                }

Modificar un vino
-/api/vinos/2 --> 
-/api/cepas/2 -->
METODO PUT Para modificar un vino o cepa se requiereir al body y colocar en el lo siguiente
                #agregar vino=
                {
                    "Nombre_vino": "montchenot reserva",
                    "Tipo": "Vino tinto"
                }
                #agregar cepa=
                {
                    "nombre_cepa":"tempranillo",
                    "aroma":"frutos rojos, tacabo, vainilla",
                    "maridaje":"carnes, salsas a base de tomate",
                    "textura":"cuerpo importante sabor intenso"
                }

Eliminar un vino:
 -/api/vinos/3 --> 
  -/api/cepas/3 -->
 METODO DELETE Se selecciona el verbo DELETE y se elimina segun el id que colocamos en el edpoint.

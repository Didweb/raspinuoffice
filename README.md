# Raspinu Office

---

#### Aplicaciones:
- **Api**: Controladores Api.
- **Backoffice**: Logica de negocio recursos.
---

#### Api

Documentada con **Nelmio / Swagger**.

Accesible desde : `/api/doc`

---

### Requerimientos

Gestión de stock / administrativo de discos de vinilo.

#### Context: Products

Record:

- Los discos `Record`, se componen de una referencia esta puede ser null.
- `Edition`:  Un mismo título puede tener diferentes ediciones por lo tanto diferentes referencias.
- `Stock`: Podemos tener varias unidades de una misma referencia `Record/Edition` con la particularidad que cada 
  unidad de stock puede estar en un estado distinto, existen productos de  segunda mano. 
  Por lo tanto cada unidad del stock deberá tener un identificador único.
- El valor de producto (unidad de stock), varia en función de la edición/estado. Por lo tanto el precio 
  ha de especificarse de forma unitaria en cada unidad de stock.

![Diagrama Products](docs/diagrama_products.png)

---

### Testing

#### Psalm
Run Psalm: `./vendor/bin/psalm` 

#### Phpunit
Run Phpunit: `./vendor/bin/phpunit`
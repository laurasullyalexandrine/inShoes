# Roads

## Sprint 1

| URL | HTTP Method | Controller | Method | Title | Content | Comment |
|--|--|--|--|--|--|--|
| `/` | `GET` | `MainController` | `homeAction` | Dans les shoe | 5 categories | - |
`/catalog/categorie/[id]` | `GET`| `CatalogController` | `categoryAction` | Current category name | Category name and description all products from this category| `[id] stand for category id`) | - |
| `/legal-mention/` | `GET`| `MainController` | `legalMentionAction` | Legal mentions | "Legal notices and privacy policy" | | - |
`/catalog/type/[id]` | `GET`| `CatalogController` | `typeAction` | Current type name| Type name and description all type | `[id] stand for type id` | - |
`/catalog/brand/[id]` |`GET`| `CatalogController` | `brandAction` | Current brand name | Category name | `[id] stand for brand id` | - |
`/catalog/product/[id]` | `GET`| `CatalogController` | `productAction` | Current product name | Products name peoducts details and description | `[id] stand for product id` | - |
<!-- Samples to categories -->

<h1 style="text-align:center;">Samples crud</h1>

## Mockup For Response: 

```json
{
  "data":"data of response",
  "message":"success or fail",
  "code":"status of response code",
  "error":{"key":"if thier any errors in response"},
}
```
___
## Categories:

### Index

<table>
<tr>
<th style="text-align:start">use</th>
<td>get all categories</td>
</tr>
<tr>
<th style="text-align:start">parameter</th>
<td>No need</td>
</tr>
<tr>
<th style="text-align:start">method</th>
<td>GET</td>
</tr>
<tr>
<th style="text-align:start">url</th>
<td>api/categories</td>
</tr>
<tr>
<th style="text-align:start">Format response success</th>
<td>
<pre>
{
    "data": {
        "data": [
            {
                "id": 2,
                "name": "category 2",
                "description": "category 2",
                "created_at": "2022-10-10T10:10:18.000000Z",
                "updated_at": "2022-10-18T12:03:23.000000Z"
            }
        ]
    },
    "message": "",
    "code": 200,
    "errors": []
}
</pre>
</td>
</tr>
<tr>
<th style="text-align:start">Format error</th>
<td>
<pre>
{
    "data": "",
    "message": "fail",
    "code": 404,
    "errors": "object not found"
}
{
    "data": "",
    "message": "fail",
    "code": 405,
    "errors": "Method Not Allowed"
}
</pre>
</td>
</tr>
<tr>
<th style="text-align:start">Vaildation</th>
<td>No need to vaildation</td>
</tr>
</table>

___

### Store

<table>
<tr>
<th style="text-align:start">use</th>
<td>add new category</td>
</tr>
<tr>
<th style="text-align:start">parameter</th>
<td>No need</td>
</tr>
<tr>
<th style="text-align:start">method</th>
<td>POST</td>
</tr>
<tr>
<th style="text-align:start">url</th>
<td>api/categories</td>
</tr>
<tr>
<th style="text-align:start">Format response success</th>
<td>
<pre>
{
    "data": {
        "id": 60,
        "name": "category 50",
        "description": null,
        "created_at": "2022-11-01T12:43:54.000000Z",
        "updated_at": "2022-11-01T12:43:54.000000Z"
    },
    "message": "success",
    "code": 201,
    "errors": ""
}
</pre>
</td>
</tr>
<tr>
<th style="text-align:start">Format error</th>
<td>
<pre>
{
    "data": "",
    "message": "fail",
    "code": 404,
    "errors": "object not found"
}
{
    "data": "",
    "message": "fail",
    "code": 405,
    "errors": "Method Not Allowed"
}
</pre>
</td>
</tr>
<tr>
<th style="text-align:start">Vaildation</th>
<td>
<pre>
{
    "data": "",
    "message": "fail",
    "code": 422,
    "errors": {
        "name": [
            "The name field is required."
        ]
    }
}
</pre>
</td>
</tr>
</table>


___

### Update

<table>
<tr>
<th style="text-align:start">use</th>
<td>update category that is selected</td>
</tr>
<tr>
<th style="text-align:start">parameter</th>
<td>need</td>
</tr>
<tr>
<th style="text-align:start">method</th>
<td>POST</td>
</tr>
<tr>
<th style="text-align:start">url</th>
<td>api/categories/{category}</td>
</tr>
<tr>
<th style="text-align:start">Format response success</th>
<td>
<pre>
{
    "data": {
        "id": 2,
        "name": "category",
        "description": "category 2",
        "created_at": "2022-10-10T10:10:18.000000Z",
        "updated_at": "2022-11-01T12:46:51.000000Z"
    },
    "message": "success",
    "code": 202,
    "errors": ""
}
</pre>
</td>
</tr>
<tr>
<th style="text-align:start">Format error</th>
<td>
<pre>
{
    "data": "",
    "message": "fail",
    "code": 404,
    "errors": "object not found"
}
{
    "data": "",
    "message": "fail",
    "code": 405,
    "errors": "Method Not Allowed"
}
</pre>
</td>
</tr>
<tr>
<th style="text-align:start">Vaildation</th>
<td>
<pre>
{
    "data": "",
    "message": "fail",
    "code": 422,
    "errors": {
        "name": [
            "The name field is required."
        ]
    }
}
</pre>
</td>
</tr>
</table>

___

### Destroy

<table>
<tr>
<th style="text-align:start">use</th>
<td>delete category that is selected</td>
</tr>
<tr>
<th style="text-align:start">parameter</th>
<td>No need</td>
</tr>
<tr>
<th style="text-align:start">method</th>
<td>DELETE</td>
</tr>
<tr>
<th style="text-align:start">url</th>
<td>api/categories/{category}</td>
</tr>
<tr>
<th style="text-align:start">Format response success</th>
<td>
<pre>
{
    "data": {
        "id": 31,
        "name": "h",
        "description": "1",
        "created_at": "2022-10-31T18:00:06.000000Z",
        "updated_at": "2022-10-31T18:00:06.000000Z"
    },
    "message": "deleted",
    "code": 204,
    "errors": ""
}
</pre>
</td>
</tr>
<tr>
<th style="text-align:start">Format error</th>
<td>
<pre>
{
    "data": "",
    "message": "fail",
    "code": 404,
    "errors": "object not found"
}
{
    "data": "",
    "message": "fail",
    "code": 405,
    "errors": "Method Not Allowed"
}
{
    "data": "",
    "message": "fail",
    "code": 204,
    "errors": "not found this category id"
}
</pre>
</td>
</tr>
<tr>
<th style="text-align:start">Vaildation</th>
<td>No need to vaildation</td>
</tr>
</table>

___

### Show

<table>
<tr>
<th style="text-align:start">use</th>
<td>show category that is selected</td>
</tr>
<tr>
<th style="text-align:start">parameter</th>
<td>No need</td>
</tr>
<tr>
<th style="text-align:start">method</th>
<td>GET</td>
</tr>
<tr>
<th style="text-align:start">url</th>
<td>api/categories/{category}</td>
</tr>
<tr>
<th style="text-align:start">Format response success</th>
<td>
<pre>
{
    "data": {
        "data": [
            {
                "id": 1,
                "name": "product 1",
                "description": "product 1",
                "price": 6000,
                "offer": 1000,
                "image": "images/product//202211021755about.webp",
                "available": "yes",
                "category_id": 1,
                "created_at": "2022-11-02T16:45:51.000000Z",
                "updated_at": "2022-11-02T17:55:25.000000Z"
            }
        ]
    },
    "message": "",
    "code": 200,
    "errors": []
}
</pre>
</td>
</tr>
<tr>
<th style="text-align:start">Format error</th>
<td>
<pre>
{
    "data": "",
    "message": "fail",
    "code": 404,
    "errors": "object not found"
}
{
    "data": "",
    "message": "fail",
    "code": 405,
    "errors": "Method Not Allowed"
}
</pre>
</td>
</tr>
<tr>
<th style="text-align:start">Vaildation</th>
<td>No need to vaildation</td>
</tr>
</table>

___
## Products:

### Index

<table>
<tr>
<th style="text-align:start">use</th>
<td>get all products</td>
</tr>
<tr>
<th style="text-align:start">parameter</th>
<td>No need</td>
</tr>
<tr>
<th style="text-align:start">method</th>
<td>GET</td>
</tr>
<tr>
<th style="text-align:start">url</th>
<td>api/products</td>
</tr>
<tr>
<th style="text-align:start">Format response success</th>
<td>
<pre>
{
    "data": {
        "data": [
            {
                "id": 111,
                "name": "product 1",
                "description": "product",
                "price": 6000,
                "offer": 3000,
                "image": "images/product//202210181231back-2_1627326624.webp",
                "available": "yes",
                "category_id": 2,
                "created_at": "2022-10-18T12:31:13.000000Z",
                "updated_at": "2022-10-18T12:31:13.000000Z"
            }
        ]
    },
    "message": "",
    "code": 200,
    "errors": []
}
</pre>
</td>
</tr>
<tr>
<th style="text-align:start">Format error</th>
<td>
<pre>
{
    "data": "",
    "message": "fail",
    "code": 404,
    "errors": "object not found"
}
{
    "data": "",
    "message": "fail",
    "code": 405,
    "errors": "Method Not Allowed"
}
</pre>
</td>
</tr>
<tr>
<th style="text-align:start">Vaildation</th>
<td>No need to vaildation</td>
</tr>
</table>

___

### Store

<table>
<tr>
<th style="text-align:start">use</th>
<td>add new product</td>
</tr>
<tr>
<th style="text-align:start">parameter</th>
<td>No need</td>
</tr>
<tr>
<th style="text-align:start">method</th>
<td>POST</td>
</tr>
<tr>
<th style="text-align:start">url</th>
<td>api/products</td>
</tr>
<tr>
<th style="text-align:start">Format response success</th>
<td>
<pre>
{
    "data": {
        "id": 322,
        "name": "product 5555",
        "description": "product 5555",
        "price": "555",
        "offer": "100",
        "image": {},
        "available": "yes",
        "category_id": "18",
        "created_at": "2022-11-01T13:08:16.000000Z",
        "updated_at": "2022-11-01T13:08:16.000000Z"
    },
    "message": "success",
    "code": 201,
    "errors": ""
}
</pre>
</td>
</tr>
<tr>
<th style="text-align:start">Format error</th>
<td>
<pre>
{
    "data": "",
    "message": "fail",
    "code": 404,
    "errors": "object not found"
}
{
    "data": "",
    "message": "fail",
    "code": 405,
    "errors": "Method Not Allowed"
}
</pre>
</td>
</tr>
<tr>
<th style="text-align:start">Vaildation</th>
<td>
<pre>
{
    "data": "",
    "message": "fail",
    "code": 422,
    "errors": {
        "name": [
            "The name field is required."
        ],
        "description": [
            "The description field is required."
        ],
        "image": [
            "The image field is required."
        ],
        "price": [
            "The price field is required."
        ],
        "offer": [
            "The offer field is required."
        ],
        "available": [
            "The available field is required."
        ],
        "category_id": [
            "The category id field is required."
        ]
    }
}
</pre>
</td>
</tr>
</table>


___

### Update

<table>
<tr>
<th style="text-align:start">use</th>
<td>update product that is selected</td>
</tr>
<tr>
<th style="text-align:start">parameter</th>
<td>need</td>
</tr>
<tr>
<th style="text-align:start">method</th>
<td>POST</td>
</tr>
<tr>
<th style="text-align:start">url</th>
<td>api/products/{product}</td>
</tr>
<tr>
<th style="text-align:start">Format response success</th>
<td>
<pre>
{
    "data": {
        "id": 319,
        "name": "product 9999",
        "description": "product 9999",
        "price": "888",
        "offer": "100",
        "image": "images/product//202211011151back-2_1627326624.webp",
        "available": "yes",
        "category_id": "8",
        "created_at": "2022-11-01T11:51:23.000000Z",
        "updated_at": "2022-11-01T13:10:11.000000Z"
    },
    "message": "success",
    "code": 202,
    "errors": ""
}
</pre>
</td>
</tr>
<tr>
<th style="text-align:start">Format error</th>
<td>
<pre>
{
    "data": "",
    "message": "fail",
    "code": 404,
    "errors": "object not found"
}


{
    "data": "",
    "message": "fail",
    "code": 405,
    "errors": "Method Not Allowed"
}
</pre>
</td>
</tr>
<tr>
<th style="text-align:start">Vaildation</th>
<td>
<pre>
{
    "data": "",
    "message": "fail",
    "code": 422,
    "errors": {
        "name": [
            "The name field is required."
        ],
        "description": [
            "The description field is required."
        ],
        "price": [
            "The price field is required."
        ],
        "offer": [
            "The offer field is required."
        ],
        "available": [
            "The available field is required."
        ],
        "category_id": [
            "The category id field is required."
        ]
    }
}
</pre>
</td>
</tr>
</table>

___

### Destroy

<table>
<tr>
<th style="text-align:start">use</th>
<td>delete product that is selected</td>
</tr>
<tr>
<th style="text-align:start">parameter</th>
<td>No need</td>
</tr>
<tr>
<th style="text-align:start">method</th>
<td>DELETE</td>
</tr>
<tr>
<th style="text-align:start">url</th>
<td>api/products/{product}</td>
</tr>
<tr>
<th style="text-align:start">Format response success</th>
<td>
<pre>
{
    "data": {
        "id": 321,
        "name": "product 5555",
        "description": "product 5555",
        "price": 555,
        "offer": 100,
        "image": "images/product//202211011308back-2_1627326624.webp",
        "available": "yes",
        "category_id": 18,
        "created_at": "2022-11-01T13:08:16.000000Z",
        "updated_at": "2022-11-01T13:08:16.000000Z"
    },
    "message": "deleted",
    "code": 204,
    "errors": ""
}
</pre>
</td>
</tr>
<tr>
<th style="text-align:start">Format error</th>
<td>
<pre>
{
    "data": "",
    "message": "fail",
    "code": 404,
    "errors": "object not found"
}
{
    "data": "",
    "message": "fail",
    "code": 405,
    "errors": "Method Not Allowed"
}
{
    "data": "",
    "message": "fail",
    "code": 204,
    "errors": "not found this product id"
}
</pre>
</td>
</tr>
<tr>
<th style="text-align:start">Vaildation</th>
<td>No need to vaildation</td>
</tr>
</table>

___

### Show

<table>
<tr>
<th style="text-align:start">use</th>
<td>show product that is selected</td>
</tr>
<tr>
<th style="text-align:start">parameter</th>
<td>No need</td>
</tr>
<tr>
<th style="text-align:start">method</th>
<td>GET</td>
</tr>
<tr>
<th style="text-align:start">url</th>
<td>api/products/{product}</td>
</tr>
<tr>
<th style="text-align:start">Format response success</th>
<td>
<pre>
{
    "data": {
        "id": 319,
        "name": "product 9999",
        "description": "product 9999",
        "price": 888,
        "offer": 100,
        "image": "images/product//202211011151back-2_1627326624.webp",
        "available": "yes",
        "category_id": 8,
        "created_at": "2022-11-01T11:51:23.000000Z",
        "updated_at": "2022-11-01T13:10:11.000000Z"
    },
    "message": "",
    "code": 200,
    "errors": []
}
</pre>
</td>
</tr>
<tr>
<th style="text-align:start">Format error</th>
<td>
<pre>
{
    "data": "",
    "message": "fail",
    "code": 404,
    "errors": "object not found"
}
{
    "data": "",
    "message": "fail",
    "code": 405,
    "errors": "Method Not Allowed"
}
</pre>
</td>
</tr>
<tr>
<th style="text-align:start">Vaildation</th>
<td>No need to vaildation</td>
</tr>
</table>

___
## Actions:

### Search about product by name

<table>
<tr>
<th style="text-align:start">use</th>
<td>get product by name</td>
</tr>
<tr>
<th style="text-align:start">parameter</th>
<td>need</td>
</tr>
<tr>
<th style="text-align:start">method</th>
<td>GET</td>
</tr>
<tr>
<th style="text-align:start">url</th>
<td>api/searchproductnames</td>
</tr>
<tr>
<th style="text-align:start">Format response success</th>
<td>
<pre>
{
    "data": {
        "data": [
            {
                "id": 117,
                "name": "product 4",
                "description": "product",
                "price": 6000,
                "offer": 3000,
                "image": "images/product//202210181231back-2_1627326624.webp",
                "available": "yes",
                "category_id": 2,
                "created_at": "2022-10-18T12:31:37.000000Z",
                "updated_at": "2022-10-18T12:31:37.000000Z"
            }
        ]
    },
    "message": "success",
    "code": 200,
    "errors": ""
}
</pre>
</td>
</tr>
<tr>
<th style="text-align:start">Format error</th>
<td>
<pre>
{
    "data": "",
    "message": "fail",
    "code": 404,
    "errors": "object not found"
}
{
    "data": "",
    "message": "fail",
    "code": 405,
    "errors": "Method Not Allowed"
}
{
    "data": {
        "data": []
    },
    "message": "success",
    "code": 200,
    "errors": ""
}
</pre>
</td>
</tr>
<tr>
<td> format not found data </td>
<td>
<pre>
{
    "data": [],
    "message": "not found data",
    "code": 404,
    "errors": ""
}
</pre>
</td>
</tr>
<tr>
<th style="text-align:start">Vaildation</th>
<td>
<pre>
{
    "data": "",
    "message": "fail",
    "code": 422,
    "errors": {
        "name": [
            "The name must be at least 3 characters."
        ]
    }
}
</pre>
</td>
</tr>
</table>

___

### View products according to category

<table>
<tr>
<th style="text-align:start">use</th>
<td>get product by category</td>
</tr>
<tr>
<th style="text-align:start">parameter</th>
<td>no need</td>
</tr>
<tr>
<th style="text-align:start">method</th>
<td>GET</td>
</tr>
<tr>
<th style="text-align:start">url</th>
<td>api/productsaccordingcategory/{cate_id}</td>
</tr>
<tr>
<th style="text-align:start">Format response success</th>
<td>
<pre>
{
    "data": {
        "data": [
             {
                "id": 131,
                "name": "product 1",
                "description": "product",
                "price": 6000,
                "offer": 3000,
                "image": "images/product//202210181233back-2_1627326624.webp",
                "available": "yes",
                "category_id": 4,
                "created_at": "2022-10-18T12:33:55.000000Z",
                "updated_at": "2022-10-18T12:33:55.000000Z"
            }
        ]
    },
    "message": "success",
    "code": 200,
    "errors": ""
}
</pre>
</td>
</tr>
<tr>
<th style="text-align:start">Format error</th>
<td>
<pre>
{
    "data": "",
    "message": "fail",
    "code": 404,
    "errors": "object not found"
}
{
    "data": "",
    "message": "fail",
    "code": 405,
    "errors": "Method Not Allowed"
}
{
    "data": {
        "data": []
    },
    "message": "",
    "code": 200,
    "errors": []
}
</pre>
</td>
</tr>
<tr>
<td>format not found data</td>
<td>
<pre>
{
    "data": [],
    "message": "not found data",
    "code": 404,
    "errors": ""
}
</pre>
</td>
</tr>
<tr>
<th style="text-align:start">Vaildation</th>
<td>No need to vaildation</td>
</tr>
</table>

___

### Filter products

<table>
<tr>
<th style="text-align:start">use</th>
<td>get product by name and min price and max price and category</td>
</tr>
<tr>
<th style="text-align:start">parameter</th>
<td>need</td>
</tr>
<tr>
<th style="text-align:start">method</th>
<td>GET</td>
</tr>
<tr>
<th style="text-align:start">url</th>
<td>api/filterproducts</td>
</tr>
<tr>
<th style="text-align:start">Format response success</th>
<td>
<pre>
{
    "data": {
        "data": [
            {
                "id": 137,
                "name": "product 4",
                "description": "product",
                "price": 6000,
                "offer": 3000,
                "image": "images/product//202210181234back-2_1627326624.webp",
                "available": "yes",
                "category_id": 4,
                "created_at": "2022-10-18T12:34:08.000000Z",
                "updated_at": "2022-10-18T12:34:08.000000Z"
            }
        ]
    },
    "message": "success",
    "code": 200,
    "errors": ""
}
</pre>
</td>
</tr>
<tr>
<th style="text-align:start">Format error</th>
<td>
<pre>
{
    "data": "",
    "message": "fail",
    "code": 404,
    "errors": "object not found"
}
{
    "data": "",
    "message": "fail",
    "code": 405,
    "errors": "Method Not Allowed"
}
</pre>
</td>
</tr>
<tr>
<th style="text-align:start">Format response Not found data</th>
<td>
<pre>
{
    "data": [],
    "message": "not found data",
    "code": 404,
    "errors": ""
}
</pre>
</td>
</tr>
<tr>
<th style="text-align:start">Vaildation</th>
<td>
<pre>
{
    "data": "",
    "message": "fail",
    "code": 422,
    "errors": {
        "min_price": [
            "The min price format is invalid."
        ],
        "max_price": [
            "The max price format is invalid."
        ],
        "category_id": [
            "The category id must not be greater than 250 characters."
        ]
    }
}
</pre>
</td>
</tr>
</table>


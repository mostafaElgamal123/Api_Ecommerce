<!-- Samples to products -->

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
<th style="text-align:start">Vaildation</th>
<td>
<pre>
{
    "data": "",
    "message": "fail",
    "code": 200,
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
<th style="text-align:start">Vaildation</th>
<td>
<pre>
{
    "data": "",
    "message": "fail",
    "code": 200,
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
<td>delete</td>
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
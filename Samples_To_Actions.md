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

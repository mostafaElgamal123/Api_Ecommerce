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
                "id": 111,
                "name": "product 1",
                "description": "product",
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
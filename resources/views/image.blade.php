@if (session('success'))
    <strong>{{ session('success') }}</strong>
@endif
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>

<body>

<h2>HTML Table</h2>

<table>
    <tr>
        <th>Company</th>
        <th>Contact</th>
        <th>Image</th>
    </tr>
    <tr>
        <td>Alfreds Futterkiste</td>
        <td>Maria Anders</td>
        <td><img  src="{{ url('storage/profile_images/accueil_1666144085.jpg') }}" alt=""></td>
    </tr>
    <tr>
        <td>Centro comercial Moctezuma</td>
        <td>Francisco Chang</td>
        <td><img  src="{{ url('storage/profile_images/thumbnail/accueil_small_1666144085.jpg')}}" alt=""></td>
    </tr>
    <tr>
        <td>Centro comercial Moctezuma</td>
        <td>Francisco Chang</td>
        <td><img  src="{{ url('storage/profile_images/thumbnail/accueil_medium_1666144085.jpg')}}" alt=""></td>
    </tr>
    <tr>
        <td>Centro comercial Moctezuma</td>
        <td>Francisco Chang</td>
        <td><img  src="{{ url('storage/profile_images/thumbnail/accueil_large_1666144085.jpg')}}" alt=""></td>
    </tr>


</table>

<form action="{{ url('store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <p>
        Upload Image: <input type="file" name="profile_image" />
    </p>
    <button type="submit" name="submit">Submit</button>
</form>

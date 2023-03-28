<!DOCTYPE html>
<html>
<head>
<style>

h1 {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  text-align: center;
  width: 100%;
}
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th, #customers h1 {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #656565;
  color: white;
}
</style>
</head>
<body>

<h1>DATA PEGAWAI</h1>

<table id="customers">
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Jenis Kelamin</th>
    <th>No Handphone</th>
    <th>Dibuat</th>

  </tr>
  @php
    $no=1;    
  @endphp
  @foreach ($data as $row)
  <tr>
    <td>{{$no++}}</td>
    <td>{{$row->nama}}</td>
    <td>{{$row->jeniskelamin}}</td>
    <td>0{{$row->nohp}}</td>
    <td>{{$row->created_at->diffForHumans()}}</td>
  </tr>
  @endforeach
  
</table>

</body>
</html>



<?php
include("shared/connect.php");
include("shared/layout/header.php");
?>



<div class="container-fluid">
 <div class="container py-5">
  <h1 class="text-center"> Data of Mamogram Test For Breast Cancer 2019</h1>
  <div class="table-responsive">
   <table class="table" id="example">
    <thead>
     <tr>
      <th>Year</th>
      <th>Negeri</th>
      <th>BIRADS 0</th>
      <th>35-39 Tahun</th>
      <th>40-44 Tahun</th>
      <th>45-49 Tahun</th>
      <th>50-54 Tahun</th>
      <th>55-59 Tahun</th>
      <th>60-64 Tahun</th>
      <th>65-69 Tahun</th>
      <th>70-74 Tahun</th>
      <th>75 + Tahun</th>
     </tr>
    </thead>
    <tbody></tbody>
   </table>


  </div>

  <div class="row">
   <div class="col col-md-6">
    <canvas id="myChart" width="400" height="400">
   </div>

   <div class="col col-md-6">
    <h2>State Hotspot</h2>
    <div id="map" style="height:500px">
    </div>
   </div>
  </div>
 </div>
</div>


</div>
<!--
<script src="./shared/script/jquery-3.5.1.js"></script>
<script src="./shared/script/bootstrap.bundle.min.js"></script>
<script src="./shared/script/jquery.dataTables.min.js"></script>
<script src="./shared/script/dataTables.buttons.min.js"></script>
<script src="./shared/script/dataTables.bootstrap5.min.js"></script>
-->
<?php
include("shared/layout/script.php");
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script
 src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1G5jv_wQAv9dgavsoI5S_tlSemSw3o4M&libraries=visualization">
</script>
<script src="script1.js"></script>
</body>
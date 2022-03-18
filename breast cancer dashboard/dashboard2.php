<?php
include("shared/connect.php");
include("shared/layout/header.php");
?>



<div class="container-fluid">
 <div class="container pt-5">
  <h1 class="text-center"> Female Breast Cancer Data in San Diego from 2011 to 2017</h1>
  <div class="table-responsive">
   <table class="table" id="example">
    <thead>
     <tr>
      <th>Outcome</th>
      <th>Year of record.</th>
      <th>Geographic area name</th>
      <th>Geographic unit type
      </th>
      <th>Geographic area name in all caps</th>
      <th>Geographic area id number</th>
      <th>Health & Human Services Area (HHSA) Region in which each Subregional Area is contained</th>
      <th>County Supervisorial District in which each Subregional Area is contained</th>
      <th>Total cases, females</th>
      <th>Total rate, females</th>
      <th>Age-adjusted total rate, females</th>
      <th>Cases, ages 0 to 14 years, females</th>
      <th>Rate, ages 0 to 14 years, females</th>
      <th>Cases, ages 15 to 24 years, females</th>
      <th>Rate, ages 15 to 24 years, females</th>
      <th>Cases, ages 25 to 44 years, females</th>
      <th>Rate, ages 25 to 44 years, females</th>
      <th>Cases, ages 45 to 64 years, females</th>
      <th>Rate, ages 45 to 64 years, females</th>
      <th>Cases, ages 45 plus years, females</th>
      <th>Rate, ages ages 45 plus years, females</th>
      <th>Cases, ages 65 plus years, females</th>
      <th>Rate, ages ages 65 plus years, females</th>
      <th>Total cases, females, white</th>
      <th>Total rate, females, white</th>
      <th>Cases, ages 0 to 14 years, females, white</th>
      <th>Rate, ages 0 to 14 years, females, white</th>
      <th>Cases, ages 15 to 24 years, females, white</th>
      <th>Rate, ages 15 to 24 years, females, white</th>
      <th>Cases, ages 25 to 44 years, females, white</th>
      <th>Rate, ages 25 to 44 years, females, white</th>
      <th>Cases, ages 45 to 64 years, females, white</th>
      <th>Rate, ages 45 to 64 years, females, white</th>
      <th>Cases, ages 45 plus years, females, white</th>
      <th>Rate, ages ages 45 plus years, females, white</th>
      <th>Cases, ages 65 plus years, females, white</th>
      <th>Rate, ages ages 65 plus years, females, white</th>
      <th>Total cases, females, black</th>
      <th>Total rate, females, black</th>
      <th>Cases, ages 0 to 14 years, females, black</th>
      <th>Rate, ages 0 to 14 years, females, black</th>
      <th>Cases, ages 15 to 24 years, females, black</th>
      <th>Rate, ages 15 to 24 years, females, black</th>
      <th>Cases, ages 25 to 44 years, females, black</th>
      <th>Rate, ages 25 to 44 years, females, black</th>
      <th>Cases, ages 45 to 64 years, females, black</th>
      <th>Rate, ages 45 to 64 years, females, black</th>
      <th>Cases, ages 45 plus years, females, black</th>
      <th>Rate, ages ages 45 plus years, females, black</th>
      <th>Cases, ages 65 plus years, females, black</th>
      <th>Rate, ages ages 65 plus years, females, black</th>
      <th>Total cases, females, Hispanic</th>
      <th>Total rate, females, Hispanic</th>
      <th>Cases, ages 0 to 14 years, females, Hispanic</th>
      <th>Rate, ages 0 to 14 years, females, Hispanic</th>
      <th>Cases, ages 15 to 24 years, females, Hispanic</th>
      <th>Rate, ages 15 to 24 years, females, Hispanic</th>
      <th>Cases, ages 25 to 44 years, females, Hispanic</th>
      <th>Rate, ages 25 to 44 years, females, Hispanic</th>
      <th>Cases, ages 45 to 64 years, females, Hispanic</th>
      <th>Rate, ages 45 to 64 years, females, Hispanic</th>
      <th>Cases, ages 45 plus years, females, Hispanic</th>
      <th>Rate, ages ages 45 plus years, females, Hispanic</th>
      <th>Cases, ages 65 plus years, females, Hispanic</th>
      <th>Rate, ages ages 65 plus years, females, Hispanic</th>
      <th>Total cases, females, Asian/Pacific Islander</th>
      <th>Total rate, females, Asian/Pacific Islander</th>
      <th>Cases, ages 0 to 14 years, females, Asian/Pacific Islander</th>
      <th>Rate, ages 0 to 14 years, females, Asian/Pacific Islander</th>
      <th>Cases, ages 15 to 24 years, females, Asian/Pacific Islander</th>
      <th>Rate, ages 15 to 24 years, females, Asian/Pacific Islander</th>
      <th>Cases, ages 25 to 44 years, females, Asian/Pacific Islander</th>
      <th>Rate, ages 25 to 44 years, females, Asian/Pacific Islander</th>
      <th>Cases, ages 45 to 64 years, females, Asian/Pacific Islander</th>
      <th>Rate, ages 45 to 64 years, females, Asian/Pacific Islander</th>
      <th>Cases, ages 45 plus years, females, Asian/Pacific Islander</th>
      <th>Rate, ages ages 45 plus years, females, Asian/Pacific Islander</th>
      <th>Cases, ages 65 plus years, females, Asian/Pacific Islander</th>
      <th>Rate, ages ages 65 plus years, females, Asian/Pacific Islander</th>
      <th>Total cases, females, American Indian/Alaska Native</th>
      <th>Total rate, females, American Indian/Alaska Native</th>
      <th>Cases, ages 0 to 14 years, females, American Indian/Alaska Native</th>
      <th>Rate, ages 0 to 14 years, females, American Indian/Alaska Native</th>
      <th>Cases, ages 15 to 24 years, females, American Indian/Alaska Native</th>
      <th>Rate, ages 15 to 24 years, females, American Indian/Alaska Native</th>
      <th>Cases, ages 25 to 44 years, females, American Indian/Alaska Native</th>
      <th>Rate, ages 25 to 44 years, females, American Indian/Alaska Native</th>
      <th>Cases, ages 45 to 64 years, females, American Indian/Alaska Native</th>
      <th>Rate, ages 45 to 64 years, females, American Indian/Alaska Native</th>
      <th>Cases, ages 45 plus years, females, American Indian/Alaska Native</th>
      <th>Rate, ages ages 45 plus years, females, American Indian/Alaska Native</th>
      <th>Cases, ages 65 plus years, females, American Indian/Alaska Native</th>
      <th>Rate, ages ages 65 plus years, females, American Indian/Alaska Native</th>
      <th>Total cases, females, Other race/ethnicity</th>
      <th>Cases, ages 0 to 14 years, females, Other race/ethnicity</th>
      <th>Cases, ages 15 to 24 years, females, Other race/ethnicity</th>
      <th>Cases, ages 25 to 44 years, females, Other race/ethnicity</th>
      <th>Cases, ages 45 to 64 years, females, Other race/ethnicity</th>
      <th>Cases, ages 45 plus years, females, Other race/ethnicity</th>
      <th>Cases, ages 65 plus years, females, Other race/ethnicity</th>
     </tr>
    </thead>
    <tbody></tbody>
   </table>


  </div>
  <div class="row">
   <div class="col"> <canvas id="myChart" width="400" height="400"></canvas></div>
   <div class="col">
    <canvas id="myChart2" width="400" height="400"></canvas>
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
<script src="script2.js"></script>

</body>
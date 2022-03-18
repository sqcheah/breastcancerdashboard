$(document).ready(function () {
  $('#example thead tr')
    .clone(true)
    .addClass('filters')
    .appendTo('#example thead');

  var eventFired = function (type) {
    if (table) {
      generateChart1(table.rows({ search: 'applied' }).data().toArray());
    }
  };
  var table = $('#example')
    .on('search.dt', function () {
      eventFired('Search');
    })
    .DataTable({
      dom: 'Bfrtip',
      ajax: 'import.php',
      orderCellsTop: true,
      drawCallback: function (settings) {
        // Here the response
        var response = settings.json;
        console.log(response);
      },
      columns: [
        {
          data: '2019',
        },
        {
          data: 'Negeri',
        },
        {
          data: 'BIRADS 0',
        },
        {
          data: '35-39 Tahun',
        },
        {
          data: '40-44 Tahun',
        },
        {
          data: '45-49 Tahun',
        },
        {
          data: '50-54 Tahun',
        },
        {
          data: '55-59 Tahun',
        },
        {
          data: '60-64 Tahun',
        },
        {
          data: '65-69 Tahun',
        },
        {
          data: '70-74 Tahun',
        },
        {
          data: '75 + Tahun',
        },
      ],
      columnDefs: [
        {
          searchable: false,
          targets: [0],
        },
        {
          targets: '_all',
          className: 'dt-body-center',
        },
        {
          orderable: false,
          targets: 0,
        },
      ],
      //https://datatables.net/forums/discussion/53287/how-to-reset-values-in-individual-column-searching-text-inputs-at-a-button-click
      initComplete: function () {
        var api = this.api();
        api.columns().every(function (colIdx) {
          var column = this;
          $('.filters th')
            .eq($(api.column(colIdx).header()).index())
            .html('');
          if ([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11].includes(colIdx)) {
            var select = $(
              '<select class="select-filter"><option value=""></option></select>'
            );
            column
              .data()
              .unique()
              .sort()
              .each(function (d, j) {
                select.append('<option value="' + d + '">' + d + '</option>');
              });

            var cell = $('.filters th').eq(
              $(api.column(colIdx).header()).index()
            );
            $(cell).html(select);
            $(
              'select',
              $('.filters th').eq($(api.column(colIdx).header()).index())
            ).on('change', function (e) {
              e.stopPropagation();

              if (column.search() !== this.value) {
                column
                  .search(this.value ? '^' + this.value + '$' : '', true, false)
                  .draw();
              }
            });
          }
        });
        generateChart1(table.rows().data().toArray());
        generateChart2(table.rows().data().toArray());
      },
      buttons: [
        {
          text: 'Reset All Filter Fields',
          className: 'btn btn-warning',
          header: true,
          action: function (e, dt, node, config) {
            $('.select-filter').each(function () {
              $(this).val('');
            });

            dt.columns().every(function () {
              var column = this;
              column.search('');
            });

            dt.search('').draw();
          },
        },
        {
          text: 'Deselect All Active Rows',
          className: 'btn btn-danger',
          header: true,
          action: function (e, dt, node, config) {
            table.rows('.selected').nodes().to$().removeClass('selected');
          },
        },
      ],
    });

  $('#example tbody').on('click', 'tr', function () {
    $(this).toggleClass('selected');
    if (table.rows('.selected').data().length == 0) {
      generateChart1(table.rows().data());
    } else {
      generateChart1(table.rows('.selected').data());
    }
  });
  const ctx = document.getElementById('myChart').getContext('2d');
  let myChart;

  function generateChart1(data) {
    const labels = [
      '35-39 Tahun',
      '40-44 Tahun',
      '45-49 Tahun',
      '50-54 Tahun',
      '55-59 Tahun',
      '60-64 Tahun',
      '70-74 Tahun',
      '75 + Tahun',
    ];

    //https://stackoverflow.com/questions/29364262/how-to-group-by-and-sum-an-array-of-objects
    var result = [];
    data.reduce(function (res, value) {
      if (!res[value['Negeri']]) {
        res[value['Negeri']] = {
          Negeri: value['Negeri'],
          ['35-39 Tahun']: 0,
          ['40-44 Tahun']: 0,

          ['45-49 Tahun']: 0,
          ['50-54 Tahun']: 0,
          ['55-59 Tahun']: 0,
          ['60-64 Tahun']: 0,
          ['70-74 Tahun']: 0,
          ['75 + Tahun']: 0,
        };
        result.push(res[value['Negeri']]);
      }
      res[value['Negeri']]['35-39 Tahun'] += parseInt(value['35-39 Tahun']);
      res[value['Negeri']]['40-44 Tahun'] += parseInt(value['40-44 Tahun']);
      res[value['Negeri']]['45-49 Tahun'] += parseInt(value['45-49 Tahun']);
      res[value['Negeri']]['50-54 Tahun'] += parseInt(value['50-54 Tahun']);
      res[value['Negeri']]['55-59 Tahun'] += parseInt(value['55-59 Tahun']);
      res[value['Negeri']]['60-64 Tahun'] += parseInt(value['60-64 Tahun']);
      res[value['Negeri']]['70-74 Tahun'] += parseInt(value['70-74 Tahun']);
      res[value['Negeri']]['75 + Tahun'] += parseInt(value['75 + Tahun']);

      return res;
    }, {});

    //https://www.youtube.com/watch?v=xZVnkUsg8F8
    const backgroundColor = [];
    const borderColor = [];
    for (let i = 0; i < result.length; i++) {
      const r = Math.floor(Math.random() * 255);
      const g = Math.floor(Math.random() * 255);
      const b = Math.floor(Math.random() * 255);
      backgroundColor.push(`rgba(${r},${g},${b},0.2)`);
      borderColor.push(`rgba(${r},${g},${b},1)`);
    }

    const chartData = result.map(function (da, index) {
      return {
        label: da['Negeri'],
        data: [
          da['35-39 Tahun'],
          da['40-44 Tahun'],
          da['45-49 Tahun'],
          da['50-54 Tahun'],
          da['55-59 Tahun'],
          da['60-64 Tahun'],
          da['70-74 Tahun'],
          da['75 + Tahun'],
        ],
        backgroundColor: backgroundColor[index],
        borderColor: borderColor[index],
        yAxisID: 'y',
      };
    });

    if (myChart) {
      myChart.destroy();
    }
    myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: labels,
        datasets: chartData,
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        //ascpectRatio:0.5,
        interaction: {
          mode: 'index',
          intersect: false,
        },
        stacked: false,
        plugins: {
          title: {
            display: true,
            text: 'Age Group vs State',
          },
        },
        scales: {
          y: {
            type: 'linear',
            display: true,
            position: 'left',
          },
        },
      },
    });
  }
  //https://developers.google.com/maps/documentation/javascript/examples/map-sync#maps_map_sync-javascript
  function generateChart2(data) {
    const coords = {
      Johor: new google.maps.LatLng(2.0229012, 103.3147721),
      Kedah: new google.maps.LatLng(5.8098265, 100.6715035),
      Kelantan: new google.maps.LatLng(5.4021302, 102.0635972),
      Melaka: new google.maps.LatLng(2.3293744, 102.2880962),
      'Negeri Sembilan': new google.maps.LatLng(2.7831895, 102.1925319),
      Pahang: new google.maps.LatLng(3.6168822, 102.5994547),
      'Pulau Pinang': new google.maps.LatLng(5.4065013, 100.2559077),
      Perak: new google.maps.LatLng(4.812181, 100.9797908),
      Perlis: new google.maps.LatLng(6.4868392, 100.2577623),
      Selangor: new google.maps.LatLng(3.2083304, 101.304146),
      Terengganu: new google.maps.LatLng(4.8630743, 102.9949297),
      Sabah: new google.maps.LatLng(5.4257359, 117.0326392),
      Sarawak: new google.maps.LatLng(2.5023855, 112.9547283),
      'WP Putrajaya': new google.maps.LatLng(2.9140567, 101.6838531),
    };
    var result = [];
    var highest = 0;
    data.reduce(function (res, value) {
      if (
        value['Negeri'] != 'Tiada Makulmat' ||
        value['Negeri'] != 'Malaysia'
      ) {
        if (!res[value['Negeri']]) {
          res[value['Negeri']] = {
            Negeri: value['Negeri'],
            sum: 0,
          };
          result.push(res[value['Negeri']]);
        }
        res[value['Negeri']]['sum'] +=
          parseInt(value['35-39 Tahun']) +
          parseInt(value['40-44 Tahun']) +
          parseInt(value['45-49 Tahun']) +
          parseInt(value['50-54 Tahun']) +
          parseInt(value['55-59 Tahun']) +
          parseInt(value['60-64 Tahun']) +
          parseInt(value['70-74 Tahun']) +
          parseInt(value['75 + Tahun']);
      }
      if (res[value['Negeri']]['sum'] > highest)
        highest = res[value['Negeri']]['sum'];
      return res;
    }, {});

    const chartData = result.map(function (value) {
      return { location: coords[value['Negeri']], weight: value['sum'] };
    });
    let map, heatmap;
    // Initialize and add the map

    let malaysiaCenter = new google.maps.LatLng(1.605, 108.945);
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 5,
      center: malaysiaCenter,
      mapTypeId: 'terrain',
    });

    result.forEach(function (value) {
      const cityCircle = new google.maps.Circle({
        strokeColor: '#FF0000',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: '#FF0000',
        fillOpacity: 0.35,
        map,
        center: coords[value['Negeri']],
        radius: value['sum'] * 10,
      });
    });
  }
});
/**
 * 
 *   function generateChart2(data) {
    const coords = {
      Johor: new google.maps.LatLng(2.0229012, 103.3147721),
      Kedah: new google.maps.LatLng(5.8098265, 100.6715035),
      Kelantan: new google.maps.LatLng(5.4021302, 102.0635972),
      Melaka: new google.maps.LatLng(2.3293744, 102.2880962),
      'Negeri Sembilan': new google.maps.LatLng(2.7831895, 102.1925319),
      Pahang: new google.maps.LatLng(3.6168822, 102.5994547),
      'Pulau Pinang': new google.maps.LatLng(5.4065013, 100.2559077),
      Perak: new google.maps.LatLng(4.812181, 100.9797908),
      Perlis: new google.maps.LatLng(6.4868392, 100.2577623),
      Selangor: new google.maps.LatLng(3.2083304, 101.304146),
      Terengganu: new google.maps.LatLng(4.8630743, 102.9949297),
      Sabah: new google.maps.LatLng(5.4257359, 117.0326392),
      Sarawak: new google.maps.LatLng(2.5023855, 112.9547283),
      'WP Putrajaya': new google.maps.LatLng(2.9140567, 101.6838531),
    };
    var result = [];
    var highest = 0;
    data.reduce(function (res, value) {
      if (
        value['Negeri'] != 'Tiada Makulmat' ||
        value['Negeri'] != 'Malaysia'
      ) {
        if (!res[value['Negeri']]) {
          res[value['Negeri']] = {
            Negeri: value['Negeri'],
            sum: 0,
          };
          result.push(res[value['Negeri']]);
        }
        res[value['Negeri']]['sum'] +=
          parseInt(value['35-39 Tahun']) +
          parseInt(value['40-44 Tahun']) +
          parseInt(value['45-49 Tahun']) +
          parseInt(value['50-54 Tahun']) +
          parseInt(value['55-59 Tahun']) +
          parseInt(value['60-64 Tahun']) +
          parseInt(value['70-74 Tahun']) +
          parseInt(value['75 + Tahun']);
      }
      if (res[value['Negeri']]['sum'] > highest)
        highest = res[value['Negeri']]['sum'];
      return res;
    }, {});

    const chartData = result.map(function (value) {
      return { location: coords[value['Negeri']], weight: value['sum'] };
    });
    let map, heatmap;
    // Initialize and add the map

    var heatMapData = [
      {
        location: new google.maps.LatLng(37.782, -122.447),
        weight: 0.5,
      },
      new google.maps.LatLng(37.782, -122.445),
      {
        location: new google.maps.LatLng(37.782, -122.443),
        weight: 2,
      },
      {
        location: new google.maps.LatLng(37.782, -122.441),
        weight: 3,
      },
      {
        location: new google.maps.LatLng(37.782, -122.439),
        weight: 2,
      },
      new google.maps.LatLng(37.782, -122.437),
      {
        location: new google.maps.LatLng(37.782, -122.435),
        weight: 0.5,
      },

      {
        location: new google.maps.LatLng(37.785, -122.447),
        weight: 3,
      },
      {
        location: new google.maps.LatLng(37.785, -122.445),
        weight: 2,
      },
      new google.maps.LatLng(37.785, -122.443),
      {
        location: new google.maps.LatLng(37.785, -122.441),
        weight: 0.5,
      },
      new google.maps.LatLng(37.785, -122.439),
      {
        location: new google.maps.LatLng(37.785, -122.437),
        weight: 2,
      },
      {
        location: new google.maps.LatLng(37.785, -122.435),
        weight: 3,
      },
    ];

    let malaysiaCenter = new google.maps.LatLng(2.9140567, 101.6838531);
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 5,
      center: malaysiaCenter,
      mapTypeId: 'satellite',
    });
    heatmap = new google.maps.visualization.HeatmapLayer({
      data: heatMapData,
      map: map,
    });
    heatmap.setMap(map);
  }
 */

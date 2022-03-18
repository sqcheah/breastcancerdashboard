$(document).ready(function () {
  $('#example thead tr')
    .clone(true)
    .addClass('filters')
    .appendTo('#example thead');

  var eventFired = function (type) {
    if (table) {
      generateChart1(table.rows({ search: 'applied' }).data().toArray());
      generateChart2(table.rows({ search: 'applied' }).data().toArray());
    }
  };
  var table = $('#example')
    .on('search.dt', function () {
      eventFired('Search');
    })
    .DataTable({
      dom: 'Bfrtip',
      ajax: {
        url: 'https://data.sandiegocounty.gov/resource/c9w2-uiw2.json',
        dataSrc: '',
        error: function (xhr, error, thrownError) {
          alert('Error connecting to dataset');
        },
      },
      orderCellsTop: true,

      drawCallback: function (settings) {
        // Here the response
        var response = settings.json;
        console.log(response);
      },
      columns: [
        //{ data: 'condition' },
        { data: 'outcome' },
        { data: 'year' },
        { data: 'geography' },
        { data: 'geotype' },
        { data: 'geoname' },
        { data: 'geoid' },
        { data: 'region' },
        { data: 'district' },
        { data: 'total_female' },
        { data: 'total_femalerate' },
        { data: 'aa_totalfemalerate' },
        { data: 'age0_14_female' },
        { data: 'age0_14_femalerate' },
        { data: 'age15_24_female' },
        { data: 'age15_24_femalerate' },
        { data: 'age25_44_female' },
        { data: 'age25_44_femalerate' },
        { data: 'age45_64_female' },
        { data: 'age45_64_femalerate' },
        { data: 'age45plus_female' },
        { data: 'age45plus_femalerate' },
        { data: 'age65plus_female' },
        { data: 'age65plus_femalerate' },
        { data: 'white_total_female' },
        { data: 'white_total_femalerate' },
        { data: 'white_age0_14_female' },
        { data: 'white_age0_14_femalerate' },
        { data: 'white_age15_24_female' },
        { data: 'white_age15_24_femalerate' },
        { data: 'white_age25_44_female' },
        { data: 'white_age25_44_femalerate' },
        { data: 'white_age45_64_female' },
        { data: 'white_age45_64_femalerate' },
        { data: 'white_age45plus_female' },
        { data: 'white_age45plus_femalerate' },
        { data: 'white_age65plus_female' },
        { data: 'white_age65plus_femalerate' },
        { data: 'black_total_female' },
        { data: 'black_total_femalerate' },
        { data: 'black_age0_14_female' },
        { data: 'black_age0_14_femalerate' },
        { data: 'black_age15_24_female' },
        { data: 'black_age15_24_femalerate' },
        { data: 'black_age25_44_female' },
        { data: 'black_age25_44_femalerate' },
        { data: 'black_age45_64_female' },
        { data: 'black_age45_64_femalerate' },
        { data: 'black_age45plus_female' },
        { data: 'black_age45plus_femalerate' },
        { data: 'black_age65plus_female' },
        { data: 'black_age65plus_femalerate' },
        { data: 'hispanic_total_female' },
        { data: 'hispanic_total_femalerate' },
        { data: 'hispanic_age0_14_female' },
        { data: 'hispanic_age0_14_femalerate' },
        { data: 'hispanic_age15_24_female' },
        { data: 'hispanic_age15_24_femalerate' },
        { data: 'hispanic_age25_44_female' },
        { data: 'hispanic_age25_44_femalerate' },
        { data: 'hispanic_age45_64_female' },
        { data: 'hispanic_age45_64_femalerate' },
        { data: 'hispanic_age45plus_female' },
        { data: 'hispanic_age45plus_femalerate' },
        { data: 'hispanic_age65plus_female' },
        { data: 'hispanic_age65plus_femalerate' },
        { data: 'api_total_female' },
        { data: 'api_total_femalerate' },
        { data: 'api_age0_14_female' },
        { data: 'api_age0_14_femalerate' },
        { data: 'api_age15_24_female' },
        { data: 'api_age15_24_femalerate' },
        { data: 'api_age25_44_female' },
        { data: 'api_age25_44_femalerate' },
        { data: 'api_age45_64_female' },
        { data: 'api_age45_64_femalerate' },
        { data: 'api_age45plus_female' },
        { data: 'api_age45plus_femalerate' },
        { data: 'api_age65plus_female' },
        { data: 'api_age65plus_femalerate' },
        { data: 'aian_total_female' },
        { data: 'aian_total_femalerate' },
        { data: 'aian_age0_14_female' },
        { data: 'aian_age0_14_femalerate' },
        { data: 'aian_age15_24_female' },
        { data: 'aian_age15_24_femalerate' },
        { data: 'aian_age25_44_female' },
        { data: 'aian_age25_44_femalerate' },
        { data: 'aian_age45_64_female' },
        { data: 'aian_age45_64_femalerate' },
        { data: 'aian_age45plus_female' },
        { data: 'aian_age45plus_femalerate' },
        { data: 'aian_age65plus_female' },
        { data: 'aian_age65plus_femalerate' },
        { data: 'other_notaian_total_female' },
        { data: 'other_notaian_age0_14_female' },
        { data: 'other_notaian_age15_24_female' },
        { data: 'other_notaian_age25_44_female' },
        { data: 'other_notaian_age45_64_female' },
        { data: 'other_notaian_age45plus_female' },
        { data: 'other_notaian_age65plus_female' },
      ],
      columnDefs: [
        {
          targets: '_all',
          className: 'dt-body-center',
        },
        {
          data: null,
          defaultContent: 0,
          targets: '_all',
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
      generateChart2(table.rows().data());
    } else {
      generateChart1(table.rows('.selected').data());
      generateChart2(table.rows('.selected').data());
    }
  });
  const ctx = document.getElementById('myChart').getContext('2d');
  const ctx2 = document.getElementById('myChart2').getContext('2d');
  let myChart, myChart2;
  function generateChart1(data) {
    const outcomes = table.column(0).data().unique().toArray();
    const years = table.column(1).data().unique().sort().toArray();

    var result = [];
    data.reduce(function (res, value) {
      if (!res[value['outcome']]) {
        res[value['outcome']] = {
          outcome: value['outcome'],
          ['2011']: 0,
          ['2012']: 0,
          ['2013']: 0,
          ['2014']: 0,
          ['2015']: 0,
          ['2016']: 0,
          ['2017']: 0,
        };
        result.push(res[value['outcome']]);
      }
      res[value['outcome']][value['year']] += value['total_female']
        ? parseInt(value['total_female'])
        : 0;

      return res;
    }, {});

    //https://www.youtube.com/watch?v=xZVnkUsg8F8
    const backgroundColor = [];
    const borderColor = [];
    for (let i = 0; i < result.length; i++) {
      const r = Math.floor(Math.random() * 255);
      const g = Math.floor(Math.random() * 255);
      const b = Math.floor(Math.random() * 255);
      backgroundColor.push(`rgba(${r},${g},${b},0.5)`);
      borderColor.push(`rgba(${r},${g},${b},1)`);
    }

    const chartData = result.map(function (da, index) {
      return {
        label: da['outcome'],
        data: [
          da['2011'],
          da['2012'],
          da['2013'],
          da['2014'],
          da['2015'],
          da['2016'],
          da['2017'],
        ],
        backgroundColor: backgroundColor[index],
        borderColor: borderColor[index],
      };
    });

    if (myChart) {
      myChart.destroy();
    }
    myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: years,
        datasets: chartData,
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top',
          },
          title: {
            display: true,
            text: 'Outcome of Total Female Cases per Year',
          },
        },
      },
    });
  }

  function generateChart2(data) {
    const geotype = table.column(3).data().unique().sort().toArray();
    const years = table.column(1).data().unique().sort().toArray();

    var result = [];
    data.reduce(function (res, value) {
      if (!res[value['geotype']]) {
        res[value['geotype']] = {
          geotype: value['geotype'],
          count: 0,
        };

        result.push(res[value['geotype']]);
      }
      res[value['geotype']]['count'] += value['age65plus_female']
        ? parseInt(value['age65plus_female'])
        : 0;

      return res;
    }, {});

    //https://www.youtube.com/watch?v=xZVnkUsg8F8
    const backgroundColor = [];
    const borderColor = [];
    for (let i = 0; i < result.length; i++) {
      const r = Math.floor(Math.random() * 255);
      const g = Math.floor(Math.random() * 255);
      const b = Math.floor(Math.random() * 255);
      backgroundColor.push(`rgba(${r},${g},${b},0.5)`);
      borderColor.push(`rgba(${r},${g},${b},1)`);
    }
    const labels = [];
    const chartData = {
      label: 'Count',
      data: result.map(function (da, index) {
        labels.push(da['geotype']);
        return da['count'];
      }),
      backgroundColor: backgroundColor,
      borderColor: borderColor,
    };

    if (myChart2) {
      myChart2.destroy();
    }
    myChart2 = new Chart(ctx2, {
      type: 'pie',
      data: { labels: labels, datasets: [chartData] },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top',
          },
          title: {
            display: true,
            text: 'Age 65 + Female Cases According to Geography Type',
          },
        },
      },
    });
  }
});

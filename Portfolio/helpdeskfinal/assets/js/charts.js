document.addEventListener("DOMContentLoaded", function() {
    const baseUrl = '<?= base_url("index.php/UserController/get_ticket_data") ?>';
    
    const echartSetOption = (chart, option) => {
      chart.setOption(option);
      window.addEventListener('resize', () => chart.resize());
    };
  
    // Fetch data from the server
    fetch(baseUrl)
      .then(response => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.json();
      })
      .then(data => {
        console.log(data); // Debugging untuk memastikan data benar
  
        // Status Chart
        const statusChartDom = document.getElementById('status-chart');
        const statusChart = echarts.init(statusChartDom);
        const statusOption = {
          title: {
            text: 'Status',
            left: 'center',
            top: 'top',
            textStyle: {
              fontSize: 24,
              fontWeight: 'bold',
              color: '#333'
            }
          },
          tooltip: {
            trigger: 'item',
            formatter: '{a} <br/>{b} : {c} ({d}%)'
          },
          legend: {
            orient: 'horizontal',
            top: 'bottom',
            data: data.status_data.map(item => item.STATUS),
            textStyle: {
              fontSize: 14
            }
          },
          series: [{
            name: 'Status',
            type: 'pie',
            radius: ['50%', '70%'],
            avoidLabelOverlap: false,
            itemStyle: {
              borderRadius: 10,
              borderColor: '#fff',
              borderWidth: 2
            },
            label: {
              show: false,
              position: 'center'
            },
            labelLine: {
              show: false
            },
            data: data.status_data.map(item => ({
              value: item.count,
              name: item.STATUS
            }))
          }]
        };
        echartSetOption(statusChart, statusOption);
  
        // Category Chart
        const categoryChartDom = document.getElementById('category-chart');
        const categoryChart = echarts.init(categoryChartDom);
        const categoryOption = {
          title: {
            text: 'Category',
            left: 'center',
            top: 'top',
            textStyle: {
              fontSize: 24,
              fontWeight: 'bold',
              color: '#333'
            }
          },
          tooltip: {
            trigger: 'item',
            formatter: '{a} <br/>{b} : {c} ({d}%)'
          },
          legend: {
            orient: 'horizontal',
            top: 'bottom',
            data: data.category_data.map(item => item.CATEGORY),
            textStyle: {
              fontSize: 14
            }
          },
          series: [{
            name: 'Category',
            type: 'pie',
            radius: ['50%', '70%'],
            avoidLabelOverlap: false,
            itemStyle: {
              borderRadius: 10,
              borderColor: '#fff',
              borderWidth: 2
            },
            label: {
              show: false,
              position: 'center'
            },
            labelLine: {
              show: false
            },
            data: data.category_data.map(item => ({
              value: item.count,
              name: item.CATEGORY
            }))
          }]
        };
        echartSetOption(categoryChart, categoryOption);
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  });
  
const Dashboard = {
    template: `
      <div>
            <h1 class="h3 mb-3"><strong>Dashboard</strong> Today:  24.02.2024 </h1>
          <div class="row">
              <div class="col-12 col-md-6 col-xxl-3 d-flex">
              
                  <div class="card flex-fill w-100">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Upcoming Lessons</h5>
                    </div>
                    
                    <div class="card-body">
                        <router-link to="/teacher/timetable" class="btn btn-primary mt-2">View Timetable</router-link>
                    </div>

                  </div>

              </div>

              <div class="col-12 col-md-6 col-xxl-3 d-flex">
                <div class="card flex-fill w-100">
                  <div class="card-header">
                    <h5 class="card-title mb-0">Student Satisfaction & Engagement</h5>
                  </div>
                  <div class="card-body d-flex">
                    <div class="align-self-center w-100">
                      <div class="py-3">
                        <div class="chart chart-xs">
                          <canvas id="chartjs-dashboard-pie"></canvas>
                        </div>
                      </div>

                      <table class="table mr-5 mb-0">
                        <tbody>
                          <tr>
                            <td>High Satisfaction</td>
                            <td class="text-end">150</td>
                          </tr>
                          <tr>
                            <td>Average Satisfaction</td>
                            <td class="text-end">20</td>
                          </tr>
                          <tr>
                            <td>Low Satisfaction</td>
                            <td class="text-end">10</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>  

              <div class="col-12 col-md-6 col-xxl-3 d-flex">
                  <div class="card flex-fill w-100">
                      <div class="card-header">
                          <h5 class="card-title mb-0">Top Students</h5>
                      </div>
                      <div class="card-body">
                          <ul class="list-group">
                              <li v-for="student in topStudents" :key="student.id" class="list-group-item d-flex justify-content-between align-items-center">
                                  {{ student.name }}
                                  <span class="badge bg-success">{{ student.score }}</span>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>

              <div class="col-12 col-md-6 col-xxl-3 d-flex">
                  <div class="card flex-fill w-100">
                      <div class="card-header">
                          <h5 class="card-title mb-0">Performance Chart</h5>
                      </div>
                      <div class="card-body">
                          <apexchart type="bar" width="380" :options="chartOptions" :series="series"></apexchart>
                      </div>
                  </div>
              </div>

              <div class="col-12">
                  <div class="card flex-fill">
                      <div class="card-header">
                          <h5 class="card-title mb-0">Teacher's Recommendations</h5>
                      </div>
                      <div class="card-body">
                          <ul>
                              <li>
                                Таблица или карточки с распчисанием на сегодня / завтра
                              </li>
                              <li>
                                Ближайшие уроки
                              </li>
                              <li>
                                Предмет, класс, время, аудитория
                              </li>
                              <li>
                              Процент посещаемости студентов
                              </li>
                              <li> Пропуски студентов (список студентов, часто отсутствующих)</li>
                              <li>Достижения и прогресс студентов</li>
                              <li>График успеваемости по классам</li>
                              <li>Кнопка для быстрого перехода в "Timetable"Количество проведенных уроков за неделю / месяц</li>
                              <li> Рейтинг лучших учеников</li>
                              <li>Замечания и рекомендации вот я выбрал теперь в каком формате их изобразить?</li>
                          </ul>
                      </div>
                  </div>
              </div>

            </div>
      </div>
      `,
    data() {
        return {

        };
    },
    mounted() {
        var ctx = document.getElementById('myPieChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ['Red', 'Blue', 'Yellow'],
            datasets: [{
              data: [30, 50, 20],
              backgroundColor: ['red', 'blue', 'yellow']
            }]
          }
        });
      
  
      document.addEventListener("DOMContentLoaded", function () {
        // Pie chart
        new Chart(document.getElementById("chartjs-dashboard-pie"), {
          type: "pie",
          data: {
            labels: ["High Satisfaction", "Average Satisfaction", "Low Satisfaction"],
            datasets: [
              {
                data: [150, 20, 10],
                backgroundColor: [
                  window.theme.primary,
                  window.theme.warning,
                  window.theme.danger,
                ],
                borderWidth: 5,
              },
            ],
          },
          options: {
            responsive: !window.MSInputMethodContext,
            maintainAspectRatio: false,
            legend: {
              display: false,
            },
            cutoutPercentage: 75,
          },
        });
      });
      
  
  },
    
    
    
    methods: {
    }
};

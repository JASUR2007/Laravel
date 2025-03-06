const Timetable = {
    template: `
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="text-center mb-2">
                        <h2 class="heading-section">Time Table</h2>
                        <p style="justify-content: space-between; display: flex;">
                            <a href="#" @click.prevent="previousWeek" class="week-nav" style="color: rgb(103 103 103);font-size: 20px;">
                                <i class="fa fa-long-arrow-left"></i></a>
                            {{ formattedWeek }}
                            <a href="#" @click.prevent="nextWeek" class="week-nav" style="color: rgb(103 103 103);font-size: 20px;">
                                <i class="fa-solid fa-right-long"></i>
                            </a>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-wrap">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th v-for="day in dayNames" :key="day">{{ day }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="lessonIndex in maxLessons" :key="lessonIndex">
                                        <td v-for="(day, index) in dayNames" :key="index" class="timetable_td">
                                            <router-link
                                                v-if="scheduleByDay[day] && scheduleByDay[day][lessonIndex]"
                                                :to="'/teacher/attendance/' + scheduleByDay[day][lessonIndex].class.class_id + '/' + scheduleByDay[day][lessonIndex].lesson.date"
                                            >
                                                <p style="position: absolute; margin: -20px 0 0 -20px;" class="lesson_number_time">{{ lessonIndex }}</p>
                                                <h2 style="font-size: 1.53125rem;">{{ scheduleByDay[day][lessonIndex].subject.name }}</h2>
                                                <strong class="text-info">{{ scheduleByDay[day][lessonIndex].room_number }}</strong>
                                                <br>
                                                {{ scheduleByDay[day][lessonIndex].time }}
                                            </router-link>
                                            <i v-else class="fa fa-close"></i>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    `,
    data() {
        return {
            dayNames: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
            timetable: [],
            currentWeekStart: null,
            domain_url:window.location.href
        };
    },
    computed: {
        currentWeekEnd() {
            if (!this.currentWeekStart) return null;
            let endDate = new Date(this.currentWeekStart);
            endDate.setDate(endDate.getDate() + 6);
            return endDate;
        },
        formattedWeek() {
            if (!this.currentWeekStart || !this.currentWeekEnd) {
                return "Loading...";
            }
            return `${this.formatDate(this.currentWeekStart)} - ${this.formatDate(this.currentWeekEnd)}`;
        },
        scheduleByDay() {
            let grouped = {};

            this.timetable.forEach((lesson) => {
                console.log("Lesson:", lesson);

                let date = new Date(lesson.date);
                let dayIndex = date.getDay();
                let dayName = this.dayNames[dayIndex - 1] || "Sunday";

                if (!grouped[dayName]) {
                    grouped[dayName] = {};
                }

                grouped[dayName][lesson.lesson_number] = {
                    subject: lesson.subject ? { name: lesson.subject.name } : { name: "Unknown Subject" },
                    class: lesson.class ? {class_id: lesson.class.class_id} : {class_id: "Undefined"},
                    room_number: lesson.room_number || "N/A",
                    time: lesson.time || "Time Unknown",
                    lesson: lesson || "Time Unknown"
                };

            });

            console.log("Grouped schedule:", grouped);
            return grouped;
        },
        maxLessons() {
            return this.timetable.length > 0
                ? Math.max(...this.timetable.map((lesson) => lesson.lesson_number))
                : 5;
        }
    },
    methods: {
        getStartOfWeek(date) {
            let start = new Date(date);
            let day = start.getDay();
            let diff = start.getDate() - day + (day === 0 ? -6 : 1);
            let result = new Date(start.setDate(diff));

            console.log(`getStartOfWeek(${date.toISOString()}): ${result.toISOString()}`);
            return result;
        },
        goToLesson(student_id) {
            fetch('teacher/attendance/' + student_id)
                .then(res => res.json())
                .then(rep => console.log(rep))
        },
        formatDate(date) {
            if (!date) return "Invalid date";
            return date.toLocaleDateString("en-GB", { day: "2-digit", month: "short" });
        },
        fetchTimetable() {
            if (!this.currentWeekStart || !this.currentWeekEnd) return;

            let start = this.currentWeekStart.toISOString().split("T")[0];
            let end = this.currentWeekEnd.toISOString().split("T")[0];

            // console.log(`Fetching timetable for: ${start} - ${end}`);
            // console.log("Current week start:", this.currentWeekStart.toISOString());
            // console.log("Current week end:", this.currentWeekEnd.toISOString());

            fetch(`/teacher/t_timetable?start_date=${start}&end_date=${end}`)
                .then((res) => res.ok ? res.json() : Promise.reject(res.statusText))
                .then((data) => {
                    console.log("Fetched data:", data);
                    this.timetable = Array.isArray(data.timetable) ? data.timetable : [];
                })
                .catch((error) => console.error("Fetch error:", error));
        },
        previousWeek() {
            let newDate = new Date(this.currentWeekStart);
            newDate.setDate(newDate.getDate() - 7);
            this.currentWeekStart = this.getStartOfWeek(newDate);
            console.log("Previous week selected:", this.currentWeekStart.toISOString());
        },
        nextWeek() {
            let newDate = new Date(this.currentWeekStart);
            newDate.setDate(newDate.getDate() + 7);
            this.currentWeekStart = this.getStartOfWeek(newDate);
            console.log("Next week selected:", this.currentWeekStart.toISOString());
        }
    },
    watch: {
        currentWeekStart: function (newVal) {
            console.log("New week selected:", newVal);
            this.fetchTimetable();
        }
    },
    mounted() {
        this.currentWeekStart = this.getStartOfWeek(new Date());
    }
};

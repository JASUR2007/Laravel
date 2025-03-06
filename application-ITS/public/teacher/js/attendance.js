const Attendance = {
    template: `
        <div class="container mt-4">
            <h2 class="text-center mb-3">Attendance</h2>
            <div v-if="students.length">
                <table class="table table-bordered table-striped">
                    <thead class="table" style="background-color:#222e3c">
                        <tr>
                            <th style='color:white'>Student</th>
                            <th style='color:white'>Status</th>
                            <th style='color:white'>Grade</th>
                            <th style='color:white'>Comments</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="student in students" :key="student.id">
                            <td>{{ student.first_name }} {{ student.last_name }}</td>
                            <td>
                                <select v-model="attendance[student.id].status" class="form-select">
                                    <option value="present">Present</option>
                                    <option value="absent">Absent</option>
                                </select>
                            </td>
                            <td>
                                <input type="number" v-model="attendance[student.id].grade" min="1" max="5" class="form-control">
                            </td>
                            <td>
                                <input type="text" v-model="attendance[student.id].comments" class="form-control">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button @click="submitAttendance" class="btn btn-primary w-100 mt-3">Save</button>
            </div>
            <p v-else class="text-center text-muted">No attendance data available.</p>
        </div>
    `,
    props: ['date', 'class_id'],
    data() {
        return {
            students: [],
            attendance: {}
        };
    },
    mounted() {
        console.log("Props received:", { date: this.date, class_id: this.class_id });

        if (!this.class_id || !this.date) {
            console.error("Error: class_id or date missing in route");
            return;
        }

        fetch(`/attendance/${this.class_id}/${this.date}`)
            .then(response => response.json())
            .then(data => {
                console.log("Fetched data:", data);

                this.students = data.students || [];

                const attendanceMap = (data.attendance || []).reduce((acc, entry) => {
                    acc[entry.student_id] = {
                        status: entry.status || 'absent',
                        grade: entry.grade || '',
                        comments: entry.comments || ''
                    };
                    return acc;
                }, {});

                this.attendance = this.students.reduce((acc, student) => {
                    acc[student.id] = attendanceMap[student.id] || {
                        status: 'present',
                        grade: '',
                        comments: ''  
                    };
                    return acc;
                }, {});

                console.log("Processed attendance:", this.attendance);
            })
            .catch(error => console.error("Error loading data:", error));
    },
    setup() {
        const csrfToken = Vue.inject("csrfToken");
        return { csrfToken };
    },
    methods: {
        submitAttendance() {
            const formData = new FormData();
            formData.append('date', this.date);
            formData.append('class_id', this.class_id);

            Object.keys(this.attendance).forEach(studentId => {
                let grade = parseInt(this.attendance[studentId].grade, 10);
                if (isNaN(grade) || grade < 1) grade = 1;
                if (grade > 5) grade = 5;
                formData.append(`attendance[${studentId}][student_id]`, studentId);
                formData.append(`attendance[${studentId}][status]`, this.attendance[studentId]?.status || '');
                formData.append(`attendance[${studentId}][grade]`, this.attendance[studentId]?.grade || '');
                formData.append(`attendance[${studentId}][comments]`, this.attendance[studentId]?.comments || '');
            });
            console.log("Sending data:", Object.fromEntries(formData.entries()));
            fetch("/attendance", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": this.csrfToken,
                    'Accept': 'application/json'
                },
                body: formData
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => alert("Attendance saved successfully"))
                .catch(error => console.error("Error saving attendance:", error));
        }
    }
};

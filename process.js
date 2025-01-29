let tasks =[];

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('taskForm');
    const taskTableBody = document.getElementById('taskBody');
    const tasksList = document.getElementById('tasklist');

    const addTask = () => {
        const taskInput = document.getElementById('taskInput');
        const task = taskInput.value.trim();

        if (!task) {
            alert('Please enter a task');
            return;
        } else {
            tasks.push({ text: task, completed: false });
            updateTasksList();
        }

        taskInput.value = ''; // Clear input field after adding task

        
    };


    const toggleTaskComplete = (index) => {
       tasks[index].completed = !tasks[index].completed;
    };

    const editTask = (index) => {
        const newTask = prompt('Enter the new task', tasks[index].text);
        if (newTask) {
            tasks[index].text = newTask;
            updateTasksList();
        }
    };

    const deleteTask = (index) => {
        tasks.splice(index, 1);
        updateTasksList();
    };
  
    const updateProgress = () => {
        const completedTasks = tasks.filter(task => task.completed).length;
        const totalTasks = tasks.length;
        const progress = totalTasks === 0 ? 0 : (completedTasks / totalTasks) * 100;

        document.getElementById('progress').style.width = `${progress}%`;
        document.getElementById('numbers').innerText = `${completedTasks} / ${totalTasks}`;

        if (completedTasks == totalTasks) {
            Confetti();
        }

        if (totalTasks > 0 && completedTasks === totalTasks) {
            Confetti();
        }

    };


    const updateTasksList = () => {
        tasksList.innerHTML = '';
        tasks.forEach((task, index) => {
            const taskElement = document.createElement('li');
            taskElement.innerHTML = `
                <div class="taskItem">
                <div class="task ${task.completed ? 'completed' : ''}">
                    <input type="checkbox" class="taskCheckbox" ${task.completed ? "checked" : ""}>
                    <span>${task.text}</span>
                </div>
                <div class="taskIcons">
                    <i class="bi bi-eraser-fill" onClick="editTask(${index})"></i>
                    <i class="bi bi-pencil" onClick="deleteTask(${index})"></i>
                </div>
            </div>
            `; 

            taskElement.querySelector('.taskItem').addEventListener('click', () => {
                toggleTaskComplete(index);
                updateTasksList(); // Update the task list UI immediately
            });
            
        

        //Edit task
        taskElement.querySelector('i.bi.bi-pencil').addEventListener('click', () => {
            editTask(index);
        });

        //Delete task
        taskElement.querySelector('i.bi.bi-eraser-fill').addEventListener('click', () => {
            deleteTask(index);
        });

        tasksList.appendChild(taskElement);
    });

        updateProgress();
    };

    document.getElementById('BtnTask').addEventListener('click', function (e) {
        e.preventDefault();
        addTask();
    });
});

const jsConfetti = new JSConfetti();

const Confetti = () => {
    jsConfetti.addConfetti({
        emojis: ['🎉', '✨', '🎈'], // Optional: Add fun emojis
        confettiColors: ['#ff0a54', '#ff477e', '#ff7096', '#ff85a1'], 
        emojiSize: 50,
        confettiNumber: 150
        
    });
};
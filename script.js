const taskInput = document.getElementById("taskInput");
const addTaskBtn = document.getElementById("addTaskBtn");
const taskList = document.getElementById("taskList");

// Görev ekleme fonksiyonu
addTaskBtn.addEventListener("click", () => {
    const taskText = taskInput.value.trim();
    if (taskText === "") return;

    const li = document.createElement("li");
    li.textContent = taskText;

    const btnContainer = document.createElement("div");
    btnContainer.classList.add("task-buttons");

    const completeBtn = document.createElement("button");
    completeBtn.textContent = "✔";
    completeBtn.classList.add("complete-btn");

    const deleteBtn = document.createElement("button");
    deleteBtn.textContent = "🗑";
    deleteBtn.classList.add("delete-btn");

    btnContainer.appendChild(completeBtn);
    btnContainer.appendChild(deleteBtn);
    li.appendChild(btnContainer);
    taskList.appendChild(li);

    taskInput.value = "";

    // Görevi tamamlandı olarak işaretleme
    completeBtn.addEventListener("click", () => {
        li.classList.toggle("completed");
    });

    // Görevi silme
    deleteBtn.addEventListener("click", () => {
        li.remove();
    });
});

// Enter tuşu ile ekleme
taskInput.addEventListener("keypress", (e) => {
    if (e.key === "Enter") addTaskBtn.click();
});

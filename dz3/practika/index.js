const data = [
    { name: 'Apple', color: 'red' },
    { name: 'Banana', color: 'yellow' },
    { name: 'Cherry', color: 'red' },
    { name: 'Date', color: 'brown' },
    { name: 'Elderberry', color: 'black' },
    // и так далее...
];

// Пример фильтрации по имени
const filteredData = data.filter(item => item.name.toLowerCase().includes(query));

async function fetchData(query) {
    const response = await fetch(/api/fruits?search=${query});
    return await response.json();
}

// Используйте fetchData в обработчике события
searchInput.addEventListener('input', async () => {
    const query = searchInput.value.toLowerCase();
    suggestionsContainer.innerHTML = '';

    if (query) {
        const filteredData = await fetchData(query);
        
        if (filteredData.length > 0) {
            suggestionsContainer.style.display = 'block';
            filteredData.forEach(item => {
                const suggestionItem = document.createElement('div');
                suggestionItem.classList.add('suggestion-item');
                suggestionItem.textContent = item.name; // Используйте item.name для отображения
                suggestionItem.onclick = () => {
                    searchInput.value = item.name; // Заполняем поле поиска
                    suggestionsContainer.style.display = 'none'; // Скрываем предложения
                };
                suggestionsContainer.appendChild(suggestionItem);
            });
        } else {
            suggestionsContainer.style.display = 'none';
        }
    } else {
        suggestionsContainer.style.display = 'none';
    }
});
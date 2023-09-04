const mainForm = document.querySelector('#myForm');
mainForm.addEventListener('submit', function (e) {
    e.preventDefault();
    // const xVal = parseFloat(document.querySelector('#xValue').value);
    // const yVal = parseFloat(document.querySelector('#yValue').value);
    //
    // const checkboxes = document.querySelectorAll("input[name='rValue']:checked");
    // const rVal = Array.from(checkboxes).map(checkbox => checkbox.value);



    fetch(`count_values.php?xVal=${xVal}&yVal=${yVal}&rVal=${rVal}`, {
        method: 'GET',
    })
        .then(response => response.text())
        .then(result => {
            let responseData = JSON.parse(result);
            addToTable(xVal, yVal, rVal, responseData.result, responseData.curr_time, responseData.exec_time);
            saveToLocalStorage(xVal, yVal, rVal, responseData.result, responseData.curr_time, responseData.exec_time);
        });


});
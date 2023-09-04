const setSendAvailability = () => {
    console.log(isCorrect())
    let button = document.getElementById("send_button");
    if (isCorrect()){
        button.removeAttribute('disabled');
    } else {
        button.setAttribute('disabled', 'disabled');
    }
}

const isCorrect = () => {
    const r = document.getElementsByName("r")[0].value;
    const y = document.getElementsByName("y")[0].value;
    let x;
    try{
        x = Array.from(document.querySelectorAll('input[name=x]:checked'))[0].value;
    } catch (ex) {
        return false;
    }
    console.log(x, y, r)
    return (isNumber(x) && isNumber(y) && isNumber(r) && Math.abs(x) <= 4 && y > -3 && y < 5 && r > 1 && r < 4)
}

const isNumber = (number) => {
    return !isNaN(parseInt(number)) || !isNaN(parseFloat(number))
}

const selectOnlyThis = (id) => {
    const xCheckbox = document.querySelectorAll('input[name=x]:checked');
    Array.prototype.forEach.call(xCheckbox,function(el){
        el.checked = false;
    });
    if (document.getElementById(id) && !document.getElementById(id).checked) {
        document.getElementById(id).checked = true;
    }
}
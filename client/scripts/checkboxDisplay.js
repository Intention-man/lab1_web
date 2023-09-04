for (let i = -4; i < 5; i++) {
    let p = document.createElement("p");
    p.className
    p.id = 'p_x_' + i;
    p.innerText = i.toString();
    let input = document.createElement("input");
    input.id = 'input_x_' + i.toString();
    input.type = "checkbox";
    input.name = "x";
    input.value = i.toString();
    input.onchange = () => {
        selectOnlyThis(input.id)
        setSendAvailability()
    }
    p.appendChild(input);
    document.getElementById('x_checkbox').appendChild(p);
}
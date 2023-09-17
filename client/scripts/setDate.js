// const now = new Date();
// const timeInput = document.getElementsByName("currentTime")[0]
// timeInput.value = now.toString();
//
//
// console.log(timeInput.value, now)


let input = document.createElement("input");
input.name = "currentTime";
document.getElementById('form').appendChild(input);
input.disabled;
// input.innerText = "Текущий часовой пояс";
input.value = Intl.DateTimeFormat().resolvedOptions().timeZone;

// <p name="currentTime">Текущий часовой пояс</p>>
const now = new Date();
const timeInput = document.getElementsByName("currentTime")[0]
timeInput.value = now.toString();

console.log(timeInput.value, now)

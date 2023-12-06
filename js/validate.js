// Не позволяем отправить некорректно заполненную форму
const form = document.querySelector('#form');
// Отображаем сообщение об ошибке
const errorDiv = document.querySelector('#error-message');
// Валидируем юзернейм
const username = document.querySelector('#username');
// Валидируем пароль
const password = document.querySelector('#password');
// Валидируем почту
const email = document.querySelector('#email')

// Add even listener to submit button
form.addEventListener('submit', (error) => {
   let incorrectInput = '';

   const usernameIncludesDigit = /\S/.test(username.value);
   if (!usernameIncludesDigit) {
      incorrectInput += 'Имя пользователя должно содержать хотя бы одну цифру.\n';
   }

   const badPasswordLength = (password.value.length < 8 || password.value.length > 20);
   if (badPasswordLength) {
      incorrectInput += 'Пароль должен содержать не менее 8 и не более 20 символов.\n';
   }

   function validateEmail(mailToValidate) {
      let re = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i;
      return re.test(mailToValidate);
    }
   const validatedEmail = validateEmail(email.value);
   console.log(email.value);
   if (!validatedEmail) { 
      incorrectInput += 'Введите адрес почты в формате yourname@domain.extension.\n';
    }

   if (incorrectInput !== "") {
   // Выводим сообщения об ошибках валидации в error div tag
   errorDiv.innerText = incorrectInput; 
   // Меняем цвет тега на красный
   errorDiv.style.color = 'red'; 
   // Не даем пользователю отправить форму, пока не исправлены ошибки
   error.preventDefault(); 
}
});